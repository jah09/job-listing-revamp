<x-dashboard-layout>
    <div class=" ">
        <form action="/store-resume" method="POST" class="mt-10 bg-gray-50 border  rounded  max-w-lg mx-auto p-10" enctype="multipart/form-data">
            @csrf
            <div class="flex items-center flex-col">
                <h1 class="font-bold text-4xl">UPLOAD RESUME</h1>
                <p class="text-lg italic">Find job now!</p>
            </div>
            <div class="mb-6 mt-10">
                <label for="name" class="inline-block text-lg mb-2">Name</label>
                <input value="{{ old('name') }}" type="user_id" class="border border-gray-200 rounded p-2 w-full" id="name"
                    name="name" />
                @error('name')
                    <p class="text-red-500 text-sm font-semibold mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="resume_url" class="inline-block text-lg mb-2">
                    Upload resume
                </label>
                <input type="file" id="resume_url" name="resume_url" value="{{ old('resume_url') }}"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                required>
                @error('resume_url')
                    <p class="text-red-500 text-sm font-semibold mt-1">{{ $message }}</p>
                @enderror
            </div>
            {{-- Button codes --}}
            <div class="mb-6 flex justify-center">
                <button type="submit"
                    class="bg-gray-50 font-semibold   rounded py-2 px-4 border border-red-600 text-black hover:bg-red-600 hover:text-white">
                    Submit
                    <i class="fa fa-sign-in ml-2" aria-hidden="true"></i>
                </button>
            </div>
            

        </form>
    </div>
</x-dashboard-layout>