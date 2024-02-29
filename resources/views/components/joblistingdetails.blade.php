<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LaraGigs | Revamp</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'hipe-blue': '#229fe7',
                        'hipe-dark-blue': '#023047'
                        'hipe-yellow': '#ffa903'
                    },
                },
            },
        };
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
</head>

<body class="">

    <div class="bg-gray-50 w-[90%] h-auto mx-auto mt-10 rounded-sm border p-2">
        <div class="p-2 flex flex-col items-center">
            <div>
                <img class="    mt-10 p-2 w-48 h-48 bg-none" src="{{ asset('storage/' . $listing->company->logo_url) }}"
                    alt="" />
            </div>
            <div class="mt-10 text-center">
                <h1 class="text-xl">{{ $listing->job_title }}</h1>
                <p class="font-bold"><i class="fa-solid fa-briefcase px-2"></i>{{ $listing->company->name }}</p>
                <p class="text-md"><i class="fa-solid fa-location-dot px-2"
                        aria-hidden="true"></i>{{ $listing->company->address }}</p>
            </div>


        </div>
        <div class="mx-auto mt-4 ">
            <hr class="border-gray-400  w-[90%]  mx-14">
        </div>
        <div class="mt-4 text-center">
            <h1 class="font-bold text-1xl">Job Description</h1>
            <p class="text-2xl">{{ $listing->description }}</p>

            <div>
                @auth


                    @if ($user_resume->count() > 0 && auth()->user()->id != $listing->user_id)
                        <button class="mt-4 p-2 bg-red-600 rounded-md w-48 font-semibold text-white outline-none transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-105  duration-300"
                            onclick="openModal()">
                            <i class="fa-solid fa-envelope px-2 animate-pulse "></i>
                            Apply now
                        </button>
                    @else
                        <a href="/dashboard/my-resume">
                            <button class="mt-4 p-2 bg-red-600 rounded-md w-48 font-semibold text-white outline-none transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-105  duration-300">
                                <i class="fa-solid fa-envelope px-2 animate-pulse"></i>
                                Apply now
                            </button>
                        </a>
                    @endif
                @else
                    <a href="/login">
                        <button class="mt-4 p-2 bg-red-600 rounded-md w-48 font-semibold text-white outline-none transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-105  duration-300">
                            <i class="fa-solid fa-envelope px-2 animate-pulse"></i>
                            Apply now
                        </button>
                    </a>

                @endauth

            </div>


        </div>
    </div>

    {{-- modal --}}
    <div class="hidden main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster"
        style="background: rgba(0,0,0,.7);">
        <div
            class="border shadow-lg modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="modal-content py-2 text-left px-6">
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold">Application form to {{ $listing->company->name }}</p>
                    <div onclick="modalClose()" class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18"
                            height="18" viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </div>
                </div>
                <!--Body-->
                <div class="my-5">
                    <form method="POST" action="/create-job-application" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $listing->id }}" name="job_listing_id" />
                        <div class="mb-6">
                            <label for="resume_id" class="inline-block text-lg mb-2">Resume</label>
                            <select type="text" class="border border-gray-200 rounded p-2 w-full" name="resume_id"
                                value="{{ old('resume_id') }}" placeholder="Select your resume">
                                @foreach ($user_resume as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>

                            @error('resume_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="first_name" class="inline-block text-lg mb-2">First Name</label>
                            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="first_name"
                                value="{{ old('first_name') }}" />

                            @error('first_name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="last_name" class="inline-block text-lg mb-2">Last Name</label>
                            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="last_name"
                                value="{{ old('last_name') }}" />

                            @error('last_name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="tel" class="inline-block text-lg mb-2">Contact Number</label>
                            <input type="number" class="border border-gray-200 rounded p-2 w-full" name="tel"
                                value="{{ old('tel') }}" />

                            @error('tel')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="education" class="inline-block text-lg mb-2">Education</label>
                            <select type="text" class="border border-gray-200 rounded p-2 w-full" name="education"
                                placeholder="Select education" value="{{ old('education') }}">
                                @foreach ($educationType as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach

                            </select>

                            @error('education')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex justify-center pt-2">

                            <button type="submit"
                                class="focus:outline-none px-4 bg-[#023047]  p-3 ml-3 rounded-lg text-white hover:bg-teal-400 hover:text-black">
                                Submit Application
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script>
        const modal = document.querySelector('.main-modal');

        const modalClose = () => {
            modal.classList.add('hidden');
        }

        const openModal = () => {
            modal.classList.remove('hidden');
        }
    </script>

</body>

</html>
