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
    <div class="px-[40px] pt-[24px] z-40 absolute top-0 left-0 flex justify-between items-start w-full h-full ">
        <img class="w-[100px]" src="images/img_logo.svg" alt="">
        <div class="space-x-6 text-white font-semibold ">
            <a href="/" class="hover:text-[#229fe7]">Home</a>
            <a href="/about" class="hover:text-[#229fe7]">About</a>
            <form action="/contact-us" method="GET" class="inline">
                @csrf
                <button type="submit" class="hover:text-[#229fe7]">Contact</button>
                {{-- <a href="" class="hover:text-[#229fe7]">Contact</a> --}}
            </form>
          
            @auth
                <form class="inline" method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="hover:text-[#229fe7]">
                        Logout
                    </button>
                </form>
            @else
                <a href="/login" class="hover:text-[#229fe7]">Login</a>
            @endauth
        </div>
    </div>
    <main class="">
        {{ $slot }}
    </main>
<x-flash-message/>
</body>


</html>
