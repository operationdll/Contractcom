<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class CompanyController extends Controller{
    public function getList(){
        if(Input::all()){
            $input = Input::all();
            $companies = DB::table('CompanyProfile')
                ->where('company_name','like','%'.$input['name'].'%')
                ->get();
            echo $companies;
        }else{
            $companies = DB::table('CompanyProfile')->get();
            return view('company.list',['companies'=>$companies]);
        }
    }

    public function add(){
        if(Input::all()){
            $input = Input::all();
            DB::table('CompanyProfile')->insert([
                    'company_name'=>$input['cname'],
                    'reg_no'=>$input['reg_no'],
                    'office_address'=>$input['office_address'],
                    'telephone'=>$input['telephone'],
                    'phone'=>$input['phone'],
                    'contact_person'=>$input['contact_person'],
                    'email'=>$input['email'],
                    'short_desc'=>$input['shortDesc'],
                    'user_id'=>$input['user_id'],
                ]);
            return redirect('company/list');
        }else{
            return view('company.add');
        }
    }

    public function delete(){
        $input = Input::all();
        DB::table('CompanyProfile')->where('cp_id',$input['id'])->delete();
        return redirect('company/list');
    }

    public function update(Request $request){
        $input = Input::all();
        if($request->isMethod('post')){
            DB::table('CompanyProfile')
                ->where('cp_id',$input['id'])
                ->update([
                    'company_name'=>$input['cname'],
                    'reg_no'=>$input['reg_no'],
                    'office_address'=>$input['office_address'],
                    'telephone'=>$input['telephone'],
                    'phone'=>$input['phone'],
                    'contact_person'=>$input['contact_person'],
                    'email'=>$input['email'],
                    'short_desc'=>$input['shortDesc'],
                ]);
            return redirect('company/list');
        }else{
            $company = DB::table('CompanyProfile')->where('cp_id',$input['id'])->first();
            return view('company.add',['company'=>$company]);
        }
    }
}
