<?php

namespace App\Http\Controllers;

use App\Models\EventGuest;
use Illuminate\Http\Request;

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
                smsSend($phone_number, $name);
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


}
