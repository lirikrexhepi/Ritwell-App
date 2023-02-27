<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;



class WebhookController extends Controller

{

    public function __construct()

    {

        $this->middleware('web')->except(['webhook']);

        $this->middleware('verified')->only(['webhook']);
    }



    public function handle(Request $request)

    {

        $payload = json_decode($request->getContent());



        // Only process push events

        if ($payload->event_name === 'push') {

            $output = shell_exec('cd /var/www/Ritwell-App && git pull origin master 2>&1');

            Log::info("Git pull output: \n" . $output);
        }



        return response('', 204);
    }
}
