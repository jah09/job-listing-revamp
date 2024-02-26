<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LaraGigs | Revamp</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

</head>

<body class="">
    <div class="bg-gray-50 w-[90%] h-auto mx-auto mt-10 rounded-sm border p-2">
        <div class="p-2 flex flex-col items-center">
            <div>
                <img class="    mt-10 p-2 w-48 h-48 bg-none"  src="{{ asset('storage/' . $listing->company->logo_url) }}"
                    alt="" />
            </div>
            <div class="mt-10 text-center">
                <h1 class="text-xl">{{$listing->job_title}}</h1>
                <p class="font-bold"><i class="fa-solid fa-briefcase px-2"></i>{{$listing->company->name}}</p>
                <p class="text-md"><i class="fa-solid fa-location-dot px-2" aria-hidden="true"></i>{{$listing->company->address}}</p>
            </div>


        </div>
        <div class="mx-auto mt-4 ">
            <hr class="border-gray-400  w-[90%]  mx-14">
        </div>
        <div class="mt-4 text-center">
            <h1 class="font-bold text-1xl">Job Description</h1>
            <p class="text-2xl">{{$listing->description}}</p>

            <button class="mt-4 p-2 bg-red-600 rounded-md w-48 font-semibold text-white outline-none">
                <i class="fa-solid fa-envelope px-2 animate-pulse"></i>
                Apply now
            </button>

        </div>
    </div>
    </div>

</body>

</html>
