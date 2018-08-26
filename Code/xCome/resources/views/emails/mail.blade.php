Hi <strong>{{ $name }}</strong>,
@foreach($elements as $element)
    <p>
        {{$element}}
    </p>
@endforeach
{{--<p>{{ $body }}</p>--}}