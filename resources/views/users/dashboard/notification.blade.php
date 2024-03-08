 <x-dashboard-layout>
     <div class="overflow-hidden rounded-lg border border-gray-200 px-12">
         @if ($notification->count() > 0)
             <div class="container mx-auto mt-4">
                 <h4 class="text-lg font-medium">You have {{ $notifcount }} notifications</h4>
             </div>
             @foreach ($notification as $item)
                 <div
                     class="mx-start {{ $item->read == true ? 'bg-gray-300' : 'bg-white' }} mt-4 flex max-w-3xl overflow-hidden rounded-lg shadow-lg">
                     <div class="bg-hipe-blue w-2"></div>

                     <div class="flex cursor-pointer items-center px-2 py-3"
                         onclick="location.href='/read-notification/{{ $item->id }}'">
                         <img class="h-12 w-12 rounded-full object-cover"
                             src="{{ $item->job_application->job_listing->company->image_url() }}">
                         <div class="mx-3">
                             <h2 class="text-xl font-semibold text-gray-800">{{ $item->message }}</h2>
                             <p class="text-gray-600">{{ date('Y-m-d', strtotime($item->created_at)) }}
                             </p>
                         </div>
                     </div>
             @endforeach
     </div>
 @else
     <div>
         <h4 class="text-lg font-medium"> No notification</h4>

     </div>

     @endif

     </div>
 </x-dashboard-layout>
