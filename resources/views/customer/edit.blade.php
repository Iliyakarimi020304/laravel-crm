@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded shadow">
    <h1 class="text-xl font-bold mb-4">Edit Customer</h1>

    <form method="POST" action="{{ route('customers.update', $customer) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block font-semibold mb-1">Name</label>
            <input id="name" name="name" type="text" value="{{ old('name', $customer->name) }}" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block font-semibold mb-1">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email', $customer->email) }}" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-4">
            <label for="phone" class="block font-semibold mb-1">Phone</label>
            <input id="phone" name="phone" type="text" value="{{ old('phone', $customer->phone) }}" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-4">
            <label for="tags" class="block font-bold">Tags</label>
            <select name="tags[]" multiple class="w-full border rounded p-2">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}"
                        @if(isset($customer) && $customer->tags->contains($tag->id)) selected @endif>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update Customer</button>
    </form>
</div>
@endsection
