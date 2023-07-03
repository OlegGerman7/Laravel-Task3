@extends('layouts.app')

@section('title', 'All Events')

@section('content')

<div class="flex min-h-96 my-12 mx-12">
   <x-sidebar />
    <div class="bg-white flex flex-col flex-grow ml-11 rounded-2xl">
        <main class="mx-10 my-12">
            <div class="flex border-b mb-5 pb-5 justify-between items-center">
                <h2 class="text-xl font-normal">All Events</h2>
                <a href="{{route('events.create')}}" class="bg-red-500 hover:bg-red-500 text-white px-6 py-2 rounded-lg">Create new event</a>
            </div>
            <ul>
                @foreach($events as $event)
                <li class="flex justify-between items-center border	rounded-lg px-5 py-5 mb-5">
                    <div>
                        <h2 class="text-2xl mb-2 text-gray-700">{{$event->title}}</h2>
                        <p class="text-2xl mb-2 text-gray-500">{{$event->description}}</p>
                    </div>
                    <div class="flex">
                        <a href="{{route('events.show', $event)}}" class="text-blue-500 hover:text-blue-600 underline mr-2">
                            View
                        </a>
                        <a class="text-blue-500 hover:text-blue-600 underline mr-2" href="{{route('events.edit', $event)}}">
                            Edit
                        </a>
                        <form method="POST" action="{{route('events.destroy', $event)}}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="text-red-500 hover:text-red-600 underline">Delete</button>
                        </form>
                    </div>
                </li>
                @endforeach
            </ul>
        </main>
    </div>
</div>

@endsection