<?php

namespace App\Models;

use App\Models\Scopes\FilterScope;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AbstractModel extends Model
{
    use HasUuids, SoftDeletes, HasFactory;
    
    protected $guarded = [];

    protected static function booted(): void
    {
        static::addGlobalScope(new FilterScope);
    }
}