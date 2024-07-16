<?php 

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Marketing;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('marketing')->get();
        return view('jobs.index', compact('jobs'));
    }

    public function create()
    {
        $marketings = Marketing::all();
        return view('jobs.create', compact('marketings'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'marketing_id' => 'required',
            'period_job' => 'required|date',
            'amount' => 'required|numeric',
            'gross_profit' => 'required|numeric',
        ]);

        $data['commission'] = $data['gross_profit'] * 0.1;
        Job::create($data);

        return redirect()->route('jobs.index');
    }

    public function show(Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    public function edit(Job $job)
    {
        $marketings = Marketing::all();
        return view('jobs.edit', compact('job', 'marketings'));
    }

    public function update(Request $request, Job $job)
    {
        $data = $request->validate([
            'marketing_id' => 'required',
            'period_job' => 'required|date',
            'amount' => 'required|numeric',
            'gross_profit' => 'required|numeric',
        ]);

        $data['commission'] = $data['gross_profit'] * 0.1;
        $job->update($data);

        return redirect()->route('jobs.index');
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('jobs.index');
    }
}
