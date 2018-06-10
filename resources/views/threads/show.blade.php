@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="level">
                            <div class="flex">
                                <a href="/profiles/{{ $thread->creator->name }}">{{ $thread->creator->name }}</a>
                                posted: {{ $thread->title }}
                            </div>
                            @can('update', $thread)
                                <form action="{{ $thread->path() }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-link">Delete</button>
                                </form>
                            @endcan
                        </div>

                    </div>
                    <div class="card-body">
                        {{ $thread->body }}
                    </div>
                </div>

                @foreach($replies as $reply)
                    @include('threads.reply')
                @endforeach

                <div class="mt-4">
                    {{ $replies->links() }}
                </div>

                <div class="mt-3">
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

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        This thread was published {{ $thread->created_at->diffForHumans() }} by <a
                                href="#">{{ $thread->creator->name }}</a>
                        and currently
                        has {{ $thread->replies_count }} {{ str_plural('comment', $thread->replies_count) }}.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
