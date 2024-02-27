<x-landing-navbar>
    @include('partials._hero')



    <div class="min-h-screen flex items-center justify-center  p-4">
        <div class="bg-[#229fe7] rounded-lg w-2/5 py-10 p-2 ">
            <div class="mx-auto max-w-2xl text-center">
                <h1 class="text-white text-4xl text-[#229fe7] font-semibold">CONTACT US</h1>
            </div>
            <form action="/contact-us-submit" method="POST" class="mx-auto max-w-xl mt-12">
                @csrf
                <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                    <div class="sm:col-span-2">
                        <label for="email" class="block text-sm font-semibold leading-6 text-white">Email</label>
                        <div class="mt-2.5">
                            <input type="email" name="email" id="email" autocomplete="email"
                                class="px-3.5 py-2 border  block w-full rounded-md placeholder:text-gray-400">
                            @error('email')
                                <p class="text-red-500 text-sm font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="subject" class="block text-sm font-semibold leading-6 text-white">Subject</label>
                        <div class="mt-2.5">
                            <input type="text" name="subject" id="subject"
                                class="px-3.5 py-2 border  block w-full rounded-md placeholder:text-gray-400">
                                @error('subject')
                                <p class="text-red-500 text-sm font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="message" class="block text-sm font-semibold leading-6 text-white">Message</label>
                        <div class="mt-2.5">
                            <textarea name="message" id="message" rows="4"
                                class="border block w-full rounded-md placeholder:text-gray-400 px-3.5"></textarea>
                                @error('message')
                                <p class="text-red-500 text-sm font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mt-16">
                    <button type="submit"
                        class="block w-full rounded-md bg-[#023047] px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-[#023047]">Submit</button>
                </div>
            </form>
        </div>
    </div>

    @include('partials._footer')
</x-landing-navbar>
