<?php

namespace App\Http\Controllers\Applications;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class ApplicationsController extends Controller{
    public function getList(){
        $applications = DB::table('Applications')->get();
        return view('applications.list',['applications'=>$applications]);
    }

    public function add(){
        if(Input::all()){
            $input = Input::all();
            DB::table('Applications')->insert([
                    'pro_id'=>$input['pro_id'],
                    'pp_id'=>$input['pp_id'],
                    'letter'=>$input['letter'],
                ]);
            return redirect('applications/list');
        }else{
            return view('applications.add');
        }
    }

    public function delete(){
        $input = Input::all();
        DB::table('Applications')->where('app_id',$input['id'])->delete();
        return redirect('applications/list');
    }

    public function update(Request $request){
        $input = Input::all();
        if($request->isMethod('post')){
            DB::table('Applications')
                ->where('app_id',$input['id'])
                ->update([
                    'pro_id'=>$input['pro_id'],
                    'pp_id'=>$input['pp_id'],
                    'letter'=>$input['letter'],
                ]);
            return redirect('applications/list');
        }else{
            $application = DB::table('Applications')->where('app_id',$input['id'])->first();
            return view('applications.add',['application'=>$application]);
        }
    }
}
