<?php
// app/Http/Controllers/API/RegisterController.php
        namespace App\Http\Controllers\API;
 
        use Illuminate\Http\Request;
        use App\Http\Controllers\API\BaseController as BaseController;
        use App\Models\User;
        use Illuminate\Support\Facades\Auth;
        use Illuminate\Support\Str;
        use Validator;
        use Illuminate\Support\Facades\Mail;
        use App\Mail\PasswordReset;

 
        class RegisterController extends BaseController
        {
            /**
            * Register api
            *
            * @return \Illuminate\Http\Response
            */
            public function register(Request $request)
            {
                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'email' => 'required|email',
                    'password' => 'required',
                    'c_password' => 'required|same:password',
                ]);
 
                if($validator->fails()){
                    return $this->sendError('Validation Error.', $validator->errors());       
                }

 
                $input = $request->all();
                $input['password'] = bcrypt($input['password']);
                $user = User::create($input);
                $success['token'] =  $user->createToken('MyApp')->accessToken;
                $success['name'] =  $user->name;
                

 
                return $this->sendResponse($success, 'User register successfully.');
            }
 
            /**
            * Login api
            *
            * @return \Illuminate\Http\Response
            */
            public function login(Request $request) 
            {

                $creds = $request->validate([
                    'email' => 'required|email|string|exists:users,email', 
                    'password' => ['required']
                ]);
                if (!Auth::attempt($creds)) { 
                    return response([ 'message' => 'Provided email or password is incorrect' ], 422); 
                } 
                /** @var \App\Models\User $user */
                $user = Auth::user(); 
                Auth::login($user);
                $token = $user->createToken('main')->plainTextToken; 
                return response(compact('user', 'token'))->header('Authorization', 'Bearer '.$token);

            }


            public function logout(Request $request) 
            {
                $request->user()->tokens()->delete();
                return response()->json(['message' => 'Successfully logged out']);
            }



            #PasswordReset

            public function forgotPassword(Request $request)
            {
                $request->validate([
                    'email' => 'required|email|string|exists:users,email',
                ]);

                $user = User::where('email', $request->email)->first();

                if (!$user) {
                    return response(['message' => 'User with this email not found.'], 404);
                }

                $token = Str::random(60);
                $user->reset_token = $token;
                $user->password_reset_at = now();
                $user->save();

                // send the password reset link to the user
                // ...

                return response(['message' => 'Password reset link sent to your email.']);
            }

            public function resetPassword(Request $request)
            {
                $request->validate([
                    'email' => 'required|email|string|exists:users,email',
                    'token' => 'required',
                    'password' => 'required|confirmed|min:6'
                ]);

                $user = User::where('email', $request->email)->first();

                if (!$user) {
                    return response(['message' => 'User with this email not found.'], 404);
                }

                if (!Hash::check($request->token, $user->password_reset_token)) {
                    return response(['message' => 'Password reset token is invalid.'], 401);
                }

                if (now()->diffInMinutes($user->password_reset_at) > 60) {
                    return response(['message' => 'Password reset token has expired.'], 401);
                }

                $user->password = bcrypt($request->password);
                $user->reset_token = null;
                $user->password_reset_at = null;
                $user->save();

                return response(['message' => 'Password reset successfully.']);
            }

            





}