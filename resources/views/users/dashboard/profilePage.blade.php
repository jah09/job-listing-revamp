<x-dashboard-layout>
   
    <x-card class="">

        <div class=" ">
            <div class="h-full   p-8">
                <div class=" rounded-lg shadow-xl pb-8 bg-white">
                    
                      
               
                    <div class="w-full h-[250px]">
                        <img src="{{asset('images/s2.jpg')}}" class="w-full h-full rounded-tl-lg rounded-tr-lg object-cover object-center "  style="object-position: 50% 55% ;">
                    </div>
                    <div class="flex flex-col items-center -mt-20">
                        <img   src="{{  auth()->user()->user_detail->image_url() }}" class="w-40 h-40 border-4 border-white rounded-full">
                        <div class="flex items-center space-x-2 mt-2">
                            <p class="text-2xl">{{$userDetails->first_name}}</p>
                            <span class="bg-blue-500 rounded-full p-1 mt-2" title="Verified">
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-100 h-2.5 w-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </span>
                        </div>
                        <p class="text-gray-700">HiPE Intern</p>
                        <p class="text-sm text-gray-500"><i class="fa-solid fa-location-dot px-2"
                            aria-hidden="true"></i>{{$userDetails->address}}</p>
                    </div>
                    <div class="flex-1 flex flex-col items-center lg:items-end justify-end px-8 mt-2">
                        <div class="flex items-center space-x-4 mt-2">
                            <a href="/dashboard/settings"> 
                            <button class="flex items-center bg-[#229fe7] text-gray-900 font-medium px-4 py-2 rounded text-md space-x-2  transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-105  duration-300">
                              
                                <span>Update</span>
                                <i class="fa fa-sign-in ml-2 animate-pulse" aria-hidden="true"></i>
                               
                            </button>
                         </a>
                        </div>
                    </div>
                    
                </div>
        
                <div class="my-4 flex flex-col 2xl:flex-row space-y-4 2xl:space-y-0 2xl:space-x-4">
                    <div class="w-full flex flex-col 2xl:w-1/3">
                        <div class="flex-1 bg-white rounded-lg shadow-xl p-8">
                            <h4 class="text-xl text-gray-900 font-bold">Personal Info</h4>
                            <ul class="mt-2 text-gray-700">
                                <li class="flex  border-t   py-2">
                                    <span class="font-bold w-24">Full name:</span>
                                    <span class="text-gray-700">{{$userDetails->first_name}} {{$userDetails->last_name}}</span>
                                </li>
                            
                                <li class="flex   py-2">
                                    <span class="font-bold w-24">Number:</span>
                                    <span class="text-gray-700">{{$userDetails->tel}}</span>
                                </li>
                                <li class="flex  py-2">
                                    <span class="font-bold w-24">Email:</span>
                                    <span class="text-gray-700">{{ auth()->user()->email}}</span>
                                </li>
                                <li class="flex   py-2">
                                    <span class="font-bold w-24">Age:</span>
                                    <span class="text-gray-700">{{$userDetails->age}}</span>
                                </li>
                                <li class="flex py-2">
                                    <span class="font-bold w-24">Gender:</span>
                                    <span class="text-gray-700">{{$userDetails->gender}}</span>
                                </li>
                                <li class="flex   py-2">
                                    <span class="font-bold w-24">Languages:</span>
                                    <span class="text-gray-700">English, Bisaya</span>
                                </li>
                                <li class="flex items-center  ">
                                    <span class="font-bold w-24">Connect:</span>
                                   
                                 
                                    <a href="https://www.linkedin.com/in/jeahael-suhot-268314280/" title="LinkedIn" target="_blank" class="">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 333333 333333" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd"><path d="M166667 0c92048 0 166667 74619 166667 166667s-74619 166667-166667 166667S0 258715 0 166667 74619 0 166667 0zm-18220 138885h28897v14814l418 1c4024-7220 13865-14814 28538-14814 30514-1 36157 18989 36157 43691v50320l-30136 1v-44607c0-10634-221-24322-15670-24322-15691 0-18096 11575-18096 23548v45382h-30109v-94013zm-20892-26114c0 8650-7020 15670-15670 15670s-15672-7020-15672-15670 7022-15670 15672-15670 15670 7020 15670 15670zm-31342 26114h31342v94013H96213v-94013z" fill="#0077b5"></path></svg>
                                    </a>
                                    <a href="https://github.com/jah09" title="Github" target="_blank" class="ml-2">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="0" height="0" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 640 640"><path d="M319.988 7.973C143.293 7.973 0 151.242 0 327.96c0 141.392 91.678 261.298 218.826 303.63 16.004 2.964 21.886-6.957 21.886-15.414 0-7.63-.319-32.835-.449-59.552-89.032 19.359-107.8-37.772-107.8-37.772-14.552-36.993-35.529-46.831-35.529-46.831-29.032-19.879 2.209-19.442 2.209-19.442 32.126 2.245 49.04 32.954 49.04 32.954 28.56 48.922 74.883 34.76 93.131 26.598 2.882-20.681 11.15-34.807 20.315-42.803-71.08-8.067-145.797-35.516-145.797-158.14 0-34.926 12.52-63.485 32.965-85.88-3.33-8.078-14.291-40.606 3.083-84.674 0 0 26.87-8.61 88.029 32.8 25.512-7.075 52.878-10.642 80.056-10.76 27.2.118 54.614 3.673 80.162 10.76 61.076-41.386 87.922-32.8 87.922-32.8 17.398 44.08 6.485 76.631 3.154 84.675 20.516 22.394 32.93 50.953 32.93 85.879 0 122.907-74.883 149.93-146.117 157.856 11.481 9.921 21.733 29.398 21.733 59.233 0 42.792-.366 77.28-.366 87.804 0 8.516 5.764 18.473 21.992 15.354 127.076-42.354 218.637-162.274 218.637-303.582 0-176.695-143.269-319.988-320-319.988l-.023.107z"></path></svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                    
                </div>
               
            </div>
        </div>
    </x-card>

</x-dashboard-layout>
