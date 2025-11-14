<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietThietBiDien extends Model
{
    protected $table = 'CHITIET_THIETBIDIEN';
    protected $primaryKey = 'MASP';
    public $timestamps = false;

    protected $fillable = ['MASP', 'LOAI', 'CHAT_LIEU', 'DONG_DIEN'];

    public function sanpham()
    {
        return $this->belongsTo(SanPham::class, 'MASP', 'MASP');
    }
}
