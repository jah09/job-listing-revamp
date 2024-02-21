@if (session()->has('message'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
        class="fixed right-0 right-0 right-1/2 transform -translate-x-1/2 bg-red-900 text-white px-0 py-0">
        <p>
            {{ session('message') }}
        </p>
    </div>
@endif
