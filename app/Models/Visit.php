<?php

namespace App\Models;

use App\Models\Scopes\FilterScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = ['lga', 'ward', 'hf', 'username', 'phone', 'total_spaq_administered', 'cycle', 'day'];

    protected static function booted(): void
    {
        static::addGlobalScope(new FilterScope);
    }
}
