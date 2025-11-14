<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietDa extends Model
{
    protected $table = 'CHITIET_DA';
    protected $primaryKey = 'id'; // hoặc khóa chính thực tế
    public $timestamps = false; // nếu bảng không có created_at/updated_at
}
