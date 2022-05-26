<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Leads;
use View;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
      	//auth()->user()->id
      	/**$leads = Leads::all()->toArray();

      	$count_all_items = count($leads);
      	$count_statues = array();

      	foreach($leads as $item){
      		if(($item['status'] > 3)&&($item['status'] != 12)) $item['status'] = 3;
      		if(!isset($count_statues[$item['status']])) $count_statues[$item['status']] = 0;

      		$count_statues[$item['status']]++; 
      	}

        View::share('count_quotes_all', $count_all_items);
        View::share('count_statuses', $count_statues);*/
    }
}
