<script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>    
</script>

<div class="min-h-screen" style="background: url('images/bg_footer.svg')">
    <div class="py-16 sm:py-24 lg:py-32">
        <div class="mx-auto flex max-w-7xl justify-between items-center relative ">
            <div class="mt-36 absolute top-0 right-0 flex justify-start items-center w-3/5 h-full ">
                <img class="w-[248px]" src="images/footer-object.gif" alt="">
            </div>
            <div class="max-w-xl text-3xl font-bold tracking-tight text-white sm:text-4xl lg:col-span-7 ">
                <h2 class="inline sm:block lg:inline xl:block">Want news and updates?</h2>
                <p class="inline sm:block lg:inline xl:block">Sign up for our newsletter.</p>
            </div>
           
            <form class="w-full max-w-md lg:col-span-5 lg:pt-2 " method="POST" action="/subscribe">
                @csrf
                <div class="flex gap-x-4 ">
                <label for="email" class="sr-only">Email address</label>
                <input id="email" name="email" type="email" autocomplete="email" required class="min-w-0 flex-auto rounded-md border-0 bg-white/10 px-3.5 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 placeholder:text-white/75 focus:ring-2 focus:ring-inset focus:ring-white sm:text-sm sm:leading-6 outline-none" placeholder="Enter your email " value="{{old('email')}}">

                <button type="submit" class="flex-none rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-[#229fe7] shadow-sm hover:bg-indigo-50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Subscribe</button>
                </div>
                <p class="mt-4 text-sm leading-6 text-gray-300">We care about your data. Read our <a href="#" class="font-semibold text-white hover:text-indigo-50">privacy&nbsp;policy</a>.</p>
            </form>
        </div>
    </div>
    <footer class="w-full text-gray-700 ">
        <div class="max-w-7xl container mx-auto flex flex-col flex-wrap px-5 py-24 mx-auto md:items-center lg:items-start md:flex-row md:flex-no-wrap ">
            <div class="flex-shrink-0 w-64 mx-auto text-center md:mx-0 md:text-left  ">
                <a class="flex items-center justify-center font-medium text-gray-900 title-font md:justify-start">
                    <img class="w-[100px]" src="images/img_logo.svg" alt="">
                </a>
                <p class="mt-2 text-sm text-gray-500">Discover hidden professional treasures.</p>
                <div class="mt-4">
                    <span class="inline-flex justify-center mt-2 sm:ml-auto sm:mt-0 sm:justify-start">
                        <a class="text-gray-500 cursor-pointer hover:text-gray-700">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                class="w-5 h-5" viewBox="0 0 24 24">
                                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                            </svg>
                        </a>
                        <a class="ml-3 text-gray-500 cursor-pointer hover:text-gray-700">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                class="w-5 h-5" viewBox="0 0 24 24">
                                <path
                                    d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                                </path>
                            </svg>
                        </a>
                        <a class="ml-3 text-gray-500 cursor-pointer hover:text-gray-700">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                            </svg>
                        </a>
                        <a class="ml-3 text-gray-500 cursor-pointer hover:text-gray-700">
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                                <path stroke="none"
                                    d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z">
                                </path>
                                <circle cx="4" cy="4" r="2" stroke="none"></circle>
                            </svg>
                        </a>
                    </span>
                </div>
            </div>
            <div class="flex  flex-wrap flex-grow mt-10 -mb-10 text-center md:pl-20 md:mt-0 md:text-left ">
                <div class="w-full px-4 lg:w-1/4 md:w-1/2">
                    <h2 class="mb-3 text-sm font-medium tracking-widest text-[#229fe7] uppercase title-font">About</h2>
                    <nav class="mb-10 list-none">
                        <li class="mt-3">
                            <a class="text-gray-300 cursor-pointer">Company</a>
                        </li>
                        <li class="mt-3">
                            <a class="text-gray-300 cursor-pointer">Careers</a>
                        </li>
                        <li class="mt-3">
                            <a class="text-gray-300 cursor-pointer">Blog</a>
                        </li>
                    </nav>
                </div>
                <div class="w-full px-4 lg:w-1/4 md:w-1/2">
                    <h2 class="mb-3 text-sm font-medium tracking-widest text-[#229fe7] uppercase title-font">Support</h2>
                    <nav class="mb-10 list-none">
                        <li class="mt-3">
                            <a class="text-gray-300 cursor-pointer">Contact Support</a>
                        </li>
                        <li class="mt-3">
                            <a class="text-gray-300 cursor-pointer">Help Resources</a>
                        </li>
                        <li class="mt-3">
                            <a class="text-gray-300 cursor-pointer">Release Updates</a>
                        </li>
                    </nav>
                </div>
                <div class="w-full px-4 lg:w-1/4 md:w-1/2">
                    <h2 class="mb-3 text-sm font-medium tracking-widest text-[#229fe7] uppercase title-font">Platform
                    </h2>
                    <nav class="mb-10 list-none">
                        <li class="mt-3">
                            <a class="text-gray-300 cursor-pointer">Terms &amp; Privacy</a>
                        </li>
                        <li class="mt-3">
                            <a class="text-gray-300 cursor-pointer">Pricing</a>
                        </li>
                        <li class="mt-3">
                            <a class="text-gray-300 cursor-pointer">FAQ</a>
                        </li>
                    </nav>
                </div>
                <div class="w-full px-4 lg:w-1/4 md:w-1/2">
                    <h2 class="mb-3 text-sm font-medium tracking-widest text-[#229fe7] uppercase title-font">Contact</h2>
                    <nav class="mb-10 list-none">
                        <li class="mt-3">
                            <a class="text-gray-300 cursor-pointer">Send a Message</a>
                        </li>
                        <li class="mt-3">
                            <a class="text-gray-300 cursor-pointer">Request a Quote</a>
                        </li>
                        <li class="mt-3">
                            <a class="text-gray-300 cursor-pointer">+123-456-7890</a>
                        </li>
                    </nav>
                </div>
            </div>
        </div>
        <div class="bg-transparent">
            <div class="container px-5 py-4 mx-auto ">
                <p class="text-sm text-gray-300 capitalize xl:text-center">© 2024 All rights reserved</p>
            </div>
        </div>
    </footer>
</div>