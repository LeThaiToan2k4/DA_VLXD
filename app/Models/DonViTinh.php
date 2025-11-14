<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonViTinh extends Model
{
    protected $table = 'DONVITINH'; // <-- tên bảng đúng trong SQL Server
    protected $primaryKey = 'MADVT'; // <-- tên cột khóa chính
    public $timestamps = false;       // nếu không có created_at/updated_at
}
