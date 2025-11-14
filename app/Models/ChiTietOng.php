<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietOng extends Model
{
    protected $table = 'CHITIET_ONG';
    protected $primaryKey = 'MASP';
    public $timestamps = false;

    protected $fillable = ['MASP', 'CHIEU_DAI', 'DUONG_KINH', 'CHAT_LIEU'];

    public function sanpham()
    {
        return $this->belongsTo(SanPham::class, 'MASP', 'MASP');
    }
}
