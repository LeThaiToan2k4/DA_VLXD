<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietPhuKienOng extends Model
{
    protected $table = 'CHITIET_PHUKIENONG';
    protected $primaryKey = 'MASP';
    public $timestamps = false;

    protected $fillable = ['MASP', 'DUONG_KINH', 'LOAI_PHUKIEN', 'CHAT_LIEU'];

    public function sanpham()
    {
        return $this->belongsTo(SanPham::class, 'MASP', 'MASP');
    }
}
