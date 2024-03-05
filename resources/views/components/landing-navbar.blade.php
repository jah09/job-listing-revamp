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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'hipe-blue': '#229fe7',
                        'hipe-dark-blue': '#023047',
                        'hipe-yellow': '#ffa903'
                    },
                },
            },
        };
    </script>
    <title>LaraGigs | Revamp</title>

</head>



<body style="overflow-x: hidden;">
    <div class="absolute left-0 top-0 z-10 flex h-full w-full items-start justify-between px-[40px] pt-[24px]">
        <img class="w-[100px]" src="images/img_logo.svg" alt="">
        <div class="space-x-6 font-semibold text-white">
            @auth
                <a href="/dashboard/home" class="border-[#229fe7] hover:border-b-2 hover:text-[#229fe7]">Home</a>
            @else
                <a href="/" class="border-[#229fe7] hover:border-b-2 hover:text-[#229fe7]">Home</a>
            @endauth
            <a href="{{ route('about') . '#about-page' }}"
                class="border-[#229fe7] hover:border-b-2 hover:text-[#229fe7]">About</a>

            <form action="/contact-us" method="GET" class="inline">
                @csrf
                <button type="submit"
                    class="{{ Request::is('/contact-us?_token=cHljjl2FhxZr5oSCBAKFFkdvXBVwVy5eCEkERxFZ') ? 'border-[#229fe7] text-[#229fe7] border-b-2' : '' }} border-[#229fe7] hover:border-b-2 hover:text-[#229fe7]">Contact</button>

            </form>

            @auth
                <form class="inline" method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="border-[#229fe7] hover:border-b-2 hover:text-[#229fe7]">
                        Logout
                    </button>
                </form>
            @else
                <a href="/login" class="border-[#229fe7] hover:border-b-2 hover:text-[#229fe7]">Login</a>
            @endauth
        </div>
    </div>
    <main class="">
        {{ $slot }}
    </main>
    <x-flash-message />
</body>


</html>
