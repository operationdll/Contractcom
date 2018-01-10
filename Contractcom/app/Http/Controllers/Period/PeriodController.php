<?php

namespace App\Http\Controllers\Period;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class PeriodController extends Controller{
    public function getList(){
        $periods = DB::table('PersonalAva')->get();
        return view('period.list',['periods'=>$periods]);
    }

    public function add(){
        if(Input::all()){
            $input = Input::all();
            DB::table('PersonalAva')->insert([
                    'pp_id'=>$input['pp_id'],
                    'period_start'=>$input['period_start'],
                    'period_end'=>$input['period_end'],
                    'per_hours'=>$input['per_hours'],
                ]);
            return redirect('period/list');
        }else{
            return view('period.add');
        }
    }

    public function delete(){
        $input = Input::all();
        DB::table('PersonalAva')->where('pa_id',$input['id'])->delete();
        return redirect('period/list');
    }

    public function update(Request $request){
        $input = Input::all();
        if($request->isMethod('post')){
            DB::table('PersonalAva')
                ->where('pa_id',$input['id'])
                ->update([
                    'period_start'=>$input['period_start'],
                    'period_end'=>$input['period_end'],
                    'per_hours'=>$input['per_hours'],
                ]);
            return redirect('period/list');
        }else{
            $period = DB::table('PersonalAva')->where('pa_id',$input['id'])->first();
            return view('period.add',['period'=>$period]);
        }
    }
}
