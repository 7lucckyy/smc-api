<?php

namespace App\Models;

use App\Models\Scopes\FilterScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cohort extends Model
{
    use HasFactory;

    protected $fillable = ['lga', 'boys_spaq1', 'boys_spaq2', 'girls_spaq1', 'girls_spaq2', 'total_reached', 'cycle', 'day'];

   
    protected static function booted(): void
    {
        static::addGlobalScope(new FilterScope);
    }
}


