@extends('layouts.app')

@section('content')
    <h1 class="text-xl font-bold mb-4">Add New Customer</h1>

    <form action="{{ route('customers.store') }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf

        <div class="mb-4">
            <label>Name</label>
            <input type="text" name="name" class="w-full p-2 border rounded" value="{{ old('name') }}">
        </div>

        <div class="mb-4">
            <label>Email</label>
            <input type="email" name="email" class="w-full p-2 border rounded" value="{{ old('email') }}">
        </div>

        <div class="mb-4">
            <label>Phone</label>
            <input type="text" name="phone" class="w-full p-2 border rounded" value="{{ old('phone') }}">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create</button>
    </form>
@endsection
