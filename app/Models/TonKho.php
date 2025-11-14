<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TonKho extends Model
{
    protected $table = 'TONKHO'; // ✅ tên bảng chính xác trong SQL Server
    protected $primaryKey = 'ID'; // hoặc 'MASP' nếu bạn dùng MASP làm khóa chính
    public $timestamps = false;

    protected $fillable = [
        'MASP',
        'SOLUONG'
    ];
     public function sanPham()
    {
        return $this->belongsTo(SanPham::class, 'MASP', 'MASP');
    }
}
