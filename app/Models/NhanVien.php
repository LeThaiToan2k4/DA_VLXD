<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    protected $table = 'NHANVIEN';
    protected $primaryKey = 'MANV';
    public $timestamps = false;

    protected $fillable = ['TENNV', 'GIOITINH', 'DIACHI', 'DIENTHOAI', 'EMAIL', 'MACV', 'TENDANGNHAP'];

    public function taikhoan()
    {
        return $this->belongsTo(TaiKhoan::class, 'TENDANGNHAP', 'TENDANGNHAP');
    }
}
