<form method="post" action="{{ $action }}">
@csrf
    <p><input type="text" value="" name="message"></p>
    <p><input type="submit" value="Press me" name="doit"></p>
</form>
