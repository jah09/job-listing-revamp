<x-dashboard-layout>
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
    <x-card class="">

        <div class=" ">
            <form action="/users/edit" method="POST" class="mt-10 bg-gray-50 shadow-md  rounded  max-w-lg mx-auto p-10" enctype="multipart/form-data">
                @csrf
                <div class="flex items-center flex-col">
                    <h1 class="font-bold text-2xl">UPDATE YOUR PROFILE</h1>

                </div>
                <div class="mb-6 mt-6">
                    <label for="first_name" class="inline-block text-lg mb-2">Firstname</label>
                    <input value="{{ $userDetails->first_name }}" type="text"
                        class="border border-gray-200 rounded p-2 w-full " name="first_name" />
                    @error('first_name')
                        <p class="text-red-500 text-sm font-semibold mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="last_name" class="inline-block text-lg mb-2">
                        Lastname
                    </label>
                    <input value="{{ $userDetails->last_name }}" type="text"
                        class="border border-gray-200 rounded p-2 w-full" name="last_name" />
                    @error('last_name')
                        <p class="text-red-500 text-sm font-semibold mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="age" class="inline-block text-lg mb-2">
                        Age
                    </label>
                    <input value="{{ $userDetails->age }}" type="number"
                        class="border border-gray-200 rounded p-2 w-full" name="age" />
                    @error('age')
                        <p class="text-red-500 text-sm font-semibold mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="gender" class="inline-block text-lg mb-2">
                        Gender
                    </label>
                    <select class="border border-gray-200 rounded p-2 w-full" name="gender">
                        <option value="male" {{ $userDetails->gender == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ $userDetails->gender == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                    @error('gender')
                        <p class="text-red-500 text-sm font-semibold mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="address" class="inline-block text-lg mb-2">
                        Address
                    </label>
                    <input value="{{ $userDetails->address }}" type="text"
                        class="border border-gray-200 rounded p-2 w-full" name="address" />
                    @error('address')
                        <p class="text-red-500 text-sm font-semibold mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="tel" class="inline-block text-lg mb-2">
                        Tel
                    </label>
                    <input value="{{ $userDetails->tel }}" type="number"
                        class="border border-gray-200 rounded p-2 w-full" name="tel" />
                    @error('tel')
                        <p class="text-red-500 text-sm font-semibold mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- profilee logo--}}
                <div class="mb-4">
                    <label for="profile_logo" class="inline-block text-lg mb-2">
                        Profile Image
                    </label>
                    <input type="file" id="profile_logo" name="profile_logo" value="{{ old('profile_logo') }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                        required>
                    @error('profile_logo')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Button codes --}}
                <div class="mb-6 flex justify-center">
                    <button type="submit"
                        class="bg-gray-50 font-semibold   rounded py-2 px-4 border border-red-600 text-black hover:bg-red-600 hover:text-white">
                        Save Changes
                        <i class="fa fa-sign-in ml-2" aria-hidden="true"></i>
                    </button>
                </div>


            </form>
        </div>
    </x-card>

</x-dashboard-layout>
