<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonViTinh extends Model
{
    protected $table = 'DONVITINH';
    protected $primaryKey = 'MADVT';
    public $timestamps = false;

    protected $fillable = ['TENDVT'];
}
