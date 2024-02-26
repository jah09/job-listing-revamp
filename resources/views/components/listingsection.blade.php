<container class="">
    <div class="p-2 bg-white flex justify-center">
        <h1 class="text-hipe-blue text-4xl mt-8 text-[#229fe7] font-semibold">FEATURED JOBS</h1>

    </div>
    <div class="flex justify-center">
        <div class="grid grid-cols-2 gap-4 p-4">


            @foreach ($jobListing as $item)
                <a href="/job-details/{{ $item->id }}">
                    <div class="hover:bg-gray-100 border border-gray-200 flex p-4 ">
                        <div class="h-40 bg-gray-300 ">
                            <img class="  object-fill bg-gray-300  p-2  w-40 h-40"
                                src="{{ asset('storage/' . $item->company->logo_url) }}" alt="" />
                        </div>
                        <div class="mx-4">
                            <h1 class="text-2xl">{{ $item->job_title }}</h1>
                            <p class="font-semibold">{{ $item->description }}</p>

                            <div class="mt-10 text-lg">
                                <h1 class="font-semibold">₱ {{ $item->min_monthly_salary }} - ₱
                                    {{ $item->max_monthly_salary }} </h1>
                            </div>
                        </div>


                    </div>
                </a>
            @endforeach
        </div>
    </div>

</container>
