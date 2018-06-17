@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="jumbotron">
                    <h1 class="display-4">{{ $profileUser->name }}</h1>
                    <p class="lead">Since {{ $profileUser->created_at->diffForHumans() }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                @forelse($activities as $date => $activity)
                    <nav aria-label="breadcrumb" class="mt-3">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">{{ $date }}</li>
                        </ol>
                    </nav>
                    @foreach($activity as $record)
                        @if(view()->exists("profiles.activities.{$record->type}"))
                            @include("profiles.activities.{$record->type}", ['activity' => $record])
                        @endif
                    @endforeach
                @empty
                    <div class="text-center alert alert-warning" role="alert">
                        There is No Activity for this User.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection