<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'book';
    protected $fillable = [
        'nik',
        'name',
        'jabatan',
        'golongan',
        'tmt_golongan',
        'eselon',
        'tmt_eselon',
    ];
}
