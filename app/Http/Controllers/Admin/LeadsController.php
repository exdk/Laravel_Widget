<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyFormsRequest;
use App\Http\Requests\StoreFormsRequest;
use App\Http\Requests\UpdateFormsRequest;
use App\Models\Leads;
use App\Models\Pointload;
use App\Models\User;
use App\Models\Mycompan;
use App\Models\Adr;
use App\Models\Auto;
use App\Models\Typeload;
use App\Models\Driver;
use App\Models\Quotes;
use App\Models\QuoteStatistic;
use App\Models\QuotesTarifs;
use App\Models\QuotesQueue;
use Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\UserAlert;

class LeadsController extends Controller
{
    use CsvImportTrait;
    public function index()
    {
      // Leads filter for pages
      $part = app('request')->input('part');   

      // Mycompany info  
      $my_companies = Mycompan::where('team_id', '=', auth()->user()->team_id)->get()->toArray();

      
      // Account type
      $user_type = DB::table('role_user')->where('user_id',auth()->user()->id)->first()->role_id; 
      /*
        $user_type
            1 - administrator
            2 - gruz
            3 - transport
            4 - expeditor
      */

      $visible_companies = array();      
      foreach($my_companies as $company){
         $visible_companies[] = $company['id'];
      }

      $quotes_visible = array();
      $quotes_queue = QuotesQueue::whereIn('company_id', $visible_companies)->get()->toArray();
      foreach($quotes_queue as $quote){
         $quotes_visible[] = $quote['lead_id'];
      }

      switch($part){
        case "":    
            $leads = Leads::with(['point_start', 'point_end', 'gruz_company', 'gruz_company_dispatcher', 'quote', 'transport_comapny', 'driver', 'avto'])
            ->get()
            ->toArray();
            break;

        case "1":
            $leads = Leads::with(['point_start', 'point_end', 'gruz_company', 'gruz_company_dispatcher', 'quote', 'transport_comapny', 'driver', 'avto'])
            ->where('leads.status', '0')
            ->get()
            ->toArray();
            break;

        case "2":
              $leads = Leads::with(['point_start', 'point_end', 'gruz_company', 'gruz_company_dispatcher', 'quote', 'transport_comapny', 'driver', 'avto'])
            ->where('leads.status', '1')
            ->get()
            ->toArray();

        case "3":
              $leads = Leads::with(['point_start', 'point_end', 'gruz_company', 'gruz_company_dispatcher', 'quote', 'transport_comapny', 'driver', 'avto'])
            ->where('leads.status', '2')
            ->get()
            ->toArray();
            break;   

        case "4":
             $leads = Leads::with(['point_start', 'point_end', 'gruz_company', 'gruz_company_dispatcher', 'quote', 'transport_comapny', 'driver', 'avto'])
            ->where('leads.status', '>' , '2')->where('leads.status' , '<', '12')
            ->get()
            ->toArray();
            break;  

         case "5":
             $leads = Leads::with(['point_start', 'point_end', 'gruz_company', 'gruz_company_dispatcher', 'quote', 'transport_comapny', 'driver', 'avto'])
            ->where('leads.date_start', 'LIKE' , date('Y-m-d').'%')->where('leads.status' , '<', '12')
            ->get()
            ->toArray();
            break;   
            
        case "6":
             $leads = array();
            break;         

         case "7":
            $leads = Leads::with(['point_start', 'point_end', 'gruz_company', 'quote', 'transport_comapny', 'driver', 'avto'])
            ->where('leads.status' , '=', '12')
            ->get()
            ->toArray();
            break;           

      }

      if($user_type != 1){
          foreach($leads as $key=>$lead){
                // Грузовладелец
                if(($user_type == 2)&&(in_array($lead['gruz_company_id'], $visible_companies))) continue;
                // Видимость для транспортной копании
                if(in_array($lead['id'], $quotes_visible)) continue;
                unset($leads[$key]);
          }
      }

        return view('admin.leads.index', compact('leads','user_type'));
    }

    public function create()
    {
      
       // Account type
       $user_type = DB::table('role_user')->where('user_id',auth()->user()->id)->first()->role_id; 
       /*
        $user_type
            1 - administrator
            2 - gruz
            3 - transport
            4 - expeditor
       */
        $pointloads = Pointload::all()->toArray();
        $users = User::where('team_id', '=', auth()->user()->team_id)->get()->toArray();
        $companies = Mycompan::with(['main', 'typecomps', 'typeperevozs', 'megdus', 'team', 'media'])->get()->toArray();
        
        return view('admin.leads.create', compact('pointloads', 'companies', 'users', 'user_type'));
    }

    public function store(Request $request)
    {

        $user_id = auth()->user()->id;
        $lead_id = Leads::create($request->all())->id;
        $quote_statistic = QuoteStatistic::create(['quote_id'=>$lead_id, 'user_id'=>$user_id, 'status'=>'0', 'stype'=>0, 'comment'=>"Добавление заявки #".$lead_id]);

        $quote_queue = QuotesQueue::where('point_start', $request->get('point_start'))->where('point_end', $request->get('point_end'))->where('lead_id', '0')->first();
 
        if($quote_queue === null){
            // Queue not exist.....
        }else{
            $quote_queue->lead_id = $lead_id;
            $quote_queue->save();
            $quote_statistic = QuoteStatistic::create(['quote_id'=>$lead_id, 'user_id'=>$user_id, 'status'=>'0', 'stype'=>1, 'comment'=>"Заявки закрпелена за компанией #".$quote_queue->company_id]);
        }
        

        return redirect()->route('admin.leads.index');
    }

    public function edit(Leads $lead)
    {
       // Account type
       $user_type = DB::table('role_user')->where('user_id',auth()->user()->id)->first()->role_id; 
       /*
        $user_type
            1 - administrator
            2 - gruz
            3 - transport
            4 - expeditor
       */

      $quote = Quotes::where('lead_id', $lead['id'])->first();
      if($quote === null){
          $lead['transport_company_id'] = 0;
          $lead['driver_id'] = 0;
          $lead['avto_id'] = 0;
      }else{
          $quote->toArray();
          $lead['transport_company_id'] = $quote['transporter_company'];
          $lead['driver_id'] =  $quote['driver_id'];
          $lead['avto_id'] =  $quote['avto_id']; 
      }

      $pointloads = Pointload::all()->toArray();
      $users = User::where('team_id', '=', auth()->user()->team_id)->get()->toArray();
      $companies = Mycompan::with(['main', 'typecomps', 'typeperevozs', 'megdus', 'team', 'media'])->get()->toArray();
      $autos = Auto::with(['typeloads', 'adrs', 'media'])->get()->toArray();
      $drivers = Driver::with(['media'])->get()->toArray();  
      return view('admin.leads.edit', compact('pointloads', 'companies', 'users', 'lead', 'autos', 'drivers', 'user_type'));
    }

    public function update(Request $request, Leads $lead)
    {
        $lead->update($request->all());
        return redirect()->route('admin.leads.index');
    }


    public function attachTransportCompany(Request $request){

        $user_id = auth()->user()->id;
        $lead_id = $request->get('lead_id');
		$lead = Leads::where('id', $lead_id)->first();
        $transport_company_id = $request->get('transport_company_id');	
        $driver_id = $request->get('driver_id');
        $avto_id = $request->get('avto_id');
        $quote = Quotes::where('lead_id', $lead_id)->first();

        if(($quote === null)&&($transport_company_id != -1)){
            $quote = Quotes::create(['lead_id'=>$lead_id, 'user_id'=>$user_id, 'driver_id'=>$driver_id, 'avto_id'=>$avto_id, 'transporter_company'=>$transport_company_id, 'quote_type'=>0, 'price'=>0, 'price_currency'=>0, 'distribution_type'=>0, 'status'=>0, 'comment'=>'']);

        }else{

            if($transport_company_id > 0){
                $quote->driver_id = $driver_id;
                $quote->avto_id = $avto_id;
                $quote->transporter_company = $transport_company_id;
                $quote->status = 0;
                $quote->save();
            }


        }
        if($transport_company_id > 0){
      
            $lead->status = 1;
            $quote_statistic = QuoteStatistic::create(['quote_id'=>$lead_id, 'user_id'=>$user_id, 'status'=>'0', 'stype'=>0, 'comment'=>"Закреплена транспортная компания #".$lead_id]);
        }else if($transport_company_id == "-1"){
    
            $lead->status = 12;
            $quote_statistic = QuoteStatistic::create(['quote_id'=>$lead_id, 'user_id'=>$user_id, 'status'=>'0', 'stype'=>0, 'comment'=>"Отмененно"]);
        }else{

            $newLead = $lead->replicate();
            $newLead->status = 0;
            $newLead->save();

            $quote_statistic = QuoteStatistic::create(['quote_id'=>$lead_id, 'user_id'=>$user_id, 'status'=>'0', 'stype'=>0, 'comment'=>"Отмененно"]);
            $lead->status = 12;
        }
        $lead->save();

		$transport_company = Mycompan::where('id', $transport_company_id)->first();
		$transport_comapny_employers = User::where('team_id', $transport_company->team_id)->get();		
		$gruzovladelets = $lead->gruz_company;
		/*Почему-то $lead->gruz_company_dispatcher не возвращает модель юзера, поэтому ищем так*/
		$dispatcher = User::where('id', $lead->gruz_company_dispatcher)->first();
		$html = view('emails.tms', compact("gruzovladelets", 'lead', 'dispatcher'))->render();
		
		$SMTPBZController = new SMTPBZController();
		
		$alert = UserAlert::create(["alert_text" => "Новый TMS", "alert_link" => "/admin/leads/".$lead->id]);
		$user_user_alert = [];
		foreach($transport_comapny_employers as $e)
		{
			if($e->notifications_settings->tms_attached == 1)
			{
				$ans = $SMTPBZController->send_mail("Новый TMS", $e->email, $html);
				$user_user_alert[] = $e->id;
			}
		}
		$alert->users()->sync($user_user_alert);
		$ans = $SMTPBZController->send_mail("Новый TMS", $transport_company->email, $html);
        return "+";
    }

    public function changeQuoteStatus(Request $request){
        $user_id = auth()->user()->id;
        $lead_id = $request->get('lead_id');
        $status = $request->get('status');

        $lead = Leads::where('id', $lead_id)->first();

        switch ($status){

            case "2":
                $lead->status = 2;
                $lead->save();
                $quote_statistic = QuoteStatistic::create(['quote_id'=>$lead_id, 'user_id'=>$user_id, 'status'=>'0', 'stype'=>0, 'comment'=>"Назначена Транспортная компания #".$lead_id]);
                break;

            case "3":
                $lead->status = 3;
                $lead->save();
                $quote_statistic = QuoteStatistic::create(['quote_id'=>$lead_id, 'user_id'=>$user_id, 'status'=>'0', 'stype'=>0, 'comment'=>"Въезд на территорию погрузки"]);
                break;

             case "4":
                $lead->status = 4;
                $lead->save();
                $quote_statistic = QuoteStatistic::create(['quote_id'=>$lead_id, 'user_id'=>$user_id, 'status'=>'0', 'stype'=>0, 'comment'=>"Загрузка"]);
                break;  

            case "5":
                $lead->status = 5;
                $lead->save();
                $quote_statistic = QuoteStatistic::create(['quote_id'=>$lead_id, 'user_id'=>$user_id, 'status'=>'0', 'stype'=>0, 'comment'=>"Покинул территорию погрузки"]);
                break;   

            case "6":
                $lead->status = 6;
                $lead->save();
                $quote_statistic = QuoteStatistic::create(['quote_id'=>$lead_id, 'user_id'=>$user_id, 'status'=>'0', 'stype'=>0, 'comment'=>"В пути"]);
                break;    

             case "7":
                $lead->status = 7;
                $lead->save();
                $quote_statistic = QuoteStatistic::create(['quote_id'=>$lead_id, 'user_id'=>$user_id, 'status'=>'0', 'stype'=>0, 'comment'=>"Въезд на территорию выгрузки"]);
                break;        

            case "8":
                $lead->status = 8;
                $lead->save();
                $quote_statistic = QuoteStatistic::create(['quote_id'=>$lead_id, 'user_id'=>$user_id, 'status'=>'0', 'stype'=>0, 'comment'=>"Выгрузка"]);
                break; 

            case "9":
                $lead->status = 9;
                $lead->save();
                $quote_statistic = QuoteStatistic::create(['quote_id'=>$lead_id, 'user_id'=>$user_id, 'status'=>'0', 'stype'=>0, 'comment'=>"Покинул территорию выгрузки"]);
                break;     

             case "10":
                $lead->status = 10;
                $lead->save();
                $quote_statistic = QuoteStatistic::create(['quote_id'=>$lead_id, 'user_id'=>$user_id, 'status'=>'0', 'stype'=>0, 'comment'=>"Документы получены "]);
                break;   

             case "11":
                $lead->status = 11;
                $lead->save();
                $quote_statistic = QuoteStatistic::create(['quote_id'=>$lead_id, 'user_id'=>$user_id, 'status'=>'0', 'stype'=>0, 'comment'=>"Заявка оплачена"]);
                break;              


        }
		
		if(!is_null($lead))
		{
			$gruzovladelets_comapny = $lead->gruz_company;
			$transport_company = $lead->transport_comapny;
			$status = $quote_statistic->comment;
			/*Почему-то $lead->gruz_company_dispatcher не возвращает модель юзера, поэтому ищем так*/
			$dispatcher = User::where('id', $lead->gruz_company_dispatcher)->first();
			$html = view('emails.tms', compact("gruzovladelets_comapny", 'lead', 'dispatcher'))->render();
			$alert = UserAlert::create(["alert_text" => "Статус TMS #".$lead->id." изменен: ".$status, "alert_link" => "/admin/leads/".$lead->id]);
			$SMTPBZController = new SMTPBZController();
			if(!is_null($transport_comapny))
			{
				$transport_comapny_employers = User::where('team_id', $transport_company->team_id)->get();	
				$user_user_alert = [];
				foreach($transport_comapny_employers as $e)
				{
					if($e->notifications_settings->tms_status_changed == 1)
					{
						$ans = $SMTPBZController->send_mail("Статус TMS #".$lead->id." изменен: ".$status, $e->email, $html);
						$user_user_alert[] = $e->id;
					}
				}
				$alert->users()->sync($user_user_alert);
				$ans = $SMTPBZController->send_mail("Статус TMS #".$lead->id." изменен: ".$status, $transport_company->email, $html);
			}
			$ans = $SMTPBZController->send_mail("Статус TMS #".$lead->id." изменен: ".$status, $gruzovladelets_comapny->email, $html);
		}
        return "+";
    }

    public function destroy(Leads $lead)
    {
        $leads->delete();
        return back();
    }

    public function history(Request $request){
        $lead_id = $request->get('lead_id');
        $history = QuoteStatistic::with('user')->where('quote_id', $lead_id)->get()->toArray();
        return view('admin.leads.history', ['lead_id'=>$lead_id, 'history'=>$history]);
    }

    
}
