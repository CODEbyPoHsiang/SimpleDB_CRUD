<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrimitiveSQL;
use DB;

class PrimitiveSQLController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 使用ORM取資料
        // $data = Data::all();

        // 使用原生語法
        $data = DB::select('SELECT * FROM data');
        return (['data'=>$data]);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 使用ORM方式寫入
        // $data = Data::create($request->all());


        // 使用原生語法寫入
        $name = $request->name;
        $email = $request->email;
        $sql = "INSERT INTO data (name, email) VALUES (?, ?)";
        $insert_data = DB::insert($sql, [$name,$email ]);
        $data = DB::select("SELECT * FROM data WHERE name = ?", [$name]);

        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        //使用ORM方式取資料
        // $data = DATA::find($name);

        //使用原生語法取資料
        $data = DB::select('SELECT * FROM  data WHERE name = ?', [$name]);
        
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $name)
    {

        //使用ORM方式編輯
        // $data = Data::find($name)->update($request->all());

        //使用原生語法編輯
        $email = $request->email;
        $update_data = DB::update('UPDATE data SET email =  ? WHERE name = ?', [$email,$name]);
        $data = DB::select('SELECT * FROM data WHERE name = ?', [$name]);
        
        return $data ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($name)
    {
        //使用ORM方式刪除
        // $data = Data::destroy($name);

        //使用生語法刪除
        $data = DB::delete('DELETE FROM data WHERE name = ?', [$name]);
        
        return "delete success";
    }//
}
