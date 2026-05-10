<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chirps = Chirp::with('user')->latest()->take(10)->get();

        return view('home', ['chirps' => $chirps]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|max:255|min:5',
        ],
            [
                'message.required' => 'Please enter a message for your chirp.',
                'message.max' => 'Chirps may not be greater than 255 characters.',
                'message.min' => 'Chirps must be at least 5 characters.',
            ]);

        // $request->user()->chirps()->create($validated);
        Chirp::create($validated);

        return redirect('/')->with('success', 'Chirp created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp)
    {
        return view('chirps.edit', compact('chirp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp)
    {
        $validated = $request->validate([
            'message' => 'required|max:255|min:5',
        ],
            [
                'message.required' => 'Please enter a message for your chirp.',
                'message.max' => 'Chirps may not be greater than 255 characters.',
                'message.min' => 'Chirps must be at least 5 characters.',
            ]);

        $chirp->update($validated);

        return redirect('/')->with('success', 'Chirp updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp)
    {
        // $this->authorize('delete', $chirp);
        $chirp->delete();

        return redirect('/')->with('success', 'Chirp deleted successfully!');
    }
}
