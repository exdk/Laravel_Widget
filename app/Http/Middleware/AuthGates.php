<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Support\Facades\Gate;
use App\Models\Leads;
use App\Models\User;
use App\Models\Mycompan;
use Illuminate\Support\Facades\DB;
use App\Models\QuotesQueue;
use View;

class AuthGates
{
    public function handle($request, Closure $next)
    {
        $user = \Auth::user();
        if ($user) {
            $roles            = Role::with('permissions')->get();
            $permissionsArray = [];
            foreach ($roles as $role) {
                foreach ($role->permissions as $permissions) {
                    $permissionsArray[$permissions->title][] = $role->id;
                }
            }
            foreach ($permissionsArray as $title => $roles) {
                Gate::define($title, function ($user) use ($roles) {
                    return count(array_intersect($user->roles->pluck('id')->toArray(), $roles)) > 0;
                });
            }


            $leads = Leads::all()->toArray();

            $count_all_items = 0;
            $count_statues = array();

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



            foreach($leads as $item){
                if(($item['status'] > 3)&&($item['status'] != 12)) $item['status'] = 3;
                if(!isset($count_statues[$item['status']])) $count_statues[$item['status']] = 0;
                if($user_type != 1){
                    
                    // Грузовладелец
                    if(($user_type == 2)&&(in_array($item['gruz_company_id'], $visible_companies))) {
                        $count_statues[$item['status']]++;
                        $count_all_items++;
                        continue;
                    }
                    // Видимость для транспортной копании
                    if(in_array($item['id'], $quotes_visible)) {
                        $count_statues[$item['status']]++;
                        $count_all_items++;
                        continue;
                    }
     
                    
                }else{
                    $count_statues[$item['status']]++; 
                    $count_all_items++;
                    continue;
                }
                
            }

            View::share('count_quotes_all', $count_all_items);
            View::share('count_statuses', $count_statues); 

        }

        return $next($request);
    }
}
