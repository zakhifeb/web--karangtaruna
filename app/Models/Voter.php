<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    protected $fillable = [
        'nama',
        'nik',
        'user_id',
        'status_vote'
    ];
}