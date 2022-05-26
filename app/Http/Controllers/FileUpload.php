<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\File;
class FileUpload extends Controller
{
    public function clean($value) {
        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);
        return $value;
    }

    public function createForm(){
        return view('file-upload');
    }
    public function fileUpload(Request $req){
        $req->validate([
            'file' => 'required|mimes:pdf,jpeg,jpg,png,xls,xlsx,doc,docx|max:2048'
        ]);
        $fileModel = new File;
        if($req->file()) {
                $fileName = time() . '_' . $req->file->getClientOriginalName();
                $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
                $fileModel->name = $req->file->getClientOriginalName();
                $fileModel->file_path = '/storage/' . $filePath;
                $fileModel->team_id = self::clean($_POST['team_id']);
                $fileModel->number = self::clean($_POST['number']);
                $fileModel->type = self::clean($_POST['type']);
                $fileModel->description = self::clean($_POST['description']);
                $fileModel->date_create = self::clean(date('d.m.Y', strtotime($_POST['date_create'])));
                $fileModel->save();
                return back()
                    ->with('success', 'Файл успешно загружен.')
                    ->with('file', $fileName);
        }
    }

    public function fileUpdate(Request $request, File $file){
        if(isset($_POST['delete'])) {
            $file->delete();
            return redirect('/admin/upload-file');
        }
        $request->validate([
            'type' => 'required'
        ]);
            $file->number = self::clean($request->number);
            $file->type = self::clean($request->type);
            $file->description = self::clean($request->description);
            $file->date_create = self::clean(date('d.m.Y', strtotime($request->date_create)));
            $file->save();
            return redirect('/admin/upload-file');
    }

    public function fileEdit(File $fileModel)
    {
        return view('docs');
    }
}
