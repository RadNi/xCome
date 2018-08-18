@extends('new.profile')

@section('workplace-div')

    <div id="app">
        <profile v-bind:x_data="{{ $x_data }}" v-bind:csrf_field="'{{ csrf_token() }}'">

        </profile>
    </div>

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <script src="js/app.js"></script>



@stop


