<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietDayDien extends Model
{
    protected $table = 'CHITIET_DAYDIEN';
    protected $primaryKey = 'MASP';
    public $timestamps = false;

    protected $fillable = ['MASP', 'DAI_MET', 'CHAT_LIEU', 'DONG_DIEN'];

    public function sanpham()
    {
        return $this->belongsTo(SanPham::class, 'MASP', 'MASP');
    }
}
