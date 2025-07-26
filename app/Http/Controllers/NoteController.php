<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, Customer $customer)
{
    $request->validate([
        'content' => 'required|string',
    ]);

    $customer->notes()->create([
        'content' => $request->content,
    ]);

    return redirect()->route('customers.show', $customer)->with('success', 'Note added successfully');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $customerId = $note->customer_id;
        $note->delete();

        return redirect()->route('customers.show', $customerId)->with('successs', 'Note deleted successfully');
    }
}
