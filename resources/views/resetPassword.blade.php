<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
</head>
<body>
    





<center>


<div style=" width: 40%; height: 600px; border:1px solid #ededed; margin-top: 180px;">

    <h1 style="font-family: tahoma; margin-top: 6%; font-size: 1.8vw;">ritwell</h1>

    <p style="font-family: tahoma; width: 73%; margin-top: 5%;">To reset your password, please enter a new password of your choice. For your account's security, we recommend that your password is strong and unique.</p>
    
<form method="POST" action="/reset-Password">
    @csrf
    <input type="hidden" name="user_id" value="{{$user_id}}">  
    <input style="width: 69%; margin-top: 60px; padding-left: 1%; height: 40px; font-family: tahoma; border: 1px solid #0a1a2f; border-radius: 2px;" type="password" name="password" placeholder="New Password">
    <br><br>
    <input style="width: 69%; padding-left: 1%; height: 40px; font-family: tahoma; border: 1px solid #0a1a2f; border-radius: 2px;" type="password" name="password_confirmation" placeholder="Confirm Password">
    <br><br>
    <input style="width: 69%; margin-bottom: 30px; height: 40px; font-family: tahoma; font-size: 0.9vw; margin-top: 30px; color:white; background-color: #5369D6; border: none; border-radius: 2px;" type="submit">

</form>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
</div>
</center>




</body>
</html>