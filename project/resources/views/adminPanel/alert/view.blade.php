@if (Session::has('info'))
    <script>
        swal({
            title: 'Info!',
            text: "{{ Session::get('info') }}",
            type: 'info',
            padding: '2em'
        });
    </script>


@endif

@if (Session::has('error'))
    <script>
        swal({
            title: 'Error!',
            text: "{{ Session::get('error') }}",
            type: 'error',
            padding: '2em'
        });
    </script>

@endif

@if (Session::has('warning'))
    <script>

        swal({
            title: 'Warning!',
            text: "{{ Session::get('warning') }}",
            type: 'warning',
            padding: '2em'
        });
    </script>

@endif

@if (Session::has('success'))
    <script>

        swal({
            title: 'Warning!',
            text: "{{ Session::get('success') }}",
            type: 'success',
            padding: '2em'
        });

    </script>


@endif

@if (Session::has('danger'))
    <script>
           swal({
            title: 'Danger!',
            text: "{{ Session::get('danger') }}",
            type: 'danger',
            padding: '2em'
        });

    </script>

@endif
