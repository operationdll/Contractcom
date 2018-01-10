<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class UserController extends Controller{
    public function getList(){
        if(Input::all()){
            $input = Input::all();
            $users = DB::table('Users')
                ->where('username','like','%'.$input['name'].'%')
                ->get();
            echo $users;
        }else{
            $users = DB::table('Users')->get();
            return view('user.list',['users'=>$users]);
        }
    }

    public function add(){
        if(Input::all()){
            $input = Input::all();
            DB::table('Users')->insert([
                    'username'=>$input['username'],
                    'password'=>$input['password'],
                    'usertype'=>$input['usertype'],
                ]);
            return redirect('user/list');
        }else{
            return view('user.add');
        }
    }

    public function delete(){
        $input = Input::all();
        DB::table('Users')->where('user_id',$input['id'])->delete();
        return redirect('user/list');
    }

    public function update(Request $request){
        $input = Input::all();
        if($request->isMethod('post')){
            DB::table('Users')
                ->where('user_id',$input['id'])
                ->update([
                    'username'=>$input['username'],
                    'password'=>$input['password'],
                    'usertype'=>$input['usertype'],
                ]);
            return redirect('user/list');
        }else{
            $user = DB::table('Users')->where('user_id',$input['id'])->first();
            return view('user.add',['user'=>$user]);
        }
    }

}
