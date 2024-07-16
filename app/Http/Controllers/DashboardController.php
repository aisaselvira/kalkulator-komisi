<?php 

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Marketing;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $marketingData = Job::selectRaw('marketing_id, COUNT(*) as job_count')
            ->groupBy('marketing_id')
            ->orderBy('job_count', 'desc')
            ->with('marketing')
            ->get()
            ->map(function ($job) {
                return [
                    'label' => $job->marketing->name,
                    'data' => $job->job_count
                ];
            });

        $profitData = Job::selectRaw('DATE_FORMAT(period_job, "%Y-%m") as period, SUM(gross_profit) as total_profit')
            ->groupBy('period')
            ->orderBy('period', 'asc')
            ->get()
            ->map(function ($job) {
                return [
                    'label' => Carbon::parse($job->period)->format('M Y'),
                    'data' => $job->total_profit
                ];
            });

        return view('dashboard', [
            'marketingData' => [
                'labels' => $marketingData->pluck('label'),
                'data' => $marketingData->pluck('data')
            ],
            'profitData' => [
                'labels' => $profitData->pluck('label'),
                'data' => $profitData->pluck('data')
            ]
        ]);
    }
}
