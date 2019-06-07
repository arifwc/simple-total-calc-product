<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $fillable = ['user_id','pesanan','jumlah','totalharga'];
    public $timestamps = false;
}
