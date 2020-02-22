<?php

namespace App\Http\Controllers;

use App\Quarter;
use App\Road;
use App\Motor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class MotorController extends Controller
{
    public function  getDriverPhoto($p_name){
        $file=Storage::disk('motors')->get($p_name);
        return response($file, 200)->header("Content-Type","*/*");
    }
    public function getSearchDriver(Request $request){
        $quarter_id=$request['quarter_id'];
        $road_id=$request['road_id'];
        $search_name=$request['search_name'];
        $motors=Motor::where('quarter_id',$quarter_id)
            ->where('road_id',$road_id)
            ->where("driver_name","LIKE","%$search_name%")
            ->paginate("10");
        $qtrs = Quarter::get();
        $roads=Road::get();
        return view('motors.all-motors')
            ->with(['motors' => $motors, 'qtrs' => $qtrs, 'roads'=>$roads]);

    }


    public function getAllMotor()
    {
        $motors = Motor::paginate("10");
        $qtrs = Quarter::get();
        $roads=Road::get();
        return view('motors.all-motors')
            ->with(['motors' => $motors, 'qtrs' => $qtrs, 'roads'=>$roads]);
    }
    public function getNewMotor()
    {
        $qtrs = Quarter::get();
        $roads = Road::get();
        return view('motors.new')
            ->with([
                'qtrs' => $qtrs,
                'roads' => $roads
            ]);
    }

    public function postNewMotor(Request $request)
    {
        $this->validate($request, [
            'photo' => 'required|mimes:jpg,jpeg,png,gif',
            'phone' => "required",
            'driver_name' => 'required',
            'road' => 'required',
            'quarter' => 'required'
        ]);

        $photo_file=$request->file("photo");
        $photo_name=date("dmyhis").$photo_file->getClientOriginalName();

        $m=new Motor();
        $m->photo=$photo_name;
        $m->driver_name=$request['driver_name'];
        $m->phone=$request['phone'];
        $m->road_id=$request['road'];
        $m->quarter_id=$request['quarter'];
        $m->save();

        $myFile=File::get($photo_file);
        Storage::disk("motors")->put($photo_name,$myFile);





        return redirect()->back()->with('info',"The new motor have been created.");
    }
}