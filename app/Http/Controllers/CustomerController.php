<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::where('user_id', Auth::id())->get();
        return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        return view('customer.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required|string|max:20',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
        ]);


        $Customer = Customer::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        $Customer->tags()->sync($request->tags);

        return redirect()->route('customers.index')->with('success', 'Customer added successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
{
    if ($customer->user_id !== Auth::id()) {
        abort(403);
    }

    $customer->load('notes', 'tags');

    return view('customer.show', compact('customer'));
}



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        if ($customer->user_id !== Auth::id()){
            abort(403);
        }
        $tags = Tag::all();
        return view('customer.edit', compact('customer', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        if ($customer->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:customers,email,{$customer->id}",
            'phone' => 'required|string|max:20',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
        ]);

        $customer->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        $customer->tags()->sync($request->tags);

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        if ($customer->user_id !== Auth::id()) {
            abort(403);
        }
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully');
    }
}
