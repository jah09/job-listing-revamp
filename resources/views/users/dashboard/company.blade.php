{{-- <div class="grid grid-cols-4 gap-4">
            <div class="bg-red-900">1</div>
            <div  class="bg-blue-900">2</div>
            <div  class="bg-green-900">3</div>
            <div  class="bg-orange-900">4</div>
        </div> --}}

<x-dashboard-layout>
    <div class="px-12 mt-8 overflow-hidden rounded-lg border border-gray-200">
        <div class="flex justify-between items-center mb-10">
            <h1 class="text-[44px] font-sans font-bold">Company</h1>
            <div class="">
                <a href="{{ route('dashboard.createCompany') }}">
                    <button
                        class="bg-hipe-dark-blue text-md py-2 px-6 text-white rounded-lg shadow-sm outline-none hover:shadow-hipe-dark-blue-500/40">Create
                        company</button>
                </a>
            </div>
        </div>
        <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
            <thead class="bg-gray-100">
                <tr>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Name</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Website</th>
                    <th scope="col" class="px-2 py-4 font-medium text-gray-900">Address</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Contact</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                @if ($user_companies->count() > 0)
                    @foreach ($user_companies as $item)
                        <tr class="hover:bg-gray-50">
                            <th class="flex gap-3 px-6 py-4 font-normal text-gray-900 items-center">
                                <div class="relative h-16 w-16">
                                    <img class="h-full w-full rounded-lg object-contain bg-gray-200 object-fill"
                                        src="{{ $item->image_url() }}" alt="" />
                                </div>
                                <div class="text-sm">
                                    <div class="font-medium text-gray-700">{{ $item->name }}</div>
                                    <div class="text-gray-400">{{ $item->email }}</div>
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                <a href=" {{ $item->website }} " target="_blank">
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">

                                        <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                                        {{ $item->website }}
                                    </span>
                                </a>
                            </td>
                            <td class="px-2 py-4">{{ $item->address }}, {{ $item->state }}, {{ $item->postal }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->tel }}
                            </td>
                            <td class="py-4">
                                <div class="flex justify-start gap-4">
                                    <form id="form_{{$item->id}}" method="POST" action="/company/{{$item->id}}/trash" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="company_id" value="{{$item->id}}">
                                        <div class="space-x-2">
                                            <button onclick="confirmDelete('{{$item->name}}', '{{$item->id}}')">
                                            <a >
                                                <i class="fa-solid fa-trash text-lg text-red-600"></i>
                                            </a>
                                        </button>
                                        </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-12 text-center" colspan="6">
                            <h1 class="text-hipe-blue font-semibold text-2xl">NO COMPANY</h1>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</x-dashboard-layout>
<script>
    function confirmDelete(companyName, companyID) {
        Swal.fire({
            title: 'Move to trash?',
            html: `
                <div>
                    <p>
                        ${companyName}'s <span class="font-bold text-hipe-yellow">Job Listings</span> and
                        <span class="font-bold text-hipe-yellow">Job Listing Applications</span> will be disabled.
                    </p>
                </div>
            `,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes!'
        }).then((result) => {
            if (result.isConfirmed) {
                var form = document.getElementById(`form_${companyID}`);
                form.submit();
            }
        });
    }
</script>