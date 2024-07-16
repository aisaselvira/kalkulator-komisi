@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Job</h1>
        <form action="{{ route('jobs.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="marketing_id">Marketing</label>
                <select name="marketing_id" id="marketing_id" class="form-control">
                    @foreach($marketings as $marketing)
                        <option value="{{ $marketing->id }}">{{ $marketing->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="period_job">Period Job</label>
                <input type="date" name="period_job" id="period_job" class="form-control">
            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="text" name="amount" id="amount" class="form-control">
            </div>
            <div class="form-group">
                <label for="gross_profit">Gross Profit</label>
                <input type="text" name="gross_profit" id="gross_profit" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Create Job</button>
        </form>
    </div>
@endsection
