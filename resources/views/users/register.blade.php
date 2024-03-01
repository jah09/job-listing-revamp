<x-layout>
    <x-card>
        <section class="min-h-screen flex items-stretch text-white ">
            <div class="lg:flex w-1/2 hidden bg-gray-500 bg-no-repeat bg-cover relative items-center"
                style="background-image: url(https://images.pexels.com/photos/590037/pexels-photo-590037.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1);">
                <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
                <div class="w-full px-24 z-10">
                    <h1 class="text-5xl font-bold text-left tracking-wide">Register for free to get updated!</h1>
                    <p class="text-3xl my-4 italic">Start your journey with us, now.</p>
                </div>

            </div>
            <div class="lg:w-1/2 w-full flex items-center justify-center text-center md:px-16 px-0 z-0"
                style="background-color:  #023047;">
          
                <div class="w-full py-6 z-20">
                    <div class="flex flex-col items-center">
                        <img src="{{ asset('images/logo.png') }}" alt="logo" class="w-24">
                        <h1 class="font-bold text-4xl my-6">
                            Register
                        </h1>
                    </div>
                   


                    <form action="/users" method="POST" class="sm:w-2/3 w-full px-4 lg:px-0 mx-auto">
                        @csrf
                        <div class="pb-2 pt-4">
                            <input type="email" name="email" id="email" placeholder="Email"
                                class="block w-full p-4 text-lg rounded-sm bg-black" value="{{ old('email') }}">
                            @error('email')
                                <p class="text-red-500 text-sm font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="pb-2 pt-4">
                            <input class="block w-full p-4 text-lg rounded-sm bg-black" type="password" name="password"
                                id="password" placeholder="Password" value="{{ old('password') }}">
                            @error('password')
                                <p class="text-red-500 text-sm font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="text-right text-gray-400 hover:underline hover:text-gray-100">
                            <a href="#">Forgot your password?</a>
                        </div>
                        <div class=" pb-2 pt-6">
                            <button type="submit"
                                class="uppercase block w-full p-4 text-lg rounded-md border border-[#229fe7] hover:bg-[#229fe7] hover:text-black focus:outline-none font-semibold">
                                Register <i class="fa fa-sign-in ml-2" aria-hidden="true"></i></button>
                        </div>
                        <div class="mt-20">
                            <p class="font-semibold">
                               Already have an account?
                                <a href="/login">
                                    <span class="text-[#229fe7]">Login now.</span></a>
                            </p>
                        </div>


                    </form>
                </div>
            </div>
        </section>
    </x-card>
</x-layout>