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
                <a href="{{route('dashboard.createCompany')}}">
                <button class="bg-hipe-dark-blue text-md py-2 px-6 text-white rounded-lg shadow-sm outline-none">Create company</button>
            </a>
            </div>
        </div>
        <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
            <thead class="bg-gray-100">
                <tr>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Name</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Website</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Address</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Contact</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                @foreach ($user_companies as $item)
                <tr class="hover:bg-gray-50">
                    <th class="flex gap-3 px-6 py-4 font-normal text-gray-900 items-center">
                        <div class="relative h-16 w-16">
                            <img class="h-full w-full rounded-lg object-contain bg-gray-200 object-fill"
                                src="{{ asset('storage/' . $item->logo_url) }}" alt="" />
                        </div>
                        <div class="text-sm">
                            <div class="font-medium text-gray-700">{{$item->name}}</div>
                            <div class="text-gray-400">{{$item->email}}</div>
                        </div>
                    </th>
                    <td class="px-6 py-4">
                        <a href=" {{$item->website}} " target="_blank">
                        <span
                            class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                            
                            <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                            {{$item->website}}
                        </span>
                    </a>
                    </td>
                    <td class="px-6 py-4">{{$item->address}}, {{$item->state}}, {{$item->postal}}
                        </td>
                    <td class="px-6 py-4">
                        {{$item->tel}}
                    </td>
                </tr>
                @endforeach
               
              
                {{-- <tr class="hover:bg-gray-50">
                    <th class="flex gap-3 px-6 py-4 font-normal text-gray-900 items-center">
                        <div class="relative h-16 w-16">
                            <img class="h-full w-full rounded-lg object-contain bg-gray-200 p-2 object-center"
                                src="/images/logo_hipe_black.png" alt="" />
                        </div>
                        <div class="text-sm">
                            <div class="font-medium text-gray-700">Hipe Japan</div>
                            <div class="text-gray-400">hipe@bpoc.co.jp</div>
                        </div>
                    </th>
                    <td class="px-6 py-4">
                        <span
                            class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                            <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                            bpoc.co.jp
                        </span>
                    </td>
                    <td class="px-6 py-4">Roof Deck Unit 1701 FLB Corporate Center, Cebu Business Park, Cebu City, 6000
                        Cebu</td>
                    <td class="px-6 py-4">
                        09565384835
                    </td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <th class="flex gap-3 px-6 py-4 font-normal text-gray-900 items-center">
                        <div class="relative h-16 w-16">
                            <img class="h-full w-full rounded-lg object-contain bg-gray-200 p-2 object-center"
                                src="/images/logo_hipe_black.png" alt="" />
                        </div>
                        <div class="text-sm">
                            <div class="font-medium text-gray-700">Hipe Japan</div>
                            <div class="text-gray-400">hipe@bpoc.co.jp</div>
                        </div>
                    </th>
                    <td class="px-6 py-4">
                        <span
                            class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                            <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                            bpoc.co.jp
                        </span>
                    </td>
                    <td class="px-6 py-4">Roof Deck Unit 1701 FLB Corporate Center, Cebu Business Park, Cebu City, 6000
                        Cebu</td>
                    <td class="px-6 py-4">
                        09565384835
                    </td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <th class="flex gap-3 px-6 py-4 font-normal text-gray-900 items-center">
                        <div class="relative h-16 w-16">
                            <img class="h-full w-full rounded-lg object-contain bg-gray-200 p-2 object-center"
                                src="/images/logo_hipe_black.png" alt="" />
                        </div>
                        <div class="text-sm">
                            <div class="font-medium text-gray-700">Hipe Japan</div>
                            <div class="text-gray-400">hipe@bpoc.co.jp</div>
                        </div>
                    </th>
                    <td class="px-6 py-4">
                        <span
                            class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                            <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                            bpoc.co.jp
                        </span>
                    </td>
                    <td class="px-6 py-4">Roof Deck Unit 1701 FLB Corporate Center, Cebu Business Park, Cebu City, 6000
                        Cebu</td>
                    <td class="px-6 py-4">
                        09565384835
                    </td>
                </tr> --}}
            </tbody>
        </table>
    </div>
</x-dashboard-layout>
