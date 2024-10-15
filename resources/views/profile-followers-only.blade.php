<div class="list-group">
    @foreach($followers as $follow)
        <a href="/profile/{{$follow->following->username}}" class="list-group-item list-group-item-action">
            <img class="avatar-tiny" src="{{$follow->following->avatar}}" />
            {{$follow->following->username}}
        </a>
    @endforeach
</div>
