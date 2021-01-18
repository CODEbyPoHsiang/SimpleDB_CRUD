<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ComplexSQL;
use DB;

class ComplexSQLController extends Controller
{
    public function index()
    {
        $sql = "SELECT * FROM nms_reso_ip_switch_port WHERE ( mac LIKE '%0050569369c4%' OR mac LIKE '%0050569363e9%' OR mac LIKE '%0050569314e6%' OR mac LIKE '%005056938c98%' ) AND p_name NOT IN ( 'port-channel48', 'port-channel128' ) AND p_alias NOT LIKE 'uplink:%' AND p_alias NOT LIKE 'LAN:%' AND p_alias NOT LIKE 'n7018%' AND REPLACE ( p_name, 'port-channel', '' )" ;
        $data = DB::connection('mysql3')->select($sql); 
        return $data ;
    }
}
