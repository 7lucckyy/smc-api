<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExportCoverageTemplate extends Model
{
    use HasFactory;

    protected $fillable = ['lga', 'cdd_teams', 'ccd_synched', 'child_spaq1', 'child_spaq2', 'redose_spaq1', 'redose_spaq2', 'referral1', 'referral2', 'adr1', 'adr2', 'total_spaq', 'total_wastage', 'day', 'cycle'];

}
