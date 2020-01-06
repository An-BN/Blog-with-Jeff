@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="card mb-2">
                    <div class="card-header">Forum Threads</div>

                    <div class="card-body">
                        @foreach ($threads as $thread)
                            <article class="card mt-4">
                                <div class="level">
                                    <h4 class="flex">
                                        <a href="{{ $thread->path() }}">
                                            {{ $thread->title }}
                                        </a>
                                    </h4>
                                    <a href="{{ $thread->path() }}">
                                    {{ $thread->replies_count }} {{ Str::plural('reply', $thread->replies_count) }}
                                    </a>
                                </div>
                                <div class="body">{{ $thread->body }}</div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
