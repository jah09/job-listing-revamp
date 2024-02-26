<x-landing-navbar>
    @include('partials._hero')
   
    <x-listingsection :jobListing="$jobListing"/>
        {{-- @include('listingsection', ['jobListing' => $jobListing]) --}}
 @include('partials._footer')
</x-landing-navbar>


{{-- <x-landing-navbar>
    @include('partials._header')  @props(['jobListing']) 
</x-landing-navbar> --}}