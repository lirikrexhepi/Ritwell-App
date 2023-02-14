@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<center>
<form method="POST" action="/reset-Password">
    @csrf
    <input type="hidden" name="user_id" value="{{$user_id}}">  
    <input type="password" name="password" placeholder="New Password">
    <br><br>
    <input type="password" name="password_confirmation" placeholder="Confirm Password">
    <br><br>
    <input type="submit">

</form>
</center>