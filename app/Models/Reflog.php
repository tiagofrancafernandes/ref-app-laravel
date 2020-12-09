<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reflog extends Model
{
    use HasFactory;

    protected $fillable = [
        'ref',
        'ref_count',
        'title',
        'note',
    ];
}
