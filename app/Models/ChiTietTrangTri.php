<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietTrangTri extends Model
{
    protected $table = 'CHITIET_TRANGTRI';
    protected $primaryKey = 'MASP';
    public $timestamps = false;

    protected $fillable = ['MASP', 'KICHTHUOC', 'MAU', 'CHAT_LIEU'];

    public function sanpham()
    {
        return $this->belongsTo(SanPham::class, 'MASP', 'MASP');
    }
}
