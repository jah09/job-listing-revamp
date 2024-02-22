<x-dashboard-layout>
    <x-card>
        <div class="min-h-screen flex items-center justify-center ">


            <div class="max-w-md w-full p-4  rounded-lg shadow-lg bg-white">
                <form method="POST" action="/createjoblisting" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4 flex flex-col items-center">
                        <h3 class="font-semibold text-xl">Post a job </h3>
                        <p class="italic">Let them know now!</p>
                    </div>
                    {{-- company name --}}
                    <div class="mb-4">
                        <label for="company_id" class="block mb-2 text-sm text-gray-600">Company</label>

                        <select id="company_id" name="company_id" value="{{ old('company_id') }}"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            required>
                            @foreach ($companies as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}
                                </option>
                            @endforeach

                        </select>
                        {{-- @error('company_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror --}}
                    </div>
                    {{-- employment  type --}}
                    <div class="mb-4">
                        <label for="employment_type" class="block mb-2 text-sm text-gray-600">Employment Type</label>
                        <select name="employment_type" id="employment_type" value="{{ old('employment_type') }}"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            required>
                            <option value="full-time">Full Time</option>
                            <option value="part-time">Part Time</option>
                        </select>
                        </select>

                    </div>
                    {{-- salary --}}
                    <div class="flex">
                        <div class="mb-6">
                            <label for="min_monthly_salary" class="inline-block text-sm mb-2">Min Salary</label>
                            <input type="number" name="min_monthly_salary" id="min_monthly_salary"
                                class="border border-gray-200 rounded p-2 w-full"
                                value="{{ old('min_monthly_salary') }}">
                            @error('min_monthly_salary')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6 ml-2">
                            <label for="max_monthly_salary" class="inline-block text-sm mb-2">Max Salary</label>
                            <input type="number" name="max_monthly_salary" id="max_monthly_salary"
                                class="border border-gray-200 rounded p-2 w-full"
                                value="{{ old('max_monthly_salary') }}">
                            @error('max_monthly_salary')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- job title ) --}}
                    <div class="mb-4">
                        <label for="job_title" class="block mb-2 text-sm text-gray-600">Job Title</label>
                        <input type="text" id="job_title" name="job_title" value="{{ old('job_title') }}"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            required>
                        @error('job_title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- job category type --}}
                    <div class="mb-4">
                        <label for="job_category_id" class="block mb-2 text-sm text-gray-600">Job Category </label>

                        <select id="job_category_id" name="job_category_id" value="{{ old('job_category_id') }}"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            required>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}
                                </option>
                            @endforeach

                        </select>
                        @error('company_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- job description --}}
                    <div class="mb-4">
                        <label for="description" class="block mb-2 text-sm text-gray-600">Job Description</label>
                        <textarea type="text" id="description" name="description" value="{{ old('description') }}"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500" required
                            placeholder="Includes tasks, requirements and etc."></textarea>
                        @error('description')
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
