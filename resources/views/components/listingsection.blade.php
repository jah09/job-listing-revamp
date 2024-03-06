<style>
    .fadeIn {
        animation: fadeInAnimation ease 6s;
    }

    @keyframes fadeInAnimation {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }
</style>

<div class="min-h-screen bg-gray-100">
    <div class="flex justify-center bg-gray-100 p-2">
        <h1 class="text-hipe-blue mt-8 text-4xl font-semibold text-[#229fe7]">FEATURED JOBS</h1>

    </div>
    <div class=" p-4">
        @include('partials._search')
    </div>
    <div class="flex justify-center  ">
       
        <div class="{{ count($jobListing) === 1 ? 'justify-center' : 'grid-cols-4' }} grid gap-4 p-4">
          
            @if ($jobListing->count() > 0)
                @foreach ($jobListing as $item)
                    <div
                        class="fadeIn flex max-w-[30rem] flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-lg">
                        <div
                            class="bg-blue-gray-500 shadow-blue-gray-500/40 relative mx-4 mt-4 overflow-hidden rounded-xl bg-clip-border text-white shadow-lg hover:skew-y-6">
                            <img src="{{ $item->company->image_url() }}" alt="" alt="ui/ux review check"
                                class="object-fit h-64 w-64" />
                            <div
                                class="to-bg-black-10 absolute inset-0 h-full w-full bg-gradient-to-tr from-transparent via-transparent to-black/60">
                            </div>

                        </div>
                        <div class="p-6">
                            <div class="mb-3 flex items-center justify-between">
                                <h5
                                    class="text-blue-gray-900 block font-sans text-xl font-medium leading-snug tracking-normal antialiased">
                                    {{ $item->job_title }}
                                </h5>

                            </div>
                            <p class="block font-sans text-base font-light leading-relaxed text-gray-700 antialiased">
                                {{ $item->description }}
                            </p>
                            <p class="block font-sans text-base font-light leading-relaxed text-gray-700 antialiased">
                                ₱ {{ $item->min_monthly_salary }} - ₱
                                {{ $item->max_monthly_salary }}
                            </p>

                        </div>
                        <div class="p-6 pt-3">
                            <a href="/job-details/{{ $item->id }}">
                                <button
                                    class="block w-full select-none rounded-lg bg-[#229fe7] px-7 py-3.5 text-center align-middle font-sans text-sm font-bold uppercase text-black shadow-md shadow-blue-500/20 transition transition-all delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-105 hover:shadow-lg hover:shadow-blue-500/40">View
                                    Job</button>
                            </a>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="  w-screen flex justify-center">
                    <p class="text-center p-6 text-xl font-medium">NO JOB LISTING AVAILABLE AT THE MOMENT</p>
                </div>
            @endif

        </div>
    </div>

</div>
<!-- stylesheet -->


<!-- from cdn -->
<script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>
