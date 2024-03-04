<style>
    .fade-in-left {
        animation: fadeInLeft 4s ease-in-out
    }

    @keyframes fadeInLeft {
        from {
            opacity: 0;
            transform: translateX(-200px);
        }

        to {
            opacity: 1;
        }
    }

    .fadeIn {
        animation: fadeInAnimation ease 5s;
    }

    @keyframes fadeInAnimation {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }
        .fadeInBottom{
            animation: fadeInBottomAnimation ease 4s;
        }
        @keyframes fadeInBottomAnimation {
            0% {
                opacity: 0;
                transform: translateY(100%);
            }

            100% {
                opacity: 1;
            }
        }
</style>
<section class="align-center relative flex h-screen select-none flex-col justify-center bg-[#023047] text-center">
    {{-- ang whole na section is naka relative so dapat ang mga child div is naka absolute pra dili masaag sa laen nga div/section pud, para ang kana na mga div,diha ra mag libut2 --}}
    {{-- @include('partials._header') --}}
    <!-- include the header component partial !-->
    <div class="absolute right-0 top-0 flex h-full w-1/2 items-center justify-center  fadeIn ">
        <img class="pb-24" src="images/footer-object.gif" alt=""> 
    </div>
    <div class="absolute bottom-[20px] top-0 flex h-full w-full opacity-20 " style="">
        <img class="items-center justify-center" src="images/bg_p-information.png" alt="">
    </div>


    <div class="fade-in-left container relative z-10 mx-auto hidden max-w-7xl text-start lg:block">
        <span class="absolute ps-4 pt-4 text-xs font-semibold text-white">SUHOT'S</span>
        <h1 class="text-[84px] font-bold uppercase text-[#ffa903]">
            JOB<span class="font-semibold text-[#229fe7]">LISTING</span>
        </h1>
        <span
            class="absolute bottom-[45px] left-[410px] text-[10px] font-semibold tracking-widest text-white">PROJECT</span>
        <p class="m-0 p-0 text-3xl font-bold text-gray-200">
            Discover hidden professional treasures.
        </p>
    </div>

    <div class="absolute bottom-0 w-full py-6 text-center text-white fadeInBottom">
        <p>scroll down</p>
        <p class="animate-bounce"><i class="fa-solid fa-angle-down"></i></p>
    </div>
</section>
