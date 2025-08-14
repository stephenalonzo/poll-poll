<?php

namespace App\Models;

use App\Http\Requests\ResultRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'poll_id',
        'option',
        'voter_ip',
    ];

    public function polls()
    {
        return $this->belongsToMany(Poll::class);
    }
}
