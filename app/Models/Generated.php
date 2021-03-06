<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generated extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'slug',
        'teams',
        'days'
    ];

    protected $hidden = ['days', 'updated_at'];

    protected $casts = [
        'teams' => 'array',
    ];
}
