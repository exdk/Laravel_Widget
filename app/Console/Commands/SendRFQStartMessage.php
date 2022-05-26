<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\SMTPBZController;
use App\Models\Rfq;
use App\Models\UserAlert;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;

class SendRFQStartMessage extends Command
{
   /**
    * The name and signature of the console command.
    *
    * @var string
    */
   protected $signature = 'send_rfq_start_alerts:send';
   /**
    * The console command description.
    *
    * @var string
    */
   protected $description = 'Sending rfq mails and alerts on start date';
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
	   $rfqs = Rfq::where("start", ">=", Carbon::now()->format("Y-m-d H:i:00"))->where("start", "<=", Carbon::now()->format("Y-m-d H:i:59"))->get();
	   foreach($rfqs as $rfq)
	   {
			$company_emails = [];
			$company_users = [];
			$typetrans_arr = [];
			$gruzowners = [];
			
			$selected_transport_companies = [];
			$selected_transport_companies_employers = [];
			
			$uid = $rfq->team_id;
			$role = \DB::table('mycompans')
				->where('mycompans.team_id','=',$uid)
				->first();
			$gruzowners[] = $role->hortname;
			
			foreach($rfq->typetrs as $trs)
			{
				$typetrans_arr[] = $trs->type;
			}
			foreach($rfq->rfqVisiblility as $visibility)
			{
				$company_emails[] = $visibility->company->email;
				$company_users[] = $visibility->company->owner;
				$selected_transport_companies[] = $visibility->company;
			}
			$html = view('emails.rfq', compact('rfq', 'typetrans_arr', 'gruzowners'))->render();
			
			foreach($selected_transport_companies as $stc)
			{
				$employers = User::where('team_id', $stc->team_id)->get();
				foreach($employers as $e)
				{
					array_push($selected_transport_companies_employers, $e);
				}
			}
			
			$SMTPBZController = new SMTPBZController();
			
			/*Отправка фирме*/
			foreach($company_emails as $ce)
			{
				$ans = $SMTPBZController->send_mail("Уведомление о начале RFQ", $ce, $html);
			}
			$alert = UserAlert::create(["alert_text" => "Начало RFQ", "alert_link" => "/admin/rfqs/".$rfq->id]);
			$user_user_alert = [];
			
			foreach($selected_transport_companies_employers as $e)
			{
				if($e->notifications_settings->rfq_start == 1)
				{
					$ans = $SMTPBZController->send_mail("Уведомление о начале RFQ", $e->email, $html);
					$user_user_alert[] = $e->id;
				}
			}
			foreach($company_users as $cu)
			{
				if($cu->notifications_settings->rfq_start == 1)
				{
					$user_user_alert[] = $cu->id;
				}
			}
			$alert->users()->sync($user_user_alert);
	   }
   }
}