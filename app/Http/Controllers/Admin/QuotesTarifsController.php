<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuotesTarifs;
use App\Models\QuotesQueue;
use App\Models\Pointload;
use App\Models\Mycompan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuotesTarifsController extends Controller
{
    public function index()
    {
        $quotesTarifs = QuotesTarifs::leftJoin('pointloads as p1', 'p1.id', '=', 'quotes_tarifs.point_start')
                                    ->leftJoin('pointloads as p2', 'p2.id', '=', 'quotes_tarifs.point_end')
                                    ->select('quotes_tarifs.*', 'p1.title as pl_title', 'p1.gorod as pl_gorod',  'p2.title as pe_title', 'p2.gorod as pe_gorod')
                                    ->get()
                                    ->toArray();

        return view('admin.quotesTarifs.index', compact('quotesTarifs'));
    }

    public function create()
    {
        $pointloads = Pointload::all()->toArray();
        $companies = Mycompan::where('company_role', '3')->get()->toArray();
        return view('admin.quotesTarifs.create', compact('pointloads', 'companies'));
    }

    public function store(Request $request)
    {
        $quotesTarifs = QuotesTarifs::create($request->all());
        return redirect()->route('admin.quotes-tarifs.index');
    }

    public function edit(QuotesTarifs $quotesTarifs)
    {
       
        return view('admin.quotesTarifs.edit', compact('quotesTarifs'));
    }

    public function update(Request $request, QuotesTarifs $quotesTarifs)
    {
        $quotesTarifs->update($request->all());
        return redirect()->route('admin.quotes-tarifs.index');
    }

    public function generate_queue(){

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

        $queues = QuotesQueue::with(['point_start', 'point_end', 'transporter_company'])->where('lead_id', '<>', '-1')->get()->toArray();
      //  foreach($queues as $item){
           // echo "(".$item['point_start']."-".$item['point_end'].") ".$item['company_id']." | ".$item['lead_id']." <br/>";
        //}
        $queues_settings = QuotesQueue::where('lead_id', '=', '-1')->first();
        if($queues_settings === null){
            $queues_settings = QuotesQueue::create(['point_start'=>'0', 'point_end'=>'0', 'company_id'=>'0', 'user_id'=>'0', 'lead_id'=>'-1', 'status'=>'0']);
            
        }

        $queues_settings->toArray();
        $queue_type = QuotesQueue::where('lead_id', '-1')->first();

        return view('admin.quotesTarifs.queue', array_merge(compact('queues', 'queues_settings'),  ['queue_type'=>$queue_type->status]));

    }

    public function change_queue_type(Request $request){
        $queue_type = $request->get('queue_type');
        $quote_queue = QuotesQueue::where('lead_id', '-1')->first();
        $quote_queue->status = $queue_type;
        $quote_queue->save();
        return "+";
    }

    public function clear_queue(Request $request){
        $quotes_to_delete = QuotesQueue::where('lead_id', '=', '0');
        $quotes_to_delete->delete();
        return "+";
    }


    public function destroy($quotesTarifs_id)
    {
  
        $quotesTarifs = QuotesTarifs::find($quotesTarifs_id);
        $quotesTarifs->delete();
        return back();
    }

    public function massDestroy(Request $request)
    {
        QuotesTarifs::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
