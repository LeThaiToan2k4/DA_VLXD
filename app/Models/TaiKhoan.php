<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaiKhoan extends Model
{
    protected $table = 'TAIKHOAN';
    protected $primaryKey = 'TENDANGNHAP';
    public $incrementing = false; 
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['TENDANGNHAP', 'MATKHAU', 'QUYEN'];
}
