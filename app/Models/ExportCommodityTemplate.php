<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExportCommodityTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'lga', 'spaq1', 'spaq2', 'total_spaq'
    ];
}
