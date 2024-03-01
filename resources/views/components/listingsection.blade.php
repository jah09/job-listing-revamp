<div class="bg-gray-100 min-h-screen">
    <div class="p-2 bg-gray-100 flex justify-center">
        <h1 class="text-hipe-blue text-4xl mt-8 text-[#229fe7] font-semibold">FEATURED JOBS</h1>

    </div>
    <div class="flex justify-center  ">
        <div class="grid {{ count($jobListing) === 1   ? 'justify-center' : 'grid-cols-4' }} gap-4 p-4">


           
            @foreach ($jobListing as $item)
            <div
            class=" flex  max-w-[30rem] flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-lg    ">
            <div
                class="relative mx-4 mt-4 overflow-hidden rounded-xl bg-blue-gray-500 bg-clip-border text-white shadow-lg shadow-blue-gray-500/40 hover:skew-y-6">
                <img  src="{{$item->company->image_url() }}" alt=""
                    alt="ui/ux review check" class="object-fit w-64 h-64 "/>
                <div
                    class="to-bg-black-10 absolute inset-0 h-full w-full bg-gradient-to-tr from-transparent via-transparent to-black/60">
                </div>
                 
            </div>
            <div class="p-6">
                <div class="mb-3 flex items-center justify-between">
                    <h5
                        class="block font-sans text-xl font-medium leading-snug tracking-normal text-blue-gray-900 antialiased">
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
                <button class="block w-full select-none rounded-lg bg-[#229fe7] py-3.5 px-7 text-center align-middle font-sans text-sm font-bold uppercase text-black shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-105  duration-300">View Job</button>
             </a>
            </div>
        </div>
            @endforeach
            
 
           
           
        </div>
    </div>

</div>
  <!-- stylesheet -->


<!-- from cdn -->
<script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>
