 @if (session()->has('success'))
    <script>
        Swal.fire({
            icon: "success",
            title: "{{ session('success') }}",
            confirmButtonText: "OK",
            confirmButtonColor: "#023047",
            timer: 2500
        });
     
    </script>
@elseif(session()->has('error'))
    <script>
        Swal.fire({
            icon: "error",
            title: "{{ session('error') }}",
            confirmButtonText: "OK",
            confirmButtonColor: "#023047",
            timer: 2500
        });
    </script>
@endif  

