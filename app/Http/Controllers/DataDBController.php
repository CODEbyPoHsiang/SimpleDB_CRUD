<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataDB;
use App\Models\DataDB2;


class DataDBController extends Controller
{
     public function index()
    {
        $data_db = DataDB::all();
        $data_db2= DataDB2::all();
        return (['db1'=>$data_db,'db2'=>$data_db2]);
    }

    public function update(Request $request,$name)
    {
        $data_db = DataDB::find($name);
        $data_db2= DataDB2::find($name);

        // 逐欄方式新增
        $data_db->hostname = $request->name;
        $data_db2->name = $request->name;
        $data_db->save();
        $data_db2->save();

        //使用ORM方式編輯
        //使用ORM方式編輯，必須兩張表都有欄位才能正確寫入，如果要給值的欄位只有一張表才有，使用QRM方式編輯會報錯
        // $user->update($request->all());
        // $user2->update($request->all());

        return (['db1'=>$data_db,'db2'=>$data_db2]);
    }

    public function store(Request $request)
    {
        //逐欄新增
        $data_db = new DataDB;
        $data_db2 = new DataDB2;
        $data_db->hostname = $request->name;
        $data_db2->name = $request->name;
        $data_db->save();
        $data_db2->save();

       //使用ORM方式新增
        //使用ORM方式新增，必須兩張表都有欄位才能正確寫入，如果要給值的欄位只有一張表才有，使用QRM方式新增會報錯
        // $user= User::create($request->all());
        // $user2= User2::create($request->all());


        return (['db1'=>$data_db,'db2'=>$data_db2]);
    }

    public function destroy(Request $request,$name)
    {
       
        $data_db= DataDB::destroy($name);
        $data_db2= DataDB2::destroy($name);
        return (['db1'=>"ok",'db2'=>"ok"]);
    }
   
}
