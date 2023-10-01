<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExportCohortTemplate extends Model
{
    use HasFactory;

    protected $fillable = ['lga', 'spaq1_boys', 'spaq2_boys', 'spaq1_girls', 'spaq2_girls', 'total_reached', 'cycle', 'day'];

}
