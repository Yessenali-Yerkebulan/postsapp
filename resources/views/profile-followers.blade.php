<x-profile :sharedData="$sharedData" doctitle="{{$sharedData['username']}}'s followers">
    @include('profile-followers-only')
</x-profile>
