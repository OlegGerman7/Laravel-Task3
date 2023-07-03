@extends('layouts.app')

@section('title', 'Edit event')

@section('content')
<div class="flex min-h-96 my-12 mx-12">
    <x-sidebar />
    <div class="bg-white flex flex-col flex-grow ml-11 rounded-2xl">
        <main class="mx-10 my-12">
            <h2 class="text-xl font-normal border-b mb-5 pb-5">Edit event</h2>
            <form method="POST" action="{{route('events.update', $event)}}" class="w-full">
                @csrf
                @method('PUT')
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                            Title
                        </label>
                        <input value="{{$event->title}}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 transition duration-300" name="title" id="title" type="text" required >
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="password">
                            Description
                        </label>
                        <input value="{{$event->description}}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 transition duration-300" name="description" id="description" type="text" required >
                    </div>
                </div>
                <div class="flex  w-full">
                    <button class="shadow bg-red-500 hover:bg-red-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-6 rounded transition duration-300" type="submit">
                        Submit
                    </button>
                </div>
            </form>
        </main>
    </div>
</div>
@endsection