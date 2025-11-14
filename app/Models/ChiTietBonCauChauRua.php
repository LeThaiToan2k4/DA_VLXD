<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietBonCauChauRua extends Model
{
    protected $table = 'CHITIET_BONCAU_CHAURUA';
    protected $primaryKey = 'MASP';
    public $timestamps = false;

    protected $fillable = ['MASP', 'KICHTHUOC', 'MAU', 'CHAT_LIEU'];

    public function sanpham()
    {
        return $this->belongsTo(SanPham::class, 'MASP', 'MASP');
    }
}
