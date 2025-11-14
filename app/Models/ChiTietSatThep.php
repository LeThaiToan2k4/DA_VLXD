<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietSatThep extends Model
{
    protected $table = 'CHITIET_SATTHEP';
    protected $primaryKey = 'MASP';
    public $timestamps = false;

    protected $fillable = ['MASP', 'CHIEU_DAI', 'DUONG_KINH', 'KHOI_LUONG', 'LOAI_THEP'];

    public function sanpham()
    {
        return $this->belongsTo(SanPham::class, 'MASP', 'MASP');
    }
}
