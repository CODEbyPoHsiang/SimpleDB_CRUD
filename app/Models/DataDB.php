<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDB extends Model
{
    use HasFactory;

     
    protected $table= 'data_db_1';

    protected $guarded = [];


 


      // 定義主key
  protected $primaryKey = "name";
  // 主鍵是否遞增
  public $incrementing = false;
  // 主鍵型別
  protected $keyType = 'string';
}
