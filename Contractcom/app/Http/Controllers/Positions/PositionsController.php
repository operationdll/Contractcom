<?php

namespace App\Http\Controllers\Positions;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class PositionsController extends Controller{
    public function getList(){
        if(Input::all()){
            $input = Input::all();
            $positions = DB::table('Positions')
                ->where('pos_name','like','%'.$input['name'].'%')
                ->get();
            echo $positions;
        }else{
            $positions = DB::table('Positions')->get();
            return view('positions.list',['positions'=>$positions]);
        }
    }

    public function add(){
        if(Input::all()){
            $input = Input::all();
            DB::table('Positions')->insert([
                    'pro_id'=>$input['pro_id'],
                    'pos_type'=>$input['pos_type'],
                    'pos_name'=>$input['pos_name'],
                    'work_hours'=>$input['work_hours'],
                    'hours_rate'=>$input['hours_rate'],
                    'position_desc'=>$input['position_desc'],
                    'requirements'=>$input['requirements'],
                ]);
            return redirect('positions/list');
        }else{
            return view('positions.add');
        }
    }

    public function delete(){
        $input = Input::all();
        DB::table('Positions')->where('pos_id',$input['id'])->delete();
        return redirect('positions/list');
    }

    public function update(Request $request){
        $input = Input::all();
        if($request->isMethod('post')){
            DB::table('Positions')
                ->where('pos_id',$input['id'])
                ->update([
                    'pro_id'=>$input['pro_id'],
                    'pos_type'=>$input['pos_type'],
                    'pos_name'=>$input['pos_name'],
                    'work_hours'=>$input['work_hours'],
                    'hours_rate'=>$input['hours_rate'],
                    'position_desc'=>$input['position_desc'],
                    'requirements'=>$input['requirements'],
                ]);
            return redirect('positions/list');
        }else{
            $position = DB::table('Positions')->where('pos_id',$input['id'])->first();
            return view('positions.add',['position'=>$position]);
        }
    }
}
