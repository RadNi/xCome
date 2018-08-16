<form method="post" action="{{ route('testRoute') }}" >
    {{ csrf_field() }}
    <input name="name" type="text">
    @if ($errors->has('name'))
        <div class="error">{{ $errors->first('name') }}</div>
    @endif
    <input type="submit">
</form>