<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
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
    <title>LaraGigs | Revamp</title>

</head>



<body>
    <nav class=" items-center bg-[#023047] w-full">
        <container class="bg-[#023047] mx-auto flex justify-between w-[90%]  ">
            <div class="mt-2"> <img src="{{ asset('images/img_logo.svg') }}" alt="logo" class="w-24  p-2"></div>
            <div>
                <ul class="flex py-4 mx-4   ">
                    <a href="">
                        <li class="p-2 text-white text-md font-semibold hover:text-[#229fe7]">Home</li>
                    </a>
                    <a href="">
                        <li class="p-2 text-white text-md font-semibold hover:text-[#229fe7]">About</li>
                    </a>
                    <a href="">
                        <li class="p-2 text-white text-md font-semibold hover:text-[#229fe7]">Contact</li>
                    </a>
                    <a href="/login">
                        <li class="p-2 text-white text-md font-semibold hover:text-[#229fe7]">Login</li>
                    </a>


                </ul>
            </div>
        </container>
        {{-- <a href="/"><img class="w-24" src="{{ asset('images/logo.png') }}" alt="" class="logo" /></a>
        <ul class="flex space-x-6 mr-6 text-lg">
            @auth
            <li>
                <span class="font-bold uppercase">
                    Welcome {{ auth()->user()->name }}
                </span>
            </li>
            <li>
                <a href="/listings/manage" class="hover:text-laravel"><i class="fa-solid fa-gear"></i>
                    Manage Listing</a>
            </li>
            <li>
                <form class="inline" action="/logout" method="post">
                    @csrf
                    <button type="submit">
                        <i class="fa-solid fa-door-closed"></i> Logout
                    </button>
                </form>
            </li>
            @else
            <li>
                <a href="/register" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i> Register</a>
            </li>
            <li>
                <a href="/login" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                    Login</a>
            </li>
            @endauth
        </ul> --}}
    </nav>
    <main class="">
        {{ $slot }}
    </main>

</body>


</html>