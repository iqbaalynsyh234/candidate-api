<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidate extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'candidate';
    protected $fillable = [
        'name',
        'education',
        'skill',
        'phone',
        'email',
        'experience',
        'last_position',
        'applied_position',
    ];

    protected $hidden = [];
}
