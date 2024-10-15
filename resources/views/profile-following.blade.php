<x-profile :sharedData="$sharedData" doctitle="{{$sharedData['username']}} follows">
    @include('profile-following-only')
</x-profile>
