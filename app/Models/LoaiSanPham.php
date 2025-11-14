<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    protected $table = 'LOAISANPHAM';
    protected $primaryKey = 'MALOAI';
    public $timestamps = false;

    protected $fillable = ['TENLOAI'];
}
