<nav class="border-b border-gray-200 w-full bg-hipe-dark-blue">

    <div class=" p-2 ">
        <div class="flex justify-between ">
            <a href="/">
                <div class="flex ">
                    <img src="{{ asset('images/img_logo.svg') }}" alt="logo" class="w-24 border-r-2 p-2">
                    <h1 class="text-3xl font-bold m-2 text-hipe-blue"> <span class="text-hipe-yellow">JOB</span>LISTING
                    </h1>
                </div>
            </a>
            <div class="mt-3  flex    ">
                <div class="px-2 ">
                    @if (auth()->user()->user_detail)
                        <img class="h-9 w-9 rounded-full object-contain bg-gray-200 object-fill"
                            src="{{ asset('storage/' . auth()->user()->user_detail->profile_logo) }}" alt="" />
                    @endif
                </div>
                <h1 class="flex justify-end  text-2xl font-semibold mr-4 text-gray-300">Welcome,
                    {{ auth()->user()->user_detail()->exists() ? auth()->user()->user_detail()->first()->first_name : 'Guest' }}!
                </h1>

            </div>
        </div>


    </div>

</nav>
