<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{$data['title']}}</title>
    </head>
    <body>
            <center>
            <p style="font-family: tahoma; color: #1E1E1E; font-size:2vw; font-weight:600;">Password Reset</p>

            <!--<p>{{$data['body']}}</p>-->

            <p style="font-size: 1.6vw; font-weight: 400; color: #1E1E1E;">Hello, </p>
            <p style="font-size:1.2vw; font-weight: 400; width: 45%; color: #1E1E1E;">We are sending u this email beacuse u requested a password reset. Click on the button below to create a new password</p>
            <a style="color: white;" href="{{ $data['url']}}"><button style="margin-top: 1.5%; margin-top: 1.5%; margin-bottom: 3%; border: none; background-color: #3081ED; font-size: 1.1vw; padding: 5px 10px 5px 10px; color: white; border-radius:5px;">Set a new Password</button></a>
            <p style="color: #1E1E1E; ">If this was a mistake, just ignore this message and nothing will happen.</p>
            <h3>Ritwell</h3>
            </center>


    </body>