<?php



use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WebhookController;

use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Artisan;

/*

|--------------------------------------------------------------------------

| Web Routes

|--------------------------------------------------------------------------

|

| Here is where you can register web routes for your application. These

| routes are loaded by the RouteServiceProvider within a group which

| contains the "web" middleware group. Now create something great!

|

*/



Route::get('/', function () {

    return view('welcome');
});

//Route::post('/webhook', 'WebhookController@handle');

//Route::post('/webhook', [WebhookController::class, 'handle']);

Route::post('/webhooks/github', function () {

    // Code to handle webhook request and pull changes from Github

    //$output = shell_exec('cd /var/www/Ritwell-App && git pull');

    //Log::info("Git pull output: \n" . $output);
    ;

    exec('cd /var/www/Ritwell-App && git pull ', $output, $return_var);



    if ($return_var !== 0) {

        Log::error("Git pull failed with return code: " . $return_var);
    } else {

        Log::info("Git pull output: \n" . implode("\n", $output));

        Artisan::call('optimize');
    }
});

Route::get('/reset-Password', [RegisterController::class, 'resetPasswordLoad']);
Route::post('/reset-Password', [RegisterController::class, 'resetPassword']);
