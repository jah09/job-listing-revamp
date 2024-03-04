<x-dashboard-layout>
    <div class=" mt-8 overflow-hidden rounded-lg border border-gray-200">
        <div class="flex justify-between items-center mb-10">
            <h1 class="text-[44px] font-sans font-bold">My Job Applications</h1>

        </div>
    </div>
    <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
        <thead class="bg-gray-100">
            <tr>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Name</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900  w-48">Job Title</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900 w-48">Salary Range</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900 ">Resume </th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Date applied</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Application</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
            @if ($userJobApplications->count()>0)
            @foreach ($userJobApplications as $item)
            <tr class="hover:bg-gray-50">
                <th class="flex gap-3 px-6 py-4 font-normal text-gray-900 items-center">
                    <div class="relative h-16 w-16">
                        <img class="h-full w-full rounded-lg object-contain bg-gray-200 p-2 object-center"
                            src="{{ $item->job_listing->company->image_url() }}" alt="" />
                    </div>
                    <div class="text-sm">
                        <div class="font-medium text-gray-700">{{ $item->job_listing->company->name }}</div>
                        <div class="text-gray-400">{{ $item->job_listing->company->email }}</div>
                    </div>
                </th>
                <td class="px-6 py-4">
                    <span
                        class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                        <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                        {{ $item->job_listing->job_title }}
                    </span>
                </td>
                <td class="px-6 py-4">₱{{ $item->job_listing->min_monthly_salary }} -
                    ₱{{ $item->job_listing->max_monthly_salary }}</td>
                <td class="px-6 py-4 text-red">
                    {{-- {{ $item->user_resume ? $item->user_resume->name : '' }} --}}
                    {{$item->user_resume->name}}
                    {{-- {{ App\Models\UserResume::findOrFail($item->resume_id)->name }} --}}
                </td>
                <td class="px-6 py-4 text-red">
                    {{  date('Y-m-d', strtotime($item->created_at))}}
                </td>
                <td class="px-6 py-4">
                    <span
                        class="{{ $item->status == 'reject' ? 'inline-flex items-center gap-1 rounded-full bg-red-50 px-2 py-1 text-xs font-semibold text-red-600 animate-pulse' :'inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600 animate-pulse'}} ">

                        {{-- <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                        {{ $item->status }} --}}
                        <span class="{{ $item->status == 'reject' ? 'h-1.5 w-1.5 rounded-full bg-red-600' : 'h-1.5 w-1.5 rounded-full bg-green-600' }}"></span>
                        {{ $item->status }}
                        
                    </span>
                </td>
            </tr>
        @endforeach 
            @else
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-12 text-center" colspan="6">
                    <h1 class="text-hipe-blue font-semibold text-2xl">NO JOB APPLICATIONS</h1>
                </td>
            </tr>
            @endif
           


        </tbody>
    </table>
    </div>

</x-dashboard-layout>
