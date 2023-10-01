<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coverage extends Model
{
    use HasFactory;

    protected $fillable = ['lga', 'cdd_teams', 'cdd_syched', 'child_who_received_spaq1', 'child_who_received_spaq2', 'redose_spaq1', 'redose_spaq2', 'referral1', 'referral2', 'adr1', 'adr2', 'total_spaq', 'total_wastage', 'day', 'cycle'];
}
