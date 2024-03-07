<nav class="bg-hipe-dark-blue w-full border-b border-gray-200">

    <div class="p-2">
        <div class="flex justify-between">
            <a href="/">
                <div class="flex">
                    <img src="{{ asset('images/img_logo.svg') }}" alt="logo" class="w-24 border-r-2 p-2">
                    <h1 class="text-hipe-blue m-2 text-3xl font-bold"> <span class="text-hipe-yellow">JOB</span>LISTING
                    </h1>
                </div>
            </a>
            <div class="mt-3 flex">

                <div class="relative inline-flex w-fit">
                    <div
                        class="text-md absolute bottom-auto left-auto right-4 top-2 z-10 inline-block w-6 -translate-y-1/2 translate-x-2/4 rotate-0 skew-x-0 skew-y-0 scale-x-100 scale-y-100 whitespace-nowrap rounded-full bg-red-700 px-2 py-1 text-start align-baseline font-bold leading-none text-white">
                        <p class="" id="notification-badge">0</p>
                    </div>
                    <div class="relative mr-3">
                        <a href="/notification-page">
                            <i class="fa-solid fa-bell text-3xl text-white"> </i>
                        </a>
                    </div>
                </div>

                <div class="px-2">
                    {{-- @if (auth()->user()->user_detail)
                        <img class="h-9 w-9 rounded-full object-contain bg-gray-200 object-fill"
                            src="{{  auth()->user()->user_detail->image_url() }}" alt="" />
                    
                    @endif --}}
                    @if (auth()->user()->user_detail)
                        <img class="h-9 w-9 rounded-full bg-gray-200 object-contain object-fill"
                            src="{{ auth()->user()->user_detail->image_url() }}" alt="" />
                    @else
                        ''
                    @endif
                </div>
                <h1 class="mr-4 flex justify-end text-2xl font-semibold text-gray-300">Welcome,
                    {{ auth()->user()->user_detail()->exists() ? auth()->user()->user_detail()->first()->first_name : 'Guest' }}!
                </h1>

            </div>
        </div>


    </div>

</nav>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        updateNotificationBadge();
        // Fetch the count of unread notifications every 30 seconds
        setInterval(updateNotificationBadge, 30000); // 30 seconds
    });

    function updateNotificationBadge() {
        $.ajax({
            url: '/notifications/unread_count',
            type: 'GET',
            data: {
                user_id: {{ auth()->user()->id }}
            },
            success: function(response) {
                var count = response.count;
                
                $('#notification-badge').text(count);
                // Hide the badge if there are no unread notifications
                if (count == 0) {
                    $('#notification-badge').hide();
                } else {
                    $('#notification-badge').show();
                }
            },
            error: function(xhr, status, error) {
                console.error("test", error);
            }
        });
    }
</script>
