<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietDa extends Model
{
    protected $table = 'CHITIET_DA';
    protected $primaryKey = 'MASP';
    public $timestamps = false;

    protected $fillable = ['MASP', 'KICHCO', 'LOAI_DA', 'XUATXU'];

    public function sanpham()
    {
        return $this->belongsTo(SanPham::class, 'MASP', 'MASP');
    }
}
