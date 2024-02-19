<div {{$attributes->merge(['class'=> 'bg-gray-50 border border-black rounded p-6'])}}>
    <div> 
        <img src="{{asset(('images/logo.png'))}}" alt="logo" class="w-24">
    </div>
    {{$slot}}
</div>