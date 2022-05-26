<?php
namespace App\Http\Controllers;
use App\Models\File;
use Illuminate\Http\Request;
use App\Models\Mycompan;

class UslugiUpdate extends Controller
{
    public function createUslugi(){
        return view('edit_comp');
    }

    public function clean($value) {

        return $value;
    }

    public function uslugiCreate(Request $req){
        $req->validate([
            'usluga' => 'required'
        ]);
        $uslugiNew = new Uslugi;
        if($req->usluga()) {
            $uslugiNew->file_path = '/storage/' . $filePath;
            $uslugiNew->team_id = self::clean($_POST['team_id']);
            $uslugiNew->number = self::clean($_POST['number']);
            $uslugiNew->type = self::clean($_POST['type']);
            $uslugiNew->description = self::clean($_POST['description']);
            $uslugiNew->date_create = self::clean(date('d.m.Y', strtotime($_POST['date_create'])));
            $uslugiNew->save();
            return redirect('/admin/editcomp');
        }
    }

    public function updateUslugi(Request $request, Mycompan $comp){
        $request->validate([
            'comp' => 'required'
        ]);
        $check = $_POST['uslugi'];
        if(empty($check)) {
            return redirect('/admin/editcomp');
        } else {
            $N = count($check);
            for($i=0; $i < $N; $i++) {
                echo($check[$i] . " ");
                $comp->avia = self::clean($request->uslugi);
            }
            $comp->save();
            return redirect('/admin/editcomp');
        }

        /*$comp->number = self::clean($request->number);
        $comp->type = self::clean($request->type);
        $comp->description = self::clean($request->description);
        $comp->date_create = self::clean(date('d.m.Y', strtotime($request->date_create)));
        $comp->save();*/
        //return redirect('/admin/editcomp');
    }

}

