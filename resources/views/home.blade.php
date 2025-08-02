@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-6">Welcome to Your CRM</h1>

    @auth
        <p class="mb-4 text-gray-700">Hello, {{ Auth::user()->name }}!</p>
        <a href="{{ route('customers.index') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
            Go to customers list
        </a>
    @else
        <p class="mb-4 text-gray-700">Please log in or register to access your CRM dashboard.</p>
        <div class="space-x-4">
            <a href="{{ route('login') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                Login
            </a>
            <a href="{{ route('register') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">
                Register
            </a>
        </div>
    @endauth
</div>
@endsection
