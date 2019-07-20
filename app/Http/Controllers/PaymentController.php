<?php

namespace App\Http\Controllers;

use App\EventUser;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Larabookir\Gateway\Zarinpal\Zarinpal;

class PaymentController extends Controller
{
    public function request(Request $request)
    {
        $user=\Auth::guard('web')->user();
       // $event_user_id = $request->event_user_id;
        $eventuser=EventUser::find($request->event_user_id);
      try {
            $gateway = \Gateway::make(new Zarinpal());
             $gateway->setCallback(route('user.payment.verify'));
            $gateway
                ->price($eventuser->event->price)
                // setShipmentPrice(10) // optional - just for paypal
                // setProductName("My Product") // optional - just for paypal
                ->ready();

            $refId =  $gateway->refId(); // شماره ارجاع بانک
       // dd($refId);
            $transID = $gateway->transactionId(); // شماره تراکنش

            // در اینجا
            //  شماره تراکنش  بانک را با توجه به نوع ساختار دیتابیس تان
            //  در جداول مورد نیاز و بسته به نیاز سیستم تان
            // ذخیره کنید .
           // dd($gateway);
            $paym=Payment::firstOrCreate(
                ['event_user_id'=>Input::get('event_user_id')],
                [
                    'user_id'=>$user->id,
                    'amount'=>$eventuser->event->price,
                    'type'=>2,
                    'payment_method_id'=>1,
                    'authority'=>Input::get('Authority'),
                    'state'=>'0',

                ]
            );

            $paym->update([
                'authority'=>Input::get('Authority'),
                'user_id'=>$user->id,
                'event_user_id'=>Input::get('event_user_id'),
                'amount'=>$eventuser->event->price,
                'payment_method_id'=>1,
                'type'=>2,
                'refid'=>$refId,
               // 'state'=>'0',
            ]);

            return $gateway->redirect();

        } catch (\Exception $e) {

            return back()->with('failPay',$e->getMessage());
        }
    }

    public function verify(Request $request)
    {
        dd($request->all());
    }
}
