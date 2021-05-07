<html>

<p>The message is:</p>

@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@else
    <p>Empty message.</p>
@endif

<p>Do it again <a href="{{ url('/form') }}">at this url</a>.</p>
