<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplexSQL extends Model
{
    use HasFactory;

    protected $table= 'nms_reso_ip_switch_port';
    protected $connection =('mysql3');
    protected $guarded = [];
}
