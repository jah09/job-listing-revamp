{{-- <x-dashboard-layout>
    <div class=" mt-8 overflow-hidden rounded-lg border border-gray-200">
        <div class="flex justify-between items-center mb-10">
            <h1 class="text-[44px] font-sans font-bold">My Resume</h1>
            <div class="">
                <a href="{{route('dashboard.showresumeform')}}">
                    <button
                        class="bg-hipe-dark-blue text-md py-2 px-4 mx-2 text-white rounded-lg shadow-sm outline-none">Upload
                        resume</button>
                </a>
            </div>
        </div>
        <div class=" grid grid-cols-3 gap-4 w-full p-2">
            <div class="bg-white rounded-3xl px-2 py-2  shadow-md w-full h-44">
                <div class="flex  mt-4">
                    <div class="px-4">
                        <img class="h-16 w-24 rounded-lg object-contain bg-gray-200 object-fill"
                            src="{{ asset('images/logo.png') }}" alt="" />
                    </div>
                    <div class="w-full">
                        <h3 class="px-2 font-semibold">Resume #1</h3>
                        <div class=" py-2 flex justify-between ">
                            <p><span> <i class="ps-2.5 fa-solid fa-file text-gray-300 px-2"></i></span>XLSX</p>
                            <p><span> <i class="ps-2.5 fa-solid fa-calendar text-gray-300 px-2"></i></span>02-23-24</p>
                        </div>
                        <div>
                            <hr class="">
                        </div>

                    </div>
                </div>
                <div class="flex justify-end p-4  h-24">
                    <div class=" flex">
                        <i class="text-hipe-yellow fa-solid fa-circle-info"></i>
                        <p class="text-md">This resume is being used in <span
                                class="text-hipe-dark-blue text-lg  font-semibold">23</span> job applications.</p>
                    </div>
                    <div class="ml-2 border-l-2 h-14 px-2 -mr-6">
                        <button
                            class="p-2 rounded-full bg-hipe-dark-blue text-white w-20  ">view
                        </button>
                    </div>
                </div>
            </div>
           
        </div>
    </div>

</x-dashboard-layout> --}}
<x-dashboard-layout>
    <div class=" mt-2 overflow-hidden rounded-lg border border-gray-200">
        <div class="flex justify-between items-center mb-10">
            <h1 class="text-[44px] font-sans font-bold">My Resume</h1>
            <div class="">
                <a href="{{ route('dashboard.showresumeform') }}">
                    <p class="bg-hipe-dark-blue text-md py-2 px-6 text-white rounded-lg shadow-sm">Upload resume</p>
                </a>
            </div>
        </div>
        <div class="grid gap-10 grid-cols-3 w-full">
            @if ($user_resume->isEmpty())
                <div class="">
                    <h1 class="text-md font-semibold">No resume to show.. Please upload your resume</h1>
                </div>
            @else
                @foreach ($user_resume as $item)
                    <?php
                    $fileUrl = $item->resume_url;
                    $extension = pathinfo($fileUrl, PATHINFO_EXTENSION);
                    ?>
                    <div class="bg-white rounded-3xl p-4 w-[110%]">
                        <div class="flex-none lg:flex">
                            <div class="bg-gray-200 h-20  rounded-lg">
                               
                                @switch($extension)
                                    @case('pdf')
                                    <img src="/images/pdf.png" alt="Just a flower" class=" w-20 h-16  object-contain mt-2">
                                    @break

                                    @case('xlsx')
                                    <img src="/images/excel.png" alt="Just a flower" class=" w-20 h-full  object-contain">
                                    @break

                                    @default
                                    <img src="/images/csv.png" alt="Just a flower" class=" w-20 h-full  object-contain">
                                @endswitch
                              
                            </div>
                            <div class="flex-auto ml-3 justify-evenly">
                                <div>
                                    <h2 class="text-lg font-medium">{{ $item->name }}</h2>
                                </div>
                                <div class="flex py-4 text-sm text-gray-500">
                                    <div class="flex-1 inline-flex items-center ">

                                        <i class="h-5 pt-1 w-5 text-gray-400 fa-solid fa-file"></i>
                                        <p class="">{{ $extension }}</p>
                                    </div>
                                    <div class="flex-1 inline-flex items-center ">
                                        <i class="h-5 pt-1 w-5 text-gray-400 fa-solid fa-calendar-days"></i>
                                        <p class="">{{ date('Y-m-d', strtotime($item->created_at)) }}</p>
                                       
                                    </div>
                                    
                                </div>
                                <div class="p-2 pb-2 border-t border-gray-200 "></div>
                            </div>
                        </div>
                        <div class="flex justify-between items-center space-x-3 text-sm font-medium">
                            <div class="w-4/5 border-r px-2">
                                <i class="text-hipe-yellow fa-solid fa-circle-info"></i>
                                <span class="font-normal text-sm">This resume is being used in <span
                                        class="text-lg font-bold text-hipe-dark-blue">23</span> job applications.</span>
                            </div>
                            <div class="w-1/5">

                                <a href="{{ asset('storage/' . $item->resume_url) }}" target="_blank">
                                    <button
                                        class="mb-2 md:mb-0 bg-hipe-dark-blue px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-gray-800"
                                        type="button" aria-label="like">view</button>

                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
</x-dashboard-layout>
