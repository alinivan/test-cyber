@extends('layout')

@section('title')
    {{ isset($id) ? 'Editing ' . $name : 'Add new Event' }}
@endsection

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ isset($id) ? url('/event/'.$id) : url('events') }}" method="POST" class="space-y-8 divide-y divide-gray-200 max-w-xl mx-auto mt-10">
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
            <h3 class="text-lg leading-6 font-medium text-gray-900">{{ isset($id) ? 'Editing ' . $name : 'Add new Event' }}</h3>

            <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                {{ csrf_field() }}

                <label for="name" class="block text-sm font-medium text-gray-700">Event name</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input type="text" name="name" placeholder="Event name" value="{{ $name ?? '' }}" id="name" class="block w-full pr-10 sm:text-sm rounded-md p-2 border">
                </div>

                <label for="date" class="block text-sm font-medium text-gray-700">Event date</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input type="text" name="date" placeholder="Event date" value="{{ $date ?? '' }}" id="date" class="block w-full pr-10 sm:text-sm rounded-md p-2 border">
                </div>

                <label for="date" class="block text-sm font-medium text-gray-700">Done</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input type="text" name="done" placeholder="Event date" value="{{ $done ?? 0 }}" id="date" class="block w-full pr-10 sm:text-sm rounded-md p-2 border">
                </div>
            </div>
        </div>

        <div class="pt-5">
            <div class="flex justify-end">
                <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
            </div>
        </div>
    </form>
@endsection
