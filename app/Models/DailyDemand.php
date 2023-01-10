<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyDemand extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'j_1' => 'json',
        'j_2' => 'json',
        'j_3' => 'json',
        'j_4' => 'json',
        'j_5' => 'json',
        'j_6' => 'json',
        'j_7' => 'json',
        'j_8' => 'json',
        'j_9' => 'json',
        'j_10' => 'json',
        't_1' => 'json',
        't_2' => 'json',
        't_3' => 'json',
        't_4' => 'json',
    ];

    public function scopeFilter($query)
    {
        if (!request()->has('date')) {
            return $query->whereDate('date', Carbon::now()->format('Y-m-d'));
        }
        return $query->when(request('date'), function ($q) {
            $q->whereDate('date', Carbon::parse(request()->date)->format('Y-m-d'));
        });
    }
}
