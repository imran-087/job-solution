
<!-- new discussion  -->
<div class="new-discussion mb-5">
    <a href="javascript:;" class="btn btn-primary me-3 text-uppercase" onclick="addNew()">New Discussion</a>
</div>
<div class="nav">
    <ul class="nav-item">
        @foreach($channels as $channel)
        <a class="nav-link" href="{{ route('discussion.channel', $channel->id) }}"><li class="mb-3">{{$channel->name}}</li></a>
        @endforeach
    </ul>
</div>
