<?php

namespace App\Http\Controllers;

use App\Models\EventGuest;
use App\Models\GuestCoupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;

class ApiController extends Controller
{

    public function getCheckinStatus(Request $request)
    {

        $is_exist = EventGuest::where('qr_code', $request['qr_code'])
            ->leftJoin("guests", 'guests.id', "=", "event_guests.guest_id")
            ->select(
                'event_guests.*',
                'guests.picture',
                'guests.name',
                'guests.address',
                'guests.email',
                'guests.phone_number',
                'guests.id as guest_id',
            )->first();
        if (is_null($is_exist)) {

            $qr_code = $request['qr_code'];
            $qr_list = array('11', '22', '33');
            if (in_array($qr_code, $qr_list)) {
                return "Exist";
            }

            return [
                'status_code' => 201,
                'message' => "Invalid invitation",
                'guest' => $request->all(),
            ];
        } else {


            if ($is_exist->checkin_status == true) {
                EventGuest::where('qr_code', $request['qr_code'])->update([
                    'checkin_count' => $is_exist->checkin_count + 1,
                ]);
                return [
                    'status_code' => 200,
                    'message' => "Already Checked in",
                    'guest' => $is_exist,
                ];
            } else {
                EventGuest::where('qr_code', $request['qr_code'])->update([
                    'checkin_status' => true,
                    'checkin_count' => 1,
                ]);
                $phone_number = $is_exist->phone_number;
                $name = $is_exist->name;

                $url = URL::to('/') . "/profile/" . $is_exist->qr_code;
                $message = "প্রিয় " . $name . ", পাঠক উৎসবে আপনাকে স্বাগত। আপনার উপহার পেতে ক্লিক করুন: " . $url;
                //sendSms($phone_number, $message);
                paloMessage($phone_number, $message);
                //Insert Coupon
                try {
                    $guest_coupon = GuestCoupon::whereNull("guest_id")->orderBy("created_at", "DESC")->first();
                    GuestCoupon::where("id", $guest_coupon->id)->update([
                        'guest_id' => $is_exist->guest_id,
                        'is_used' => true,
                    ]);
                } catch (\Exception $exception) {
                    return $exception->getMessage();
                }

                return [
                    'status_code' => 200,
                    'message' => "Successfully Checked in",
                    'guest' => $is_exist
                ];
            }

        }
    }


    public function guestList(Request $request)
    {
        $query = EventGuest::leftJoin("events", 'events.id', "=", "event_guests.event_id")
            ->leftJoin("guests", 'guests.id', "=", "event_guests.guest_id");
        if ($request['query'] != null) {
            $query->where("guests.phone_number", "LIKE", "%" . $request['query'] . "%")
                ->orWhere("guests.name", "LIKE", "%" . $request['query'] . "%");
        }
        $result = $query->select(

            'event_guests.event_id',
            'event_guests.guest_id',
            'event_guests.ticket',
            'event_guests.mail_sent',
            'event_guests.status',
            'event_guests.checkin_status',
            'event_guests.checkin_count',
            'guests.picture',
            'guests.name',
            'guests.address',
            'guests.email',
            'guests.phone_number',
            'guests.id as guest_id',
            'events.title',
        )->get();

        return [
            'status_code' => 200,
            'message' => "Successfully Data Retrieved",
            'guest_list' => $result
        ];
    }


    public function smsSend2($phone_number, $name, $url)
    {

        $sms = "প্রিয়" . $name . ", পাঠক উৎসবে আপনাকে স্বাগত। আপনার উপহার পেতে ক্লিক করুন:" . $url;
        try {

            $sms_url = 'https://smsc.ekshop.gov.bd/externalApi?passkey=aswdfawkejfhwekjhr329923875492&smsText=' . $sms . '&client=future_track&number=' . $phone_number;
            return $response = Http::post($sms_url, []);

        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    /* public function smsSend($phone_number, $name, $url)
     {

         $message = "প্রিয়" . $name . ", পাঠক উৎসবে আপনাকে স্বাগত। আপনার উপহার পেতে ক্লিক করুন:" . $url;
         $user = "PROTHOMALOOTP";
         $pass = "69A966o>";
         $sid = "PROTHOMALOOTPBNG";
         $sms_url = 'http://sms.sslwireless.com/pushapi/dynamic/server.php';
         try {
             return $response = Http::post($sms_url, [
                 'user' => 'i40exusu-ffpzd2bs-6fr7ium3-ksoow1r4-v9g4w0mu',
                 'pass' => 'PROTHOMALOOTP',
                 'sms[0][0]' => $phone_number,
                 'sms[0][1]' => urlencode($message),
                 'sms[0][2]' => rand(1, 7885222),
                 'sid' => $sid,
             ]);
         } catch (\Exception $exception) {
             return $exception->getMessage();
         }
     }*/


}
