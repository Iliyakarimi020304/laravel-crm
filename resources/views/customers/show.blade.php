@extends('layouts.app')

@section('content')
    <h1 class="text-xl font-bold mb-4">Customer Details</h1>

    <div class="bg-white p-6 rounded shadow">
        <p><strong>Name:</strong> {{ $customer->name }}</p>
        <p><strong>Email:</strong> {{ $customer->email }}</p>
        <p><strong>Phone:</strong> {{ $customer->phone }}</p>

        <a href="{{ route('customers.index') }}" class="text-blue-500 mt-4 inline-block">← Back to List</a>
    </div>
@endsection
