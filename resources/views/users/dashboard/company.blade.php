{{-- <div class="grid grid-cols-4 gap-4">
            <div class="bg-red-900">1</div>
            <div  class="bg-blue-900">2</div>
            <div  class="bg-green-900">3</div>
            <div  class="bg-orange-900">4</div>
        </div> --}}

<x-dashboard-layout>
    <div class="mt-8 overflow-hidden rounded-lg border border-gray-200 px-12">
        <div class="mb-10 flex items-center justify-between">
            <h1 class="font-sans text-[44px] font-bold">Company</h1>
            <div class="">
                <a href="{{ route('dashboard.createCompany') }}">
                    <button
                        class="bg-hipe-dark-blue text-md hover:shadow-hipe-dark-blue-500/40 rounded-lg px-6 py-2 text-white shadow-sm outline-none">Create
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
                            <th class="flex items-center gap-3 px-6 py-4 font-normal text-gray-900">
                                <div class="relative h-16 w-16">
                                    <img class="h-full w-full rounded-lg bg-gray-200 object-contain object-fill"
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
                                <div class="flex justify-start gap-2">
                                    <form id="form_{{ $item->id }}" method="POST"
                                        action="/company/{{ $item->id }}/trash" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="company_id" value="{{ $item->id }}">
                                        <div class="space-x-2">
                                            <button
                                                onclick="confirmDelete('{{ $item->name }}', '{{ $item->id }}')">
                                                <a>
                                                    <i class="fa-solid fa-trash text-lg text-red-600"></i>
                                                </a>
                                            </button>
                                        </div>
                                    </form>
                                    <div>
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
                                    </div>
                                </div>

                            </td>

                        </tr>
                    @endforeach
                @else
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-12 text-center" colspan="6">
                            <h1 class="text-hipe-blue text-2xl font-semibold">NO COMPANY</h1>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
        {{-- Modal here --}}
        <div class="main-modal h-100 animated fadeIn faster fixed inset-0 z-50 flex hidden w-full items-center justify-center overflow-hidden"
            style="background: rgba(0,0,0,.7);">
            <div
                class="modal-container z-50 mx-auto w-11/12 overflow-y-auto rounded border bg-white p-4 shadow-lg shadow-lg md:max-w-md">
                <div class="modal-content px-6 py-2 text-left">
                    <div class="flex items-center justify-between pb-3">
                        <p class="text-2xl font-bold">Edit your company </p>
                        <div onclick="modalClose()" class="modal-close z-50 cursor-pointer">
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
                        <form method="POST" action="/updatecompany" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="id" name="id">

                            {{-- company logo --}}
                            <div class="mb-4">
                                <label for="logo_url" class="mb-2 block text-sm text-gray-600">Company Logo</label>
                                <input type="file" id="logo_url" name="logo_url" value="{{ old('logo_url') }}"
                                    class="w-full rounded-lg border px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500">
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

                            <div class="p-4">
                                <button type="submit"
                                    class="from-hipe-blue to-hipe-dark-blue mx-auto mb-2 block w-40 rounded-lg bg-gradient-to-r py-2 font-semibold text-black transition delay-150 ease-in-out hover:-translate-y-1 hover:scale-110 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2">Update
                                    Company</button>
                            </div>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
    <script>
        const modal = document.querySelector('.main-modal');

        const modalClose = () => {
            modal.classList.add('hidden');
        }

        const openModal = (company) => {
            const item = JSON.parse(company);

          //  document.getElementById('companyName').textContent = item.name;
            document.getElementById('name').value = item.name;
            document.getElementById('address').value = item.address;
            document.getElementById('city').value = item.city;
            document.getElementById('state').value = item.state;
            document.getElementById('postal').value = item.postal;
            document.getElementById('tel').value = item.tel;
            document.getElementById('email').value = item.email;
            document.getElementById('website').value = item.website;
            document.getElementById('id').value = item.id;

            // var form = document.getElementById(`form_${companyID}`);
            //  form.submit();
            modal.classList.remove('hidden');
        }
    </script>

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
