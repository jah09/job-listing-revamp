<x-layout>
    <x-card>
 

        <section class="flex min-h-screen items-stretch text-white">
            <div class="relative hidden w-1/2 items-center bg-gray-500 bg-cover bg-no-repeat lg:flex"
                style="background-image: url(https://images.pexels.com/photos/590037/pexels-photo-590037.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1);">
                <div class="absolute inset-0 z-0 bg-black opacity-60"></div>
                <div class="z-10 w-full px-24">
                    <h1 class="text-left text-5xl font-bold tracking-wide">Forgot your password?</h1>
                    <p class="my-4 text-3xl italic">Change it, now.</p>
                </div>

            </div>
            <div class="z-0 flex w-full items-center justify-center px-0 text-center md:px-16 lg:w-1/2"
                style="background-color:  #023047;">

                <div class="z-20 w-full py-6">
                    <div class="flex flex-col items-center">
                        <img src="{{ asset('images/logo.png') }}" alt="logo" class="w-24">
                        <h1 class="my-6 text-4xl font-bold">
                            Forgot password
                        </h1>
                    </div>



                    <form action="{{ route('password.send_email') }}" method="POST"
                        class="mx-auto w-full px-4 sm:w-2/3 lg:px-0">
                        @csrf
                        
                        <div class="pb-2 pt-4">
                            <input type="email" name="email" id="email" placeholder="Email"
                                class="block w-full rounded-sm bg-black p-4 text-lg" value="{{ old('email') }}">
                            @error('email')
                                <p class="mt-1 text-sm font-semibold text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                       
                        
                        <div class="pb-2 pt-6">
                            <button type="submit"
                                class="block w-full rounded-md border border-[#229fe7] p-4 text-lg font-semibold uppercase hover:bg-[#229fe7] hover:text-black focus:outline-none"> {{ __('Send password reset link') }}
                                <i class="fa fa-sign-in ml-2" aria-hidden="true"></i></button>
                        </div>
                        <div class="mt-20">
                            <a href="/login">
                                <p class="hover:text-[#229fe7]">
                                    Back to login


                                </p>
                            </a>
                        </div>


                    </form>
                </div>
            </div>
        </section>
    </x-card>
</x-layout>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#checkbox').on('change', function(){
            var passwordField = $('#password');
            if (passwordField.length > 0) {
                passwordField.attr('type', $(this).prop('checked') ? 'text' : 'password'); 
            } else {
                console.error("Password field not found.");
            }
        });
    });
</script>
