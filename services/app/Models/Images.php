<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;

    protected $table      = 'images';
    protected $guarded    = [];
    public    $timestamps = true;

    protected $fillable = [
        'ref_id',
        'name'
    ];

    protected $appends = [
        'path'
    ];

    public function getPathAttribute()
    {
        return asset('/public/storage/rating/'.$this->name);
    }
}
