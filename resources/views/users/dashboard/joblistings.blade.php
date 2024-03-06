<x-dashboard-layout>
    <div class="mt-8 overflow-hidden rounded-lg border border-gray-200 px-12">
        <div class="mb-10 flex items-center justify-between">
            <h1 class="font-sans text-[44px] font-bold">Job Listing</h1>
            <div class="">
                <a href="{{ route('dashboard.createJobListing') }}">
                    <button class="bg-hipe-dark-blue text-md rounded-lg px-6 py-2 text-white shadow-sm outline-none">Post
                        a Job</button>
                </a>
            </div>
        </div>
        <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
            <thead class="bg-gray-100">
                <tr>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Listing</th>
                    <th scope="col" class="w-64 px-6 py-4 font-medium text-gray-900">Job Category</th>
                    <th scope="col" class="w-56 px-6 py-4 font-medium text-gray-900">Applicants</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Employee Type</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                </tr>
            </thead>
            <tbody class="w-full divide-y divide-gray-200 border-t border-gray-100">
                @if ($user_joblisting->count() > 0)
                    @foreach ($user_joblisting as $item)
                        <tr class="hover:bg-gray-100">
                            <th class="flex items-center gap-3 px-6 py-4 font-normal text-gray-900">
                                <div class="relative h-16 w-16">
                                    <img class="h-full w-full rounded-lg bg-gray-100 object-contain object-center p-1"
                                        src="{{ $item->company->image_url() }}" alt="" />
                                </div>
                                <a href="/dashboard/job-listings/{{ $item->id }}/applicants">
                                    <div class="text-sm">
                                        <div class="font-medium text-gray-700">{{ $item->job_title }}</div>
                                        <div class="text-gray-400">{{ $item->company->name }}</div>
                                    </div>
                                </a>
                            </th>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                                    <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                                    {{ $item->job_category->name }}
                                </span>
                            </td>
                            <td class="px-6 py-4">{{ $item->job_listings->count() }}</td>
                            <td class="px-6 py-4 text-green-500">
                                <span
                                    class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                                    <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                                    {{ $item->employment_type }}
                                </span>
                            </td>
                            <td class="py-4">
                                <div class="flex justify-start">

                                    <div class="space-x-2">
                                        <button onclick="openModal('{{ $item }}')">
                                            <a>
                                                {{-- <i class="fa-solid   fa-pencil-square-o text-lg text-blue-600"></i> --}}
                                                <i class="fa-solid fa-pen-to-square text-lg text-green-500"></i>
                                            </a>
                                        </button>
                                    </div>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-12 text-center" colspan="6">
                            <h1 class="text-hipe-blue text-2xl font-semibold">NO JOB LISTING YET</h1>
                        </td>
                    </tr>
                @endif

            </tbody>
        </table>
        <div class="main-modal h-100 animated fadeIn faster fixed inset-0 z-50 flex hidden w-full items-center justify-center overflow-hidden"
            style="background: rgba(0,0,0,.7);">
            <div
                class="modal-container z-50 mx-auto w-11/12 overflow-y-auto rounded border bg-white p-4 shadow-lg shadow-lg md:max-w-md">
                <div class="modal-content px-6 py-2 text-left">
                    <div class="flex items-center justify-between pb-3">
                        <p class="text-2xl font-bold">Edit your joblisting </p>
                        <div onclick="modalClose()" class="modal-close z-50 cursor-pointer   ml-10">
                            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18"
                                height="18" viewBox="0 0 18 18">
                                <path
                                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <!--Body-->
                    <div class="my-5 h-96">
                        <form method="POST" action="/update-job-listing" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="id" name="id">
                            {{-- company name --}}
                            <div class="mb-4">
                                <label for="companyName" class="mb-2 block text-sm text-gray-600">Company</label>

                                <input id="companyName" name="companyName" value="{{ old('companyName') }}"
                                    type="text" disabled
                                    class="w-full rounded-lg border px-4 py-2  bg-gray-200"
                                    required>

                                </input>

                            </div>
                            {{-- employment  type --}}
                            <div class="mb-4">
                                <label for="employment_type" class="mb-2 block text-sm text-gray-600">Employment
                                    Type</label>
                                <select name="employment_type" id="employment_type"
                                    value="{{ old('employment_type') }}"
                                    class="w-full rounded-lg border px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    required>
                                    <option value="Full-time">Full Time</option>
                                    <option value="Part-time">Part Time</option>
                                </select>
                                </select>

                            </div>
                            {{--min salary --}}
                            <div class="flex">
                                <div class="mb-6">
                                    <label for="min_monthly_salary" class="mb-2 inline-block text-sm">Min Salary</label>
                                    <input type="number" name="min_monthly_salary" id="min_monthly_salary"
                                        class="w-full rounded border border-gray-200 p-2"
                                        value="{{ old('min_monthly_salary') }}">
                                    @error('min_monthly_salary')
                                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-6 ml-2">
                                    <label for="max_monthly_salary" class="mb-2 inline-block text-sm">Max Salary</label>
                                    <input type="number" name="max_monthly_salary" id="max_monthly_salary"
                                        class="w-full rounded border border-gray-200 p-2"
                                        value="{{ old('max_monthly_salary') }}">
                                    @error('max_monthly_salary')
                                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- job title ) --}}
                            <div class="mb-4">
                                <label for="job_title" class="mb-2 block text-sm text-gray-600">Job Title</label>
                                <input type="text" id="job_title" name="job_title"
                                    value="{{ old('job_title') }}"
                                    class="w-full rounded-lg border px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    required>
                                @error('job_title')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- job category type --}}
                            <div class="mb-4">
                                <label for="job_category_id" class="mb-2 block text-sm text-gray-600">Job Category
                                </label>

                                <select id="job_category_id" name="job_category_id"
                                    value="{{ old('job_category_id') }}"
                                    class="w-full rounded-lg border px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                     >
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}
                                        </option>
                                    @endforeach
        
                                </select>
                                {{-- @error('company_id')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror --}}
                            </div>

                            {{-- job description --}}
                            <div class="mb-4">
                                <label for="description" class="mb-2 block text-sm text-gray-600">Job
                                    Description</label>
                                <textarea type="text" id="description" name="description" value="{{ old('description') }}"
                                    class="w-full rounded-lg border px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500" required
                                    placeholder="Includes tasks, requirements and etc."></textarea>
                                @error('description')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="p-4">

                                <button type="submit"
                                    class="from-hipe-blue to-hipe-dark-blue mx-auto mb-2 block w-40 rounded-lg bg-gradient-to-r py-2 font-semibold text-black transition delay-150 ease-in-out hover:-translate-y-1 hover:scale-110 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2">Update
                                    Job</button>
                            </div>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

</x-dashboard-layout>
<script>
    const modal = document.querySelector('.main-modal');

    const modalClose = () => {
        modal.classList.add('hidden');
    }

    const openModal = (listing) => {
         const item = JSON.parse(listing);
        console.log(item);
         document.getElementById('companyName').value = item.company.name;
         document.getElementById('employment_type').value = item.employment_type;
         document.getElementById('min_monthly_salary').value = item.min_monthly_salary;
         document.getElementById('max_monthly_salary').value = item.max_monthly_salary;
         document.getElementById('job_title').value = item.job_title;
         document.getElementById('job_category_id').value = item.job_category_id;
         document.getElementById('description').value = item.description;
         document.getElementById('id').value = item.id;

        modal.classList.remove('hidden');
    }
</script>
