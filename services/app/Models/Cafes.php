<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cafes extends Model
{
    use HasFactory;

    protected $table      = 'cafes_session';
    protected $guarded    = [];
    public    $timestamps = true;

    protected $fillable = [
        'id',
        'remark',
        'open_time',
        'close_time'
    ];
}
