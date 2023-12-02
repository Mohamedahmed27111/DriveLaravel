<?php

namespace App\Http\Controllers;

use App\Models\Drive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DriveController extends Controller
{


    public function MyFiles(){
        $user_id =auth()->user()->id;
        $drives =  Drive::where("user_id","=", $user_id)->get();
        return view('drives.index',compact("drives"));
    }
    public function notFound(){
        return view("notFoundpage");
    }
    public function Publicfile(){

        $drives =  Drive::where("status","=", "public")->get();
        return view('drives.PublicFile',compact("drives"));
    }

    public function AllFiles()
    {
        $drives =  Drive::all();
        return view('drives.AllFiles',compact("drives"));
    }


    public function create()
    {
        return view('drives.create');
    }


    public function store(Request $request)
    {
        $request->validate([
          'title'=>"required|min:2|max:30|string",
          'description'=>"required|string",
          'file'=>"required|file|"
        ]);




        // -----------
      $drive = new Drive();
      $drive->title = $request->title;
      $drive->description = $request->description;
    //    file data
      $file_data = $request->file("file");
      $drive_name =time() . $file_data->getClientOriginalName();
      $drive_Extension = $file_data->getClientOriginalExtension();

      $location = public_path("./upload");
      $file_data ->move($location,$drive_name);
    //   -----------------
      $drive->file = $drive_name;
      $drive->extension = $drive_Extension;
      $drive->status = $request->status;
      $drive->user_id =auth()->user()->id;
      $drive->save();
      return redirect()->back()->with("done","Uploaded done");
    }


    public function show($id)
    {
        $drive= DB::table('DriveWithUsers')->where('DriveId','=',$id)->first();
        return view('drives.show',compact("drive"));

    }

    public function edit($id)
    {
        $drive= Drive::find($id);
        return view('drives.edit',compact("drive"));
    }


    public function update(Request $request, $id)
    {
        $drive =Drive::find($id);
      $drive->title = $request->title;
      $drive->description = $request->description;
    //    file data
      $file_data = $request->file("file");
      if($file_data==null){
        $drive_name = $drive->file;
        $drive_Extension =$drive->extension;
      }
      else{
        $filepath =public_path("./upload/$drive->file");
        unlink( $filepath);

        $drive_name =time() . $file_data->getClientOriginalName();
        $drive_Extension = $file_data->getClientOriginalExtension();
        $location = public_path("./upload");
        $file_data ->move($location,$drive_name);

      }

    //   -----------------
      $drive->file = $drive_name;
      $drive->extension = $drive_Extension;
      $drive->status = $request->status;
      $drive->user_id =auth()->user()->id;
      $drive->save();
      return redirect()->route("drive.show",$drive->id)->with("done","Updated done");
    }


    public function destroy($id)
    {
        $drive= Drive::where("id", $id)->first();
        $filepath =public_path("./upload/$drive->file");
        unlink( $filepath);
        $drive->delete();
        return redirect()->back()->with("done","file deleted successfully");
    }


    public function download($id)
    {
       $drive= Drive::where("id", $id)->first();
       $filepath =public_path("./upload/$drive->file");
         return response()->download($filepath);
    }
    public function changeStatus($id)
    {
        $drive =Drive::find($id);
          if($drive->status =='private'){
            $drive->status ="public";
            $drive->save();
            return redirect()->back()->with("done","Your file is public now");
          }
          else{
            $drive->status ="private";
            $drive->save();
            return redirect()->back()->with("done","Your file is private now");

          }
    }
}
