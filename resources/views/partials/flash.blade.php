@if(session()->has('flash_message'))
    <script>
           window.swal({
               title: "{{session('flash_message.title')}}",
               text: "{{session('flash_message.message')}}",
               icon: "{{session('flash_message.level')}}",
               button: "OKay"
       })
    </script>
@endif