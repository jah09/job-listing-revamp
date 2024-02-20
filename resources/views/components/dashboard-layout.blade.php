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
        @include('partials.dashboard._header')
        <div class="flex">
            <div class="w-[15%]">
                @include('partials.dashboard._sidenav')
            </div>
            <div class="w-[85%] bg-gray-200 h-screen pt-28 px-16">
                {{ $slot }}
            </div>
        </div>
    </main>
</body>



</html>
