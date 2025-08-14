<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;
    protected $fillable = [
        'poll_uid',
        'poll_question',
        'poll_option',
        'poll_multipleOptions',
        'poll_resultsVisibility'
    ];

    protected $casts = [
        'poll_option' => 'array'
    ];

    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
