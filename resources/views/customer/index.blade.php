<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Customers</h2>
    </x-slot>

    @if (session('success'))
        <div class="p-4 mb-4 text-green-700 bg-green-100 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('customers.store') }}" method="POST" class="mb-4">
        @csrf
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="phone" placeholder="Phone" required>
        <button type="submit">Add Customer</button>
    </form>

    <ul>
        @foreach ($customers as $customer)
            <li>{{ $customer->name }} - {{ $customer->email }} - {{ $customer->phone }}</li>
        @endforeach
    </ul>
</x-app-layout>
