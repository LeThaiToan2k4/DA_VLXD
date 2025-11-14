<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietSon extends Model
{
    protected $table = 'CHITIET_SON';
    protected $primaryKey = 'MASP';
    public $timestamps = false;

    protected $fillable = ['MASP', 'MAU', 'THE_TICH', 'LOAI_BENMAT'];

    public function sanpham()
    {
        return $this->belongsTo(SanPham::class, 'MASP', 'MASP');
    }
}
