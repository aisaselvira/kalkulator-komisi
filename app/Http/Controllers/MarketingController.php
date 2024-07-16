<?php

namespace App\Http\Controllers;

use App\Models\Marketing;
use Illuminate\Http\Request;

class MarketingController extends Controller
{
    public function index()
    {
        $marketings = Marketing::all();
        return view('marketings.index', compact('marketings'));
    }

    public function create()
    {
        return view('marketings.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate(['name' => 'required']);
        Marketing::create($data);

        return redirect()->route('marketings.index');
    }

    public function show(Marketing $marketing)
    {
        return view('marketings.show', compact('marketing'));
    }

    public function edit(Marketing $marketing)
    {
        return view('marketings.edit', compact('marketing'));
    }

    public function update(Request $request, Marketing $marketing)
    {
        $data = $request->validate(['name' => 'required']);
        $marketing->update($data);

        return redirect()->route('marketings.index');
    }

    public function destroy(Marketing $marketing)
    {
        $marketing->delete();
        return redirect()->route('marketings.index');
    }
}


