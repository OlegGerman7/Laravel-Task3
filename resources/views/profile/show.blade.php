@extends('layouts.app')

@section('content')
    <section class="max-w-screen-md mx-auto px-2 py-32">
        <div class="mb-8">
            <p class="mt-4 text-sm leading-7 text-gray-500 font-regular uppercase">
                Profile
            </p>
        </div>
        <div>
            <p class="mb-8">
                <span class="font-bold">Name: </span>{{$user->name}}
            </p>
            <p class="mb-8">
                <span class="font-bold">Email: </span>{{$user->email}}
            </p>
        </div>
    </section>
@endsection