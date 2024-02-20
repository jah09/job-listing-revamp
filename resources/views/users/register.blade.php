<x-layout>
    <x-card>
        <div class="justify-center flex ">
            <img src="{{asset(('images/logo.png'))}}" alt="logo" class="w-24">

        </div>
        <div class=" ">
            <form action="" class="mt-10 bg-gray-50 border border-red-500 rounded  max-w-lg mx-auto p-10">
                @csrf
                <div class="flex items-center flex-col">
                    <h1 class="font-bold text-4xl">REGISTER</h1>
                    <p class="text-lg">Create an account</p>
                </div>
                <div class="mb-6 mt-10">
                    <label for="email" class="inline-block text-lg mb-2">Email</label>
                    <input value="{{old('email')}}" type="email" class="border border-gray-200 rounded p-2 w-full"
                        name="email" />
                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="inline-block text-lg mb-2">
                        Password
                    </label>
                    <input value="{{old('password')}}" type="password" class="border border-gray-200 rounded p-2 w-full"
                        name="password" />
                    @error('password')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                {{-- Button codes --}}
                <div class="mb-6 flex justify-center">
                    <button type="submit" class="bg-gray-50 font-semibold   rounded py-2 px-4 border border-red-600 text-black hover:bg-red-600 hover:text-white">
                        Register
                        <i class="fa fa-sign-in ml-2" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="">
                    <p class="font-semibold">
                        Already have an account?
                        <a href="">
                            <span class="text-red-500">Login</span>
                        </a>
                    </p>
                </div>

            </form>
        </div>
    </x-card>
</x-layout>