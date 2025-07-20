@extends('layouts.app')

@section('content')
    <h1 class="text-xl font-bold mb-4">Edit Customer</h1>

    <form action="{{ route('customers.update', $customer) }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label>Name</label>
            <input type="text" name="name" class="w-full p-2 border rounded" value="{{ old('name', $customer->name) }}">
        </div>

        <div class="mb-4">
            <label>Email</label>
            <input type="email" name="email" class="w-full p-2 border rounded" value="{{ old('email', $customer->email) }}">
        </div>

        <div class="mb-4">
            <label>Phone</label>
            <input type="text" name="phone" class="w-full p-2 border rounded" value="{{ old('phone', $customer->phone) }}">
        </div>

        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Update</button>
    </form>
@endsection
