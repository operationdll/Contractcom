<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class ProjectController extends Controller{
    public function getList(){
        if(Input::all()){
            $input = Input::all();
            $projects = DB::table('Project')
                ->where('pro_name','like','%'.$input['name'].'%')
                ->get();
            echo $projects;
        }else{
            $projects = DB::table('Project')->get();
            return view('project.list',['projects'=>$projects]);
        }
    }

    public function add(){
        if(Input::all()){
            $input = Input::all();
            DB::table('Project')->insert([
                    'cp_id'=>$input['cp_id'],
                    'pro_name'=>$input['pro_name'],
                    'start_time'=>$input['start_time'],
                    'project_desc'=>$input['project_desc'],
                    'project_hours'=>$input['project_hours'],
                ]);
            return redirect('project/list');
        }else{
            return view('project.add');
        }
    }

    public function delete(){
        $input = Input::all();
        DB::table('Project')->where('pro_id',$input['id'])->delete();
        return redirect('project/list');
    }

    public function update(Request $request){
        $input = Input::all();
        if($request->isMethod('post')){
            DB::table('Project')
                ->where('pro_id',$input['id'])
                ->update([
                    'pro_name'=>$input['pro_name'],
                    'start_time'=>$input['start_time'],
                    'project_desc'=>$input['project_desc'],
                    'project_hours'=>$input['project_hours'],
                ]);
            return redirect('project/list');
        }else{
            $project = DB::table('Project')->where('pro_id',$input['id'])->first();
            return view('project.add',['project'=>$project]);
        }
    }
}
