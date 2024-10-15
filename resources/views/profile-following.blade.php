<x-profile :sharedData="$sharedData" doctitle="{{$sharedData['username']}} follows">
    <div class="list-group">
        @foreach($following as $follow)
            <a href="/profile/{{$follow->followed->username}}" class="list-group-item list-group-item-action">
                <img class="avatar-tiny" src="{{$follow->followed->avatar}}" />
                {{$follow->followed->username}}
            </a>
        @endforeach
    </div>
</x-profile>
