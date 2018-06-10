@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                @forelse($threads as $thread)
                    <div class="card mt-4">
                        <div class="card-header">
                            <div class="level">
                                <span class="flex"><a href="{{ $thread->path() }}">{{ $thread->title }}</a></span>
                                <a href="{{ $thread->path() }}"><strong>{{ $thread->replies_count }} {{ str_plural('reply', $thread->replies_count) }}</strong></a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="body">{{ $thread->body }}</div>
                        </div>
                    </div>
                @empty
                    <div class="jumbotron">
                        <p class="lead">There are no relevant results at this time.</p>
                        <a class="btn btn-primary btn-lg" href="/threads" role="button">View all threads</a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
