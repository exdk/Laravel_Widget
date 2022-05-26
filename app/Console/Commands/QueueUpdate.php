<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;

use App\Http\Controllers\Controller;
use App\Models\QuotesTarifs;
use App\Models\QuotesQueue;
use App\Models\Pointload;
use App\Models\Mycompan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QueueUpdate extends Command
{
   /**
    * The name and signature of the console command.
    *
    * @var string
    */
   protected $signature = 'quote_queue:update';
   /**
    * The console command description.
    *
    * @var string
    */
   protected $description = 'Updateing quotes queue...';
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
    
        $quotes_matrixs = QuotesTarifs::all()->toArray();
        $quotes_matrix_queues = array();
        foreach($quotes_matrixs as $item){
            $quotes_matrix_queues[$item['point_start'].'-'.$item['point_end']][] = $item;
        }

        foreach($quotes_matrix_queues as $key => $companys_items){
            $count_exist = QuotesQueue::where('point_start',explode('-',$key)[0])->where('point_end',explode('-',$key)[1])->where('lead_id', '0')->count();
            if($count_exist > 0) continue;
            $quotes_company_quotas = array();
            $min_quota = 100;
            foreach($companys_items as $company){
                if($min_quota > $company['quota']) $min_quota =  $company['quota'];
                $quotes_company_quotas[$company['company_id']] = $company['quota'];
            }
            foreach($quotes_company_quotas as $company_id => $quota){
                for($i=1; $i<=ceil($quota/$min_quota); $i++){
                    QuotesQueue::create(['lead_id'=>0, 'point_start'=>explode('-',$key)[0], 'point_end'=>explode('-',$key)[1], 'company_id'=>$company_id, 'user_id'=>0, 'cancel_time'=>date('Y-m-d H:i:s'), 'status'=>0, 'parent_id'=>0]);
                }
                 
            }
            
        }

   }
}