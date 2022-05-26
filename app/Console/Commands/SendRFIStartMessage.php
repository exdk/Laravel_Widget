<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\SMTPBZController;
use App\Models\Rfi;
use App\Models\UserAlert;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;

class SendRFIStartMessage extends Command
{
   /**
    * The name and signature of the console command.
    *
    * @var string
    */
   protected $signature = 'send_rfi_start_alerts:send';
   /**
    * The console command description.
    *
    * @var string
    */
   protected $description = 'Sending rfi mails on start date';
   /**
    * Create a new command instance.
    *
    * @return void
    */
   public function __construct()
   {
       parent::__construct();
   }
   /**
    * Execute the console command.
    *
    * @return mixed
    */
   public function handle()
   {
	   $rfis = Rfi::where("start", ">=", Carbon::now()->format("Y-m-d H:i:00"))->where("start", "<=", Carbon::now()->format("Y-m-d H:i:59"))->get();
	   foreach($rfis as $rfi)
	   {
			$partner_emails = []; 
			$selected_transport_companies = [];
			$selected_transport_companies_employers = [];
			
			
			$role = \DB::table('mycompans')  
					->where('mycompans.team_id','=',$rfi->team_id)
					->first();
					
			$gruzowner_name = "Неизвестен";
			if($role)
			{
				$gruzowner_name = $role->hortname;
			}
			
			$partner_groups_employers = [];
			
			foreach($rfi->access_groups as $ac_g)
			{
				$partner = $ac_g->partner;
				if(!is_null($partner))
				{
					$selected_transport_companies[] = $partner;
					$partner_emails[] = $partner->email;
					//$partner_owners[] = $partner->owner;

				}
				
				$partner_groups = $ac_g->company;
				if(!is_null($partner_groups))
				{
					$partners = $partner_groups->partners->toArray();
					foreach($partners as $partner)
					{
						$pemployers = User::where('team_id', $partner['team_id'])->get();
						foreach($pemployers as $pe)
						{
							$partner_groups_employers[] = $pe;
							//$partner_emails[] = $pe->email;
						}
					}
				}
			}
			
			$typetrans_arr = [];
			foreach($rfi->typetrans as $typetrans)
			{
				$typetrans_arr[] = $typetrans->type;
			}
			foreach($selected_transport_companies as $stc)
			{
				$employers = User::where('team_id', $stc->team_id)->get();
				foreach($employers as $e)
				{
					array_push($selected_transport_companies_employers, $e);
				}
			}
			
			if(count($partner_groups_employers) > 0 || count($selected_transport_companies_employers) > 0)
			{
				$alert = UserAlert::create(["alert_text" => "Начало RFI", "alert_link" => "/admin/rfis/".$rfi->id]);
				$user_user_alert = [];
				foreach($partner_groups_employers as $go_t)
				{
					if(!in_array($go_t->id, $user_user_alert))
					{
						if($go_t->notifications_settings->rfi_end == 1)
						{
							$user_user_alert[] = $go_t->id;
						}
					}
				}
				foreach($selected_transport_companies_employers as $e)
				{
					if($e->notifications_settings->rfi_end == 1)
					{
						$user_user_alert[] = $e->id;
					}
				}
				$alert->users()->sync($user_user_alert);
			}
			$html = view('emails.rfi_start', compact('rfi', 'typetrans_arr', 'gruzowner_name'))->render();

			$SMTPBZController = new SMTPBZController();

			/*Отправка на email фирмы */

			foreach($partner_emails as $pe)
			{
				$ans = $SMTPBZController->send_mail("Уведомление о начале RFI", $pe, $html);
			}

			/* отправка сотрудникам транспортных компаний */
			foreach($selected_transport_companies_employers as $e)
			{
				if($e->notifications_settings->rfi_end == 1)
				{
					$ans = $SMTPBZController->send_mail("Уведомление о начале RFI", $e->email, $html);
				}
			}
			
			/* отправка сотрудникам групп партнеров */
			foreach($partner_groups_employers as $e)
			{
				if($e->notifications_settings->rfi_end == 1)
				{
					$ans = $SMTPBZController->send_mail("Уведомление о начале RFI", $e->email, $html);
				}
			}
			
			\Log::info("Уведомления отправлены");
	   }
   }
}