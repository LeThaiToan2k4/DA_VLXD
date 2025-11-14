<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietCat extends Model
{
    protected $table = 'CHITIET_CAT';
    protected $primaryKey = 'MASP';
    public $timestamps = false;

    protected $fillable = ['MASP', 'KICHCO_HAT', 'MUCDO_SACH', 'XUATXU'];

    public function sanpham()
    {
        return $this->belongsTo(SanPham::class, 'MASP', 'MASP');
    }
}
