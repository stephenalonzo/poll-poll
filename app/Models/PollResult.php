<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollResult extends Model
{
    use HasFactory;

    public $table = 'poll_result';
    public $timestamps = false;
    protected $fillable = [
        'poll_id',
        'result_id'
    ];
}
