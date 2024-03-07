 <x-dashboard-layout>
     <div class="overflow-hidden rounded-lg border border-gray-200 px-12">
         <div class="container mx-auto mt-4">
             <h4 class="text-lg font-medium">You have {{ $notifcount }} notifications</h4>
         </div>
         <div class="mx-start mt-4 flex max-w-xl overflow-hidden rounded-lg bg-white shadow-lg">
             <div class="bg-hipe-blue w-2"></div>
             @foreach ($notification as $item)
                 <div class="flex items-center px-2 py-3">
                     <img class="h-12 w-12 rounded-full object-cover"
                         src="https://images.unsplash.com/photo-1477118476589-bff2c5c4cfbb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60">
                     <div class="mx-3">
                         <h2 class="text-xl font-semibold text-gray-800">{{ $item->message }}</h2>
                         <p class="text-gray-600">{{ $item->created_at }}
                         </p>
                     </div>
                 </div>
             @endforeach
         </div>
     </div>
 </x-dashboard-layout>
