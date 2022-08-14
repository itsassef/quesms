<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Validator;
use App\Jobs\SendMessage;
use Carbon\Carbon;

class MessageController extends Controller
{
    public function sendSms(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'numbers' => 'required',
            'message' => 'required'
        ]);
        if ($validator->passes()) {
            $numbers = explode(',', $request->input('numbers'));
            $message = $request->input('message');
            $count = 0;

            foreach ($numbers as $number) {
                $count++;
                dispatch(new SendMessage($message, $number))->delay(Carbon::now()->addSeconds(290));
            }

            return back()->with('success messages sent!');
        } else {
            return back()->withErrors($validator);
        }
    }

    public function getQueue()
    {
        return \Queue::size();
    }
}
