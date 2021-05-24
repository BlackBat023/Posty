@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12">
            <div class="bg-white p-6 rounded-lg mb-4">
                <h1 class="text-2xl font-medium mb-1">{{ $user->username }}</h1>
                <p>Posted {{ $posts->count() }}  {{ Str::plural('posts', $posts->count()) }}, 
                    Received {{ $user->receivedLikes->count() }} Likes</p>
            </div>
            
            <div class="bg-white p-6 rounded-lg">
                @if ($posts->count())
                    @foreach ($posts as $post)
                        <x-post :post="$post" />
                    @endforeach
                    {{ $posts->links() }}
                @else
                    <p>No posts to display</p>
                @endif
            </div>
        </div>
    </div>
@endsection