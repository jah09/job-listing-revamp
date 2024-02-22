{{-- <nav class="bg-red-900">
  <h1 class="text-red-900">adawdwad</h1>
</nav>
<main>
  {{ $slot }}
</main> --}}
{{-- inside is x-navbar
sidebar --}}


{{-- 
<body>
  <x-_header>
    <x-_sidenav>
  
    </x-_sidenav>
  </x-_header>
</body> --}}




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



<body>
    <main>
        <div class="z-40 fixed top-0 w-full">
            @include('partials.dashboard._header')
        </div>

        <div class="flex justify-end">
            <div class="w-[20%] fixed left-0 top-0 h-full">
                @include('partials.dashboard._sidenav')
            </div>
            <div class="w-[80%] bg-gray-200 pb-12 pt-28 px-8 min-h-screen">
                {{$slot}}
            </div>
        </div>
    </main>
</body>



</html>
