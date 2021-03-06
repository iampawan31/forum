@component('profiles.activities.activity')
    @slot('heading')
        {{ $profileUser->name }} published <a
                href="{{ $activity->subject->path() }}">{{ $activity->subject->title }}</a>
    @endslot

    @slot('createdDate')
        {{ $activity->created_at->diffForHumans() }}
    @endslot

    @slot('body')
        {{ $activity->subject->body }}
    @endslot
@endcomponent