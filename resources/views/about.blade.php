<x-landing-navbar>
    <style>
        .fade-in-image {
            animation: fadeIn 5s;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .fade-in-left {
            animation: fadeInLeft 4s ease-in-out
        }

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-300px);
            }

            to {
                opacity: 1;
            }
        }
        .fade-in-right{
            animation: fadeInRight 4s ease-in-out
        }
        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(300px);
            }

            to {
                opacity: 1;
            }
        }
    </style>
    @include('partials._hero')
    <div class="bg-gray-100 min-h-screen p-4 ">

        <div class=" flex justify-between p-6 ">
            <div class="grid gap-4 grid-cols-2 grid-rows-2 w-1/2 gap-x-4 place-self-center px-4 fade-in-left">
                <div class="rounded-md shadow-md p-2 hover:skew-y-3 h-80 "> <img
                        class="w-full h-[300px] object-center rounded-md " src="images/s1.jpg" alt=""></div>
                <div class="rounded-md shadow-md p-2 hover:skew-y-3 h-80 "> <img
                        class="w-full h-[300px] object-center rounded-md " src="images/s2.jpg" alt=""></div>
                <div class="rounded-md shadow-md p-2 hover:skew-y-3 h-80 "> <img
                        class="w-full h-[300px] object-center rounded-md " src="images/s3.jpg" alt=""></div>
                <div class="rounded-md shadow-md p-2 hover:skew-y-3 h-80 "> <img
                        class="w-full h-[300px] object-center rounded-md " src="images/s4.jpg" alt=""></div>
            </div>
            <div class=" w-1/2 px-2 fade-in-right ">
                <div class="p-2 bg-gray-100 flex justify-center">
                    <h1
                        class="text-hipe-blue text-6xl mt-8 text-black tracking-wide font-semibold font-sans fade-in-image">
                        ABOUT US
                    </h1>

                </div>
                <div class="mt-10">
                    <h4 class="font-bold text-5xl text-start mb-4 ">HIPE OJT </h4>
                    <p class="px-2">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur neque quidem nesciunt odit
                        voluptates quaerat magni praesentium inventore, optio quas a dolor ducimus distinctio numquam
                        autem
                        iure sed iusto qui.</p>
                    <p class="px-2">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur neque quidem nesciunt odit
                        voluptates quaerat magni praesentium inventore, optio quas a dolor ducimus distinctio numquam
                        autem
                        iure sed iusto qui.</p>
                    <p class="px-2">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur neque quidem nesciunt odit
                        voluptates quaerat magni praesentium inventore, optio quas a dolor ducimus distinctio numquam
                        autem
                        iure sed iusto qui.</p>
                </div>
            </div>
        </div>

    </div>
    @include('partials._footer')
</x-landing-navbar>
