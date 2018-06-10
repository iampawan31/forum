@component('profiles.activities.activity')
    @slot('heading')
        <a href="{{ $activity->subject->favorited->path() }}">{{ $profileUser->name }} favorited a reply</a>
    @endslot

    @slot('createdDate')
        {{ $activity->created_at->diffForHumans() }}
    @endslot

    @slot('body')
        {{ $activity->subject->favorited->body }}
    @endslot
@endcomponent