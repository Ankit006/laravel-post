@extends('layout.app');
@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounder-lg">
            @if ($posts->count())
            @foreach ($posts as $post)
           <x-post  :post="$post" />
            @endforeach
         
            @endauth
            {{$posts -> links()}}
        @else
            <p>{{$user->name}}</p>
        @endif
        </div>
    </div>
@endsection