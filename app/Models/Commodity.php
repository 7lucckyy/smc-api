<?php

namespace App\Models;

use App\Models\Scopes\FilterScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commodity extends Model
{
    use HasFactory;

    protected $fillable = [
        'lga', 'spaq1', 'spaq2', 'total_spaq', 'cycle', 'day', 
    ];


    protected static function booted(): void
    {
        static::addGlobalScope(new FilterScope);
    }
}
