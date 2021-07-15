<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Story extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'body',
        'type',
        'status',
    ];

    public function user() {
        return $this->belongsTo(\App\Models\User::class);
    }

    protected static function booted()
    {
//        static::addGlobalScope('active', function (Builder $builder) {
//            $builder->where('status', 1);
//        });
    }
}
