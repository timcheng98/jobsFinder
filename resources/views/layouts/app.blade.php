      @include('include.header')
      @include('include.navbar')
      
      <div class="">
         
          @yield('content')
      </div>
      
    </body>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>



</html>
