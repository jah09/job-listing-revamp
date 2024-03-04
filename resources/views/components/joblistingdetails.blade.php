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
    <style>
        .fadeIn {
            animation: fadeInAnimation ease 5s;
        }

        @keyframes fadeInAnimation {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
</head>

<body class="">

    <div class="fadeIn mx-auto mt-10 h-auto w-[90%] rounded-sm border bg-gray-50 p-2">
        <div class="flex flex-col items-center p-2">
            <div>
                <img class="mt-10 h-48 w-48 bg-none p-2" src="{{ $listing->company->image_url() }}" alt="" />
            </div>
            <div class="mt-10 text-center">
                <h1 class="text-xl">{{ $listing->job_title }}</h1>
                <p class="font-bold"><i class="fa-solid fa-briefcase px-2"></i>{{ $listing->company->name }}</p>
                <p class="text-md"><i class="fa-solid fa-location-dot px-2"
                        aria-hidden="true"></i>{{ $listing->company->address }}</p>
            </div>


        </div>
        <div class="mx-auto mt-4">
            <hr class="mx-14 w-[90%] border-gray-400">
        </div>
        <div class="mt-4 text-center">
            <h1 class="text-1xl font-bold">Job Description</h1>
            <p class="text-2xl">{{ $listing->description }}</p>

            <div class="flex justify-center">
                <div class="flex-1"> 
                @auth


                    @if ($user_resume->count() > 0 && auth()->user()->id != $listing->user_id)
                        <button
                            class="mt-4 w-48 rounded-md bg-red-600 p-2 font-semibold text-white outline-none transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-105"
                            onclick="openModal()">
                            <i class="fa-solid fa-envelope animate-pulse px-2"></i>
                            Apply now
                        </button>
                    @else
                        <a href="/dashboard/my-resume">
                            <button
                                class="mt-4 w-48 rounded-md bg-red-600 p-2 font-semibold text-white outline-none transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-105">
                                <i class="fa-solid fa-envelope animate-pulse px-2"></i>
                                Apply now
                            </button>
                        </a>
                    @endif
                @else
                    <a href="/login">
                        <button
                            class="mt-4 w-48 rounded-md bg-red-600 p-2 font-semibold text-white outline-none transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-105">
                            <i class="fa-solid fa-envelope animate-pulse px-2"></i>
                            Apply now
                        </button>
                    </a>

                @endauth
            </div>
                {{-- <div class="  py-4">Posted by:{{$listing->user->email}}</div> --}}
            </div>


        </div>
    </div>

    {{-- modal --}}
    <div class="main-modal h-100 animated fadeIn faster fixed inset-0 z-50 flex hidden w-full items-center justify-center overflow-hidden"
        style="background: rgba(0,0,0,.7);">
        <div
            class="modal-container z-50 mx-auto w-11/12 overflow-y-auto rounded border bg-white shadow-lg shadow-lg md:max-w-md">
            <div class="modal-content px-6 py-2 text-left">
                <div class="flex items-center justify-between pb-3">
                    <p class="text-2xl font-bold">Application form to {{ $listing->company->name }}</p>
                    <div onclick="modalClose()" class="modal-close z-50 cursor-pointer">
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
                            <label for="resume_id" class="mb-2 inline-block text-lg">Resume</label>
                            <select type="text" class="w-full rounded border border-gray-200 p-2" name="resume_id"
                                value="{{ old('resume_id') }}" placeholder="Select your resume">
                                @foreach ($user_resume as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>

                            @error('resume_id')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="first_name" class="mb-2 inline-block text-lg">First Name</label>
                            <input type="text" class="w-full rounded border border-gray-200 p-2" name="first_name"
                                value="{{ old('first_name') }}" />

                            @error('first_name')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="last_name" class="mb-2 inline-block text-lg">Last Name</label>
                            <input type="text" class="w-full rounded border border-gray-200 p-2" name="last_name"
                                value="{{ old('last_name') }}" />

                            @error('last_name')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="tel" class="mb-2 inline-block text-lg">Contact Number</label>
                            <input type="number" class="w-full rounded border border-gray-200 p-2" name="tel"
                                value="{{ old('tel') }}" />

                            @error('tel')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="education" class="mb-2 inline-block text-lg">Education</label>
                            <select type="text" class="w-full rounded border border-gray-200 p-2" name="education"
                                placeholder="Select education" value="{{ old('education') }}">
                                @foreach ($educationType as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach

                            </select>

                            @error('education')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex justify-center pt-2">

                            <button type="submit"
                                class="ml-3 rounded-lg bg-[#023047] p-3 px-4 text-white hover:bg-teal-400 hover:text-black focus:outline-none">
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
