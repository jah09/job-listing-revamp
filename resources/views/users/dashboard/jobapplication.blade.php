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
                <th scope="col" class="px-6 py-4 font-medium text-gray-900  w-64">Job Title</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900 w-56">Salary Range</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900 ">Resume </th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Date applied</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 border-t border-gray-100">

            @foreach ($userJobApplications as $item)
                <tr class="hover:bg-gray-50">
                    <th class="flex gap-3 px-6 py-4 font-normal text-gray-900 items-center">
                        <div class="relative h-16 w-16">
                            <img class="h-full w-full rounded-lg object-contain bg-gray-200 p-2 object-center"
                                src="{{ asset('images/logo_hipe_black.png') }}" alt="" />
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
                        {{ $item->user_resume->name }}
                    </td>
                    <td class="px-6 py-4 text-red">
                        {{  date('Y-m-d', strtotime($item->created_at))}}
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
    </div>

</x-dashboard-layout>
