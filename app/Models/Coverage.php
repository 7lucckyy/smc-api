<?php

namespace App\Models;

use App\Models\Scopes\FilterScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coverage extends Model
{
    use HasFactory;

    protected $fillable = ['lga', 'cdd_teams', 'cdd_syched', 'child_who_received_spaq1', 'child_who_received_spaq2', 'redose_spaq1', 'redose_spaq2', 'referral1', 'referral2', 'total_adr', 'total_ineligible', 'target', 'total_spaq', 'total_wastage', 'day', 'cycle'];

    protected static function booted(): void
    {
        static::addGlobalScope(new FilterScope);
    }
}
