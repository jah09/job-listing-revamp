<x-dashboard-layout>
    <x-card>
        <div class="min-h-screen flex items-center justify-center ">


            <div class="max-w-md w-full p-4  rounded-lg shadow-lg bg-white">
                <form method="POST" action="/createcompany" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4 flex flex-col items-center">
                        <h3 class="font-semibold text-xl">Create your company</h3>
                        <p class="italic">Let's expand your company today!</p>
                    </div>
                    {{-- company logo --}}
                    <div class="mb-4">
                        <label for="logo_url" class="block mb-2 text-sm text-gray-600">Company Logo</label>
                        <input type="file" id="logo_url" name="logo_url" value="{{ old('logo_url') }}"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            required>
                        @error('logo_url')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- company name --}}
                    <div class="mb-4">
                        <label for="name" class="block mb-2 text-sm text-gray-600">Company Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            required>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- address ) --}}
                    <div class="mb-4">
                        <label for="address" class="block mb-2 text-sm text-gray-600">Address</label>
                        <input type="text" id="address" name="address" value="{{ old('address') }}"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            required>
                        @error('address')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- city --}}
                    <div class="mb-4">
                        <label for="city" class="block mb-2 text-sm text-gray-600">City</label>
                        <input type="text" id="city" name="city" value="{{ old('city') }}"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            required>
                        @error('city')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- state --}}
                    <div class="mb-4">

                        <label for="state" class="block mb-2 text-sm text-gray-600">State</label>
                        <input type="text" id="state" name="state" value="{{ old('state') }}"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            required>
                        @error('state')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- postal --}}
                    <div class="mb-4">
                        <label for="postal" class="block mb-2 text-sm text-gray-600">Postal</label>
                        <input type="numeric" id="postal" name="postal" value="{{ old('postal') }}"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            required>
                        @error('postal')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- tel --}}
                    <div class="mb-4">
                        <label for="tel" class="block mb-2 text-sm text-gray-600">Tel</label>
                        <input type="numeric" id="tel" name="tel" value="{{ old('tel') }}"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            required>
                        @error('postal')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- email --}}
                    <div class="mb-4">
                        <label for="email" class="block mb-2 text-sm text-gray-600">Email</label>
                        <input type="text" id="email" name="email" value="{{ old('email') }}"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            required>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- website --}}
                    <div class="mb-4">
                        <label for="website" class="block mb-2 text-sm text-gray-600">Website</label>
                        <input type="text" id="website" name="website" value="{{ old('website') }}"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            required>
                        @error('website')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="w-40 bg-gradient-to-r from-hipe-blue to-hipe-dark-blue   py-2 rounded-lg mx-auto block focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 mb-2 font-semibold transition hover:-translate-y-1 hover:scale-110 ease-in-out delay-150  text-black">Create
                        Company</button>

            </div>
            </form>
        </div>
        </div>
    </x-card>
</x-dashboard-layout>
