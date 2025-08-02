@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Customers with Tag: {{ $tag->name }}</h1>

    @if($customers->count())
        <ul>
            @foreach($customers as $customer)
                <li class="mb-2">
                    <a href="{{ route('customers.show', $customer) }}" class="text-blue-600 hover:underline">
                        {{ $customer->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <p>No customers found for this tag.</p>
    @endif
@endsection
