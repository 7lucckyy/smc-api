<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExportCohortTemplate extends Model
{
    use HasFactory;

    protected $fillable = ['lga', 'boys_spaq1', 'boys_spaq2', 'girls_spaq1', 'girls_spaq2', 'total_reached', 'cycle', 'day'];

}
