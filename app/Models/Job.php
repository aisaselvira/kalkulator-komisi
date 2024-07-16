<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'marketing_id', 'period_job', 'amount', 'gross_profit', 'commission'
    ];

    public function marketing()
    {
        return $this->belongsTo(Marketing::class);
    }

    public function calculateCommission()
    {
        return $this->gross_profit * 0.1;
    }
}
