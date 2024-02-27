<div class=" pt-[24px] z-40 absolute top-0 left-0 flex justify-between items-start w-full h-full">
    <img class="w-[100px]" src="images/img_logo.svg" alt="">
    <div class="space-x-6 text-white font-semibold">
        <a href="/">Home</a>
        <a href="/about">About</a>
        <a href="/contact">Contact</a>
        @auth
            <form class="inline" method="POST" action="/logout">
                @csrf
                <button type="submit">
                    Logout
                </button>
            </form>
        @else
            <a href="/login">Login</a>
        @endauth
    </div>
</div>