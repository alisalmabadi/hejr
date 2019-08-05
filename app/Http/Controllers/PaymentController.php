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
                ->price((int)$eventuser->event->price.'0')
                ->ready();

            $refId =  $gateway->refId(); // شماره ارجاع بانک
            $transID = $gateway->transactionId(); // شماره تراکنش

            $paym=Payment::firstOrCreate(
                ['event_user_id'=>Input::get('event_user_id')],
                [
                    'user_id'=>$user->id,
                    'amount'=>$eventuser->event->price,
                    'type'=>2,
                    'authority'=>$refId,
                    'transaction_id'=>$transID,
                    'state'=>'0',
                ]
            );

            $paym->update([
                'event_user_id'=>Input::get('event_user_id'),
                'payment_method_id'=>1,
                'type'=>2,
                'refid'=>$refId,
            ]);

            return $gateway->redirect();

        } catch (\Exception $e) {

            return back()->with('failPay',$e->getMessage());
        }
    }

    public function verify(Request $request)
    {
        $status=Input::get('Status');
        try {
            $gateway = \Gateway::verify();
            $trackingCode = $gateway->trackingCode();
            $refId = $gateway->refId();
            $cardNumber = $gateway->cardNumber();
            $paym=Payment::where([['refid','=',$refId],['state','=','0']])->firstOrFail();
            $payment=$paym->update(['state'=>1,'refid'=>$refId,'authority'=>0,'trackingCode',$trackingCode]);
            flashs('تراکنش با موفقیت انجام شد و ثبت نام شما تکمیل شده است.','success');
            return redirect(route('user.events.registered',$paym->event_user_id));
        } catch (\Larabookir\Gateway\Exceptions\RetryException $e) {
            // تراکنش قبلا سمت بانک تاییده شده است و
            // کاربر احتمالا صفحه را مجددا رفرش کرده است
            // لذا تنها فاکتور خرید قبل را مجدد به کاربر نمایش میدهیم
            $paym=Payment::where([['refid','=',Input::get('Authority')],['state','=','0']])->first();
            if(!empty($paym)){
                return redirect(route('user.events.registered',$paym->event_user_id))->with('failPay',$e->getMessage());
            }
            dd($e->getMessage(),$paym,'لطفا دوباره تلاش کنید سپس با پشتیبانی ارتباط برقرار کنید!');
        } catch (\Exception $e) {
            // نمایش خطای بانک
            $paym=Payment::where([['refid','=',Input::get('Authority')],['state','=','0']])->firstOrFail();
            return redirect(route('user.events.registered',$paym->event_user_id))->with('failPay',$e->getMessage());
        }
    }
}
