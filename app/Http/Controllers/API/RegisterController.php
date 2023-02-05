<?php
// app/Http/Controllers/API/RegisterController.php
        namespace App\Http\Controllers\API;
 
        use Illuminate\Http\Request;
        use App\Http\Controllers\API\BaseController as BaseController;
        use App\Models\User;
        use Illuminate\Support\Facades\Auth;
        use Illuminate\Support\Str;
        use Validator;
        use App\Models\PasswordReset;
        use Illuminate\Support\Facades\Mail;
        use Illuminate\Support\Facades\URL;        
        use App\Http\Controllers\API\forgetPasswordMail;        
        use Carbon\Carbon;
        use Illuminate\Support\Facades\Hash;      




 
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

            public function forgotPassword(Request $request){
                try{

                    $user = User::where('email', $request->email)->get();
                     if(count($user)>0){

                        $token = Str::random(40);
                        $domain = URL::to('/');
                        $url = $domain.'/reset-Password?token='.$token;

                        $data['url'] = $url;
                        $data['email'] = $request->email;
                        $data['title'] = "Password Reset";
                        $data['body'] = "Please click the link below to reset ur password";


                        Mail::send('forgetPasswordMail',['data'=>$data], function($message) use ($data){
                            $message->to($data['email'])->subject($data['title']);                            
                        });

                        $datetime = Carbon::now()->format('Y-m-d H:i:s');
                        PasswordReset::updateOrCreate(
                            ['email' => $request->email],
                            [
                                'email' => $request->email,
                                'token' => $token,
                                'created_at' => $datetime
                            ]
                            );
                            return response()->json(['success'=>true, 'msg'=>'Password Reset Sent']);
                     }else{
                        return response()->json(['success'=>false, 'msg'=>'User not Found']);
                     }
                }catch(\Exception $e){
                    return response()->json(['success'=>false, 'msg'=>$e->getMessage()]);
                }
            }


            public function resetPasswordLoad(Request $request)
            {
                $resetData = PasswordReset::where('token', $request->token)->first();
                //  dd($resetData);
              
                if ($resetData) {
                    $user = User::where('email', $resetData->email)->first();
                    
                    if ($user) {
                        return view('resetPassword', ['user' => $user, 'user_id' => $user->id]);
                    }
                }
                return response()->json(['success' => false, 'msg' => 'error404']);
            }
            

            
            public function resetPassword(Request $request)
            {
                $request->validate([
                    'password' => 'required|string|min:6|confirmed',
                    'user_id' => 'required|integer'
                ]);

                $user = User::find($request->user_id);
                if ($user) {
                    $user->password = Hash::make($request->password);
                    $user->save();
                    PasswordReset::where('email', $user->email)->delete();
                    return "<h1>Password reset successfully</h1>";
                } else {
                    return "<h1>Error: User not found</h1>";
                }
            }


  


}