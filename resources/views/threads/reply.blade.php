{{--<reply :attributes="{{ $reply }}" inline-template v-cloak>--}}
    {{--<div id="reply-{{ $reply->id }}" class="card mt-3">--}}
        {{--<div class="card-header">--}}
            {{--<div class="level">--}}
                {{--<h6 class="flex">--}}
                    {{--<a href="/profiles/{{ $reply->owner->name }}">{{ $reply->owner->name }}</a>--}}
                    {{--said {{ $reply->created_at->diffForHumans() }}...--}}
                {{--</h6>--}}
                {{--@if(auth()->check())--}}
                    {{--<div>--}}
                        {{--<favorite :reply="{{ $reply }}"></favorite>--}}
                    {{--</div>--}}
                {{--@endif--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="card-body">--}}
            {{--<div v-if="editing">--}}
                {{--<div class="form-group">--}}
                    {{--<textarea class="form-control" v-model="body" name="body" id="body" rows="5"></textarea>--}}
                {{--</div>--}}
                {{--<button class="btn btn-primary btn-sm" @click="update">Update</button>--}}
                {{--<button class="btn btn-sm btn-link" @click="editing = false">Cancel</button>--}}
            {{--</div>--}}
            {{--<div v-else v-text="body">--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--@can('update', $reply)--}}
            {{--<div class="card-footer text-muted level" v-show="!editing">--}}
                {{--<button class="btn btn-warning btn-sm mr-2" @click="editing = true">Edit</button>--}}
                {{--<button class="btn btn-outline-danger btn-sm" @click="destroy">Delete</button>--}}
            {{--</div>--}}
        {{--@endcan--}}
    {{--</div>--}}
{{--</reply>--}}