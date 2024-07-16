@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Jobs</h1>
        <a href="{{ route('jobs.create') }}" class="btn btn-primary">Create Job</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Marketing</th>
                    <th>Period</th>
                    <th>Amount</th>
                    <th>Gross Profit</th>
                    <th>Commission</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jobs as $job)
                    <tr>
                        <td>{{ $job->marketing->name }}</td>
                        <td>{{ $job->period_job }}</td>
                        <td>{{ $job->amount }}</td>
                        <td>{{ $job->gross_profit }}</td>
                        <td>{{ $job->commission }}</td>
                        <td>
                            <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
