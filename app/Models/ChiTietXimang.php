<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietXimang extends Model
{
    protected $table = 'CHITIET_XIMANG';
    protected $primaryKey = 'MASP';
    public $timestamps = false;

    protected $fillable = ['MASP', 'KHOILUONG', 'NHANHIEU', 'NGOAIDACDIEM'];

    public function sanpham()
    {
        return $this->belongsTo(SanPham::class, 'MASP', 'MASP');
    }
}
