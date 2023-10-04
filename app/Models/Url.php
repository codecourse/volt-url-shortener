<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'hashid',
        'visits'
    ];

    public function redirectUrl()
    {
        return route('redirect', ['url' => $this]);
    }
}
