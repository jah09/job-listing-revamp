<x-dashboard-layout>
    <div class="mt-8 overflow-hidden rounded-lg border border-gray-200 px-12">
        @foreach ($jobListings as $item)
            <div class="mb-10 flex items-center justify-between">
                <h1 class="font-sans text-[44px] font-bold">Applicants for - {{ $item->job_title }}</h1>
                {{-- <div class="">
                <a href="{{route('dashboard.createCompany')}}">
                <button class="bg-hipe-dark-blue text-md py-2 px-6 text-white rounded-lg shadow-sm outline-none">Create company</button>
            </a>
            </div> --}}
            </div>
        @endforeach
        <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
            <thead class="bg-gray-100">
                <tr>
                    <th scope="col" class="w-16 px-6 py-4 font-medium text-gray-900"> ID</th>
                    <th scope="col" class="py-4 font-medium text-gray-900">First Name</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Last Name</th>
                    <th scope="col" class="py-4 font-medium text-gray-900"> Number</th>
                    <th scope="col" class="py-4 font-medium text-gray-900">Email </th>
                    <th scope="col" class="py-4 font-medium text-gray-900">Resume </th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                @if ($jobApplications->count() > 0)
                    @foreach ($jobApplications as $item)
                        <tr class="hover:bg-gray-50">
                            <th class="flex items-center gap-3 px-6 py-4 font-normal text-gray-900">

                                <div class="text-sm">
                                    <p class="text-gray-700">{{ $item->id }}</p>

                                </div>
                            </th>
                            <td class="py-4">


                                <p class="text-gray-700">{{ $item->first_name }}</p>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-gray-700">{{ $item->last_name }}</p>
                            </td>
                            <td class="py-4">
                                <p class="text-gray-700">{{ $item->tel }}</p>
                            </td>
                            <td class="py-4">
                                <p class="text-gray-700">{{ $item->user->email }}</p>
                            </td>
                            <td class="py-4">
                                <a href="{{ $item->user_resume->private_resume_url() }}" target="_blank">


                                    <p class="text-gray-700 hover:font-medium">{{ $item->user_resume->name }}</p>
                                </a>
                            </td>

                            <td class="px-4">
                                <form id="form_{{ $item->id }}" method="POST"
                                    action="applicant/{applicant_id}/update-status" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="applicant_id" value="{{ $item->id }}">
                                    <select
                                        class="applicant_status w-full rounded-lg border px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                        name="status" required>
                                        <option value="pending" {{ $item->status == 'pending' ? 'selected' : '' }}>
                                            pending</option>
                                        <option value="accept" {{ $item->status == 'accept' ? 'selected' : '' }}>accept
                                        </option>
                                        <option value="reject" {{ $item->status == 'reject' ? 'selected' : '' }}>reject
                                        </option>
                                        <option value="on-initial-interview"
                                            {{ $item->status == 'on-initial-interview' ? 'selected' : '' }}>
                                            on-initial-interview</option>
                                        <option value="on-skills-test"
                                            {{ $item->status == 'on-skills-test' ? 'selected' : '' }}>on-skills-test
                                        </option>
                                        <option value="on-final-interview"
                                            {{ $item->status == 'on-final-interview' ? 'selected' : '' }}>
                                            on-final-interview</option>
                                        <option value="hired" {{ $item->status == 'hired' ? 'selected' : '' }}>hired
                                        </option>
                                        <option value="failed" {{ $item->status == 'failed' ? 'selected' : '' }}>failed
                                        </option>
                                        <option value="declined" {{ $item->status == 'declined' ? 'selected' : '' }}>
                                            declined</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="hover:bg-gray-50">
                        <td class="ml-10 px-6 py-24  " colspan="8">
                            <div class="  w-full  ">
                                <h1 class="text-hipe-blue  text-2xl font-semibold text-center">NO APPLICANTS
                                </h1>
                            </div>
                        </td>
                    </tr>

                @endif


            </tbody>
        </table>
    </div>
</x-dashboard-layout>
<script>
    var selects = document.querySelectorAll('.applicant_status');
    selects.forEach(function(select) {
        select.addEventListener('change', function() {
            var form = this.closest('form');
            var applicantId = form.querySelector('input[name="applicant_id"]').value;
            form.submit();
        });
    });
</script>
