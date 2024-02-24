<div class="h-full w-full border-r-2 border-gray-200 bg-red-900 pt-20">
    {{-- <div class="mx-auto bg-red-900 w-96 px-4 pt-6">
        <ul class="bg-hipe-yellow p-2">
            <li class="text-md font-semibold"><i class="ps-2 fa-solid fa-house px-2"></i>Home</li>
            <li class="text-md font-semibold"><i class="ps-2.5 fa-solid fa-building px-2"></i>Company</li>
            <li class="text-md font-semibold"><i class="ps-2.5 fa-solid fa-user-doctor"></i>Job Listings</li>
            <li class="text-md font-semibold"><i class="ps-2 fa-solid fa-file-import"></i>Job Applications</li>
            <li class="text-md font-semibold"><i class="ps-2 fa-solid fa-file-gear"></i>Settings</li>
            <li class="text-md font-semibold"><i class="ps-2.5 fa-solid fa-right-from-bracket"></i>Logout</li>
        </ul>
    </div> --}}
    <div class="h-full w-full border-r-2 border-gray-200 bg-white">
        <div class="px-4 pt-6">
            <ul class="space-y-2 ">
                <li
                    class="{{ Request::is('dashboard/home') ? 'bg-hipe-blue rounded-md text-white' : '' }} hover:bg-hipe-blue hover:rounded-md p-2 hover:text-white">
                    <a href="{{ route('dashboard.home') }}" class="">
                        <i class="ps-2 fa-solid fa-house"></i>
                        <span class="ml-3">Home</span>
                    </a>
                </li>
                <li
                    class="{{ Request::is('dashboard/company') || Request::is('dashboard/company/create') ? 'bg-hipe-blue rounded-md text-white' : '' }} hover:bg-hipe-blue hover:rounded-md p-2 hover:text-white">
                    <a href="{{ route('dashboard.company') }}" class="">
                        <i class="ps-2.5 fa-solid fa-building"></i>
                        <span class="ml-3 flex-1 whitespace-nowrap">Company</span>
                    </a>
                </li>
                <li
                    class="{{ Request::is('dashboard/job-listings')||Request::is('dashboard/job-listings/job-post') ? 'bg-hipe-blue rounded-md text-white' : '' }} hover:bg-hipe-blue hover:rounded-md p-2 hover:text-white">
                    <a href="{{ route('dashboard.joblistings') }}" class="">
                        <i class="ps-2.5 fa-solid fa-user-doctor"></i>
                        <span class="ml-3 flex-1 whitespace-nowrap">Job Listings</span>
                    </a>
                </li>
                <li
                    class="{{ Request::is('dashboard/job-applications') ? 'bg-hipe-blue rounded-md text-white' : '' }} hover:bg-hipe-blue hover:rounded-md p-2 hover:text-white">
                    <a href="{{ route('dashboard.jobapplications') }}" class="">
                        <i class="ps-2.5 fa-solid fa-user-doctor"></i>
                        <span class="ml-3 flex-1 whitespace-nowrap">Job Applications</span>
                    </a>
                </li>
                <li
                class="{{ Request::is('dashboard/my-resume')|| Request::is('dashboard/create-resume') ? 'bg-hipe-blue rounded-md text-white' : '' }} hover:bg-hipe-blue hover:rounded-md p-2 hover:text-white">
                <a href="{{ route('dashboard.resume') }}" class="">
                    <i class="ps-2.5 fa-solid fa-file"></i>
                    <span class="ml-3 flex-1 whitespace-nowrap">My Resume</span>
                </a>
            </li>
                {{-- <li class="hover:bg-hipe-blue hover:rounded-md p-2 hover:text-white"> 
                    <a href="#" class="">
                        <i class="ps-2 fa-solid fa-file-import"></i>
                        <span class="ml-3 flex-1 whitespace-nowrap">Job Applications</span>
                    </a>
                </li> --}}
                <li
                    class="{{ Request::is('dashboard/settings') ? 'bg-hipe-blue rounded-md text-white' : '' }} hover:bg-hipe-blue hover:rounded-md p-2 hover:text-white">
                    <a href="{{ route('dashboard.settings') }}" class="">
                        <i class="ps-2.5 fa-solid fa-gear"></i>
                        <span class="ml-3 flex-1 whitespace-nowrap">Settings</span>
                    </a>
                </li>
                <li class="hover:bg-hipe-blue hover:rounded-md p-2">
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit">
                            <i class="ps-2.5 fa-solid fa-right-from-bracket"></i>
                            <span class="ml-3 flex-1 whitespace-nowrap">Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
