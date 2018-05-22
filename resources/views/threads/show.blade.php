@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header"><a href="#">{{ $thread->creator->name }}</a> posted: {{ $thread->title }}
                    </div>
                    <div class="card-body">
                        {{ $thread->body }}
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-8 offset-md-2">
                @foreach($thread->replies as $reply)
                    @include('threads.reply')
                @endforeach
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-8 offset-md-2">
                @if(auth()->check())
                    <form method="post" action="{{ $thread->path() . '/replies' }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <textarea name="body" id="body" class="form-control" cols="30" rows="10"
                                      placeholder="Have something to say?"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Post</button>
                        </div>
                    </form>
                @else
                    <div class="text-center alert alert-warning" role="alert">
                        Please <a href="{{ route('login') }}">sign in</a> to participate in this discussion.
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
