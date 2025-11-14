<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = 'SANPHAM';
    protected $primaryKey = 'MASP';
    public $timestamps = false;

    protected $fillable = [
        'TENSP',
        'MALOAI',
        'MADVT',
        'DONGIABAN',
        'BANLE',
        'MOTA',
        'HINHANH'
    ];

    public function loai()
    {
        return $this->belongsTo(LoaiSanPham::class, 'MALOAI', 'MALOAI');
    }
    public function donViTinh()
    {
        return $this->belongsTo(DonViTinh::class, 'MADVT', 'MADVT');
    }

    public function tonKho()
    {
        return $this->hasMany(TonKho::class, 'MASP', 'MASP');
    }

    public function chiTietCat()
    {
        return $this->hasOne(ChiTietCat::class, 'MASP', 'MASP');
    }
     public function chiTietDa()
    {
        return $this->hasMany(ChiTietDa::class, 'MASP', 'MASP'); // MASP là khóa ngoại
    }
     public function chiTietXimang()
    {
        return $this->hasMany(ChiTietXimang::class, 'MASP', 'MASP');
    }

    // public function chitiet()
    // {
    //     return $this->hasOne(ChiTietSanPham::class, 'MASP', 'MASP');
    // }
}
