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

    public function dvt()
    {
        return $this->belongsTo(DonViTinh::class, 'MADVT', 'MADVT');
    }

    public function chitietCat()
    {
        return $this->hasOne(ChiTietCat::class, 'MASP', 'MASP');
    }
    public function chitietDa()
    {
        return $this->hasOne(ChiTietDa::class, 'MASP', 'MASP');
    }
    public function chitietXimang()
    {
        return $this->hasOne(ChiTietXimang::class, 'MASP', 'MASP');
    }
    public function chitietSatThep()
    {
        return $this->hasOne(ChiTietSatThep::class, 'MASP', 'MASP');
    }
    public function chitietGach()
    {
        return $this->hasOne(ChiTietGach::class, 'MASP', 'MASP');
    }
    public function chitietSon()
    {
        return $this->hasOne(ChiTietSon::class, 'MASP', 'MASP');
    }
    public function chitietOng()
    {
        return $this->hasOne(ChiTietOng::class, 'MASP', 'MASP');
    }
    public function chitietPhuKienOng()
    {
        return $this->hasOne(ChiTietPhuKienOng::class, 'MASP', 'MASP');
    }
    public function chitietBonCauChauRua()
    {
        return $this->hasOne(ChiTietBonCauChauRua::class, 'MASP', 'MASP');
    }
    public function chitietDayDien()
    {
        return $this->hasOne(ChiTietDayDien::class, 'MASP', 'MASP');
    }
    public function chitietThietBiDien()
    {
        return $this->hasOne(ChiTietThietBiDien::class, 'MASP', 'MASP');
    }
    public function chitietTrangTri()
    {
        return $this->hasOne(ChiTietTrangTri::class, 'MASP', 'MASP');
    }
}
