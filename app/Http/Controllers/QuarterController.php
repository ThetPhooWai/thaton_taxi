<?php

namespace App\Http\Controllers;

use App\Quarter;
use App\Task;
use Illuminate\Http\Request;

class QuarterController extends Controller
{
    public function getAllQuarter(){
       $qtrs=Quarter::OrderBy('id','desc')->paginate('4');
        return view('quarters.all-quarter')->with(['qtrs'=>$qtrs]);

    }
    public function getNewQuarter(){
        return view('quarters.new');

    }
    public function postNewQuarter(Request $request){
        $this->validate($request,[
            'quarter_name'=>'required|unique:quarters'
        ]);
        $q=new Quarter();
        $q->quarter_name=$request['quarter_name'];
        $q->save();
        return redirect()->back()->with('info','The new quarter have been created');
    }
    public function getEdit(Request $request){
        $id=$request['id'];
        $task=Quarter::whereId($id)->firstOrFail();
        $task->quarter_name=$request['quarter_name'];
        $task->update();
        return redirect()->back()->with("info","The selected task have been update.");

    }

}
