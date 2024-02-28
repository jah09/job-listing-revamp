<x-dashboard-layout>
    <div class=" grid grid-cols-3 gap-4">
        <div class="rounded-md bg-gray-100 shadow-md flex justify-between ">
            <div class="p-6">
                <h1 class="font-bold text-3xl">{{ $listingCount }}</h1>
                <p class="text-sm text-gray-500">You Job Listings</p>


            </div>
            {{-- <div class=" mr-4 flex flex-col justify-center ">
                <h6 class="text-sm font-bold text-green-500">{{ $listingPercentage }}$ <span><i
                            class="fa-solid fa-arrow-up text-green-500"></i></span></h6>
            </div> --}}
        </div>
        <div class="rounded-md bg-gray-100 shadow-md flex justify-between ">
            <div class="p-6">
                <h1 class="font-semibold text-3xl">{{ $user_job_listing_application_count }}</h1>
                <p class="text-sm text-gray-500">You Job Listings Applications</p>


            </div>
            {{-- <div class=" mr-4 flex flex-col justify-center ">
                <h6 class="text-sm font-semibold text-green-500">32.9% <span><i
                            class="fa-solid fa-arrow-up text-green-500"></i></span></h6>
            </div> --}}
        </div>
        <div class="rounded-md bg-gray-100 shadow-md flex justify-between ">
            <div class="p-6">
                <h1 class="font-semibold text-3xl">{{ $user_job_applications_count }}</h1>
                <p class="text-sm text-gray-500">You Job Applications</p>


            </div>
            {{-- <div class=" mr-4 flex flex-col justify-center ">
                <h6 class="text-sm font-semibold text-red-500">-2.7% <span><i
                            class="fa-solid fa-arrow-down text-red-500"></i></span></h6>
            </div> --}}
        </div>
    </div>

    <div class="grid grid-cols-2 gap-4   mt-10 ">
        <div class="rounded-md p-4 shadow-md bg-gray-100 ">
            <div class=" flex justify-between">
                <div>
                    <h4 class="text-lg font-semibold">Your Companies</h4>
                </div>
                <div>

                    <p class="text-hipe-blue">View all</p>
                </div>
            </div>
            <div class="mt">
                <ul>
                    @if ($user_companies->count() > 0)
                        @foreach ($user_companies as $item)
                            <li class="flex items-center p-2 ">
                                <img src="{{ asset('storage/' . $item->logo_url) }}" alt="logo"
                                    class="w-10 h-10 rounded-full">
                                <span class="mx-2">
                                    <h4 class="font-semibold">{{ $item->name }}</h4>
                                </span>


                            </li>
                            <div class="mx-auto ">
                                <hr class="border-gray-300 border-1/2 w-[95%]  mx-2">
                            </div>
                        @endforeach
                    @else
                        <h5>No companies yet</h5>
                    @endif

                </ul>
            </div>

        </div>
        <div class="rounded-md p-4 shadow-md p2 bg-gray-100  ">

            <div>
                <h4 class="text-lg font-semibold">Your Skills</h4>
            </div>
            <div class="mt-8 ">
                <table class="w-full border-collapse  text-left text-sm text-gray-500">
                    <thead class="">
                        <tr>
                            <th scope="col" class="px-4 py-2 font-medium text-gray-900 text-md w-56">TECHNOLOGIES
                            </th>
                            <th scope="col" class="px-4 py-2 font-medium text-gray-900   text-md"> EXPERIENCE</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900 text-md w-48"></th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <tr class=" ">
                            <td class="px-6 py-2">Organic Research</td>
                            <td class="px-6 py-2">5,649</td>
                            <td class="px-6 py-2">30%</td>

                        </tr>

                        <tr class=" ">
                            <td class="px-6 py-2">Referral</td>
                            <td class="px-6 py-2">4,025</td>
                            <td class="px-6 py-2">24%</td>
                        </tr>
                        <tr class="">
                            <td class="px-6 py-2">Direct</td>
                            <td class="px-6 py-2">3,105</td>
                            <td class="px-6 py-2">18%</td>
                        </tr>
                        <tr class="">
                            <td class="px-6 py-2">Social</td>
                            <td class="px-6 py-2">1251</td>
                            <td class="px-6 py-2">12%</td>
                        </tr>
                        <tr class="">
                            <td class="px-6 py-2">Other</td>
                            <td class="px-6 py-2">734</td>
                            <td class="px-6 py-2">12%</td>
                        </tr>
                        <tr class="">
                            <td class="px-6 py-2">Email</td>
                            <td class="px-6 py-2">456</td>
                            <td class="px-6 py-2">7%</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-dashboard-layout>
