<x-dashboard-layout>
    <x-card>
        <div class="flex min-h-screen items-center justify-center">


            <div class="w-full max-w-md rounded-lg bg-white p-4 shadow-lg">
                <form method="POST" action="/createcompany" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4 flex flex-col items-center">
                        <h3 class="text-xl font-semibold">Create your company</h3>
                        <p class="italic">Let's expand your company today!</p>
                    </div>
                    {{-- company logo --}}
                    <div class="mb-4">
                        <label for="logo_url" class="mb-2 block text-sm text-gray-600">Company Logo</label>
                        <input type="file" id="logo_url" name="logo_url" value="{{ old('logo_url') }}"
                            class="w-full rounded-lg border px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            required>
                        @error('logo_url')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- company name --}}
                    <div class="mb-4">
                        <label for="name" class="mb-2 block text-sm text-gray-600">Company Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                            class="w-full rounded-lg border px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            required>
                        @error('name')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- address ) --}}
                    <div class="mb-4">
                        <label for="address" class="mb-2 block text-sm text-gray-600">Address</label>
                        <input type="text" id="address" name="address" value="{{ old('address') }}"
                            class="w-full rounded-lg border px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            required>
                        @error('address')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- city --}}
                    <div class="mb-4">
                        <label for="city" class="mb-2 block text-sm text-gray-600">City</label>
                        <input type="text" id="city" name="city" value="{{ old('city') }}"
                            class="w-full rounded-lg border px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            required>
                        @error('city')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- state --}}
                    <div class="mb-4">

                        <label for="state" class="mb-2 block text-sm text-gray-600">State</label>
                        <input type="text" id="state" name="state" value="{{ old('state') }}"
                            class="w-full rounded-lg border px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            required>
                        @error('state')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- postal --}}
                    <div class="mb-4">
                        <label for="postal" class="mb-2 block text-sm text-gray-600">Postal</label>
                        <input type="numeric" id="postal" name="postal" value="{{ old('postal') }}"
                            class="w-full rounded-lg border px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            required>
                        @error('postal')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- tel --}}
                    <div class="mb-4">
                        <label for="tel" class="mb-2 block text-sm text-gray-600">Tel</label>
                        <input type="numeric" id="tel" name="tel" value="{{ old('tel') }}"
                            class="w-full rounded-lg border px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            required>
                        @error('postal')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- email --}}
                    <div class="mb-4">
                        <label for="email" class="mb-2 block text-sm text-gray-600">Email</label>
                        <input type="text" id="email" name="email" value="{{ old('email') }}"
                            class="w-full rounded-lg border px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            required>
                        @error('email')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- website --}}
                    <div class="mb-4">
                        <label for="website" class="mb-2 block text-sm text-gray-600">Website</label>
                        <input type="text" id="website" name="website" value="{{ old('website') }}"
                            class="w-full rounded-lg border px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            required>
                        @error('website')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="from-hipe-blue to-hipe-dark-blue mx-auto mb-2 block w-40 rounded-lg bg-gradient-to-r py-2 font-semibold text-black transition delay-150 ease-in-out hover:-translate-y-1 hover:scale-110 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2">Create
                        Company</button>

            </div>
            </form>
        </div>
        
    </x-card>
</x-dashboard-layout>
