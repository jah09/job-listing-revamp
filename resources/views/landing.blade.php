<x-landing-navbar>
    @include('partials._hero')
   
    <x-listingsection :jobListing="$jobListing"/> {{--received the variable from UI then passed to listing section components --}}
       
 @include('partials._footer')
</x-landing-navbar>


{{-- <x-landing-navbar>
    @include('partials._header')  @props(['jobListing']) 
</x-landing-navbar> --}}