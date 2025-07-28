@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-4">Customer Details</h2>

    <div class="mb-6">
        <p><strong>Name:</strong> {{ $customer->name }}</p>
        <p><strong>Email:</strong> {{ $customer->email }}</p>
        <p><strong>Phone:</strong> {{ $customer->phone }}</p>
    </div>

    <h3 class="text-xl font-semibold mb-2">Notes</h3>

    <form action="{{ route('customers.notes.store', $customer) }}" method="POST" class="mb-4">
        @csrf
        <textarea name="content" class="w-full border rounded p-2 mb-2" placeholder="Add a new note..." required></textarea>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Note</button>
    </form>

    @if($customer->notes && $customer->notes->count())
    <ul>
        @foreach($customer->notes as $note)
            <li class="mb-2 border-b pb-2">
                {{ $note->content }}
                <form action="{{ route('notes.destroy', $note) }}" method="POST" class="inline-block ml-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 text-sm">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@else
    <p>No notes yet.</p>
@endif

        </div>
        @endsection

