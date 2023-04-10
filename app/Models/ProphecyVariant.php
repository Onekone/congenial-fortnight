<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProphecyVariant extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeRandom(Builder $query)
    {
        switch (config('database.default')) {
            default:
                $function = 'RAND()';
                break;
            case 'sqlite':
                $function = 'RANDOM()';
                break;
        };
        return $query->orderByRaw("bias*$function")->limit(1)->offset(0);
    }
}
