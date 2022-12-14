<?php

namespace App\Http\Controllers;

use App\Models\EventGuest;
use App\Models\Guest;
use App\Models\GuestCoupon;
use App\Models\Image;
use App\Models\Post;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function home()
    {
        $page_title = "Pathok Somabesh";
        return view("common.home.index")->with("page_title", $page_title);
    }

    public function getTicket()
    {
        $page_title = "Pathok Somabesh";
        return view("common.ticket.index")->with("page_title", $page_title);
    }

    public function success($qr_code)
    {

        $event_guest = EventGuest::leftJoin("guests", "guests.id", "=", "event_guests.guest_id")->where('qr_code', $qr_code)->first();
        if (is_null($event_guest)) {
            return Redirect::to("/");
        }

        return view("common.ticket.success")
            ->with("qr_code", $qr_code)
            ->with("guest", $event_guest);
    }

    public function profile($qr_code)
    {


        $event_guest = EventGuest::where('qr_code', $qr_code)
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
        if (is_null($event_guest)) {
            return Redirect::to("/");
        }

         $coupon = GuestCoupon::where('guest_id', $event_guest->guest_id)->first();
        if(is_null($coupon)){
            $prothomalo_coupon = "";
            $chorki_coupon = "";
        }else{
            $prothomalo_coupon = $coupon->chorki_coupon;
            $chorki_coupon = $coupon->prothomalo_coupon;
        }



        $videos = Video::orderBy("created_at", "DESC")->get();
        $images = Image::orderBy('created_at', "DESC")->get();
        $posts = Post::orderBy('created_at', "DESC")->get();
        return view("common.profile.index")
            ->with("qr_code", $qr_code)
            ->with("guest", $event_guest)
            ->with("prothomalo_coupon", $prothomalo_coupon)
            ->with("chorki_coupon", $chorki_coupon)
            ->with("videos", $videos)
            ->with("images", $images)
            ->with("posts", $posts);
    }

    public function download()
    {
        return view("common.ticket.download");
    }

    public function ticketDownload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error("Error", getErrorMessage("Please Fil the input filed properly", "Please Fil the input filed properly"));
            return back();
        }

        $is_valid = validatePhoneNumber($request['phone_number']);
        if ($is_valid != 1) {
            Alert::error("Error", getErrorMessage("????????? ??????????????????????????? ???????????? ?????? ", "Phone number is not valid."));
            return back();
        }

        $is_exist = Guest::where('phone_number', $request['phone_number'])->first();
        if (is_null($is_exist)) {
            Alert::error("Error", getErrorMessage("?????? ????????? ????????????????????? ???????????????????????? ????????????", "?????? ????????? ????????????????????? ???????????????????????? ????????????"));
            return back();
        }

        $is_exist = EventGuest::where('event_id', 1)
            ->where('guest_id', $is_exist->id)
            ->first();

        if (is_null($is_exist)) {
            Alert::error("Error", getErrorMessage("?????? ????????? ????????????????????? ???????????????????????? ????????????", "?????? ????????? ????????????????????? ???????????????????????? ????????????"));
            return back();

        } else {
            $qr_code = $is_exist->qr_code;
            return Redirect::to("/success/" . $qr_code);
        }


    }

    public function ticketSave(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone_number' => 'required',
            'gender' => 'required',
            'age' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error("Error", getErrorMessage("????????? ???????????? ???????????????????????? ???????????? ????????? ???????????? ?????????????????? ??????????????? ", "????????? ???????????? ???????????????????????? ???????????? ????????? ???????????? ?????????????????? ??????????????? "));
            return back()->withInput($request->input());
        }

        $is_valid = validatePhoneNumber($request['phone_number']);
        if ($is_valid != 1) {
            Alert::error("Error", getErrorMessage("????????? ??????????????????????????? ???????????? ?????? ", "Phone number is not valid."));
            return back()->withInput($request->input());
        }

        $is_exist = Guest::where('phone_number', $request['phone_number'])->first();
        if (!is_null($is_exist)) {
            $guest_id = $is_exist->id;
        } else {
            $request['created_at'] = Carbon::now();
            $request['updated_at'] = Carbon::now();

            $guest_id = Guest::insertGetId(
                [
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'phone_number' => $request['phone_number'],
                    'age' => $request['age'],
                    'gender' => $request['gender'],
                    'category_id' => 2,
                ]
            );
        }
        //return $guest_id;

        $is_exist = EventGuest::where('event_id', 1)
            ->where('guest_id', $guest_id)
            ->first();
        $qr_code = uniqid();
        if (is_null($is_exist)) {
            try {
                EventGuest::create([
                    'event_id' => 1,
                    'guest_id' => $guest_id,
                    'qr_code' => $qr_code,
                ]);
                //Alert::success("Success", "??????????????? ??????????????? ??????????????? ????????? ???????????????");
                smsSendOld($request['phone_number'], $request['name']);


            } catch (\Exception $exception) {
                Alert::error("Error", getErrorMessage($exception->getMessage(), "There is an Error. Try again Later"));
            }
        } else {
            //Alert::success("Success", "??????????????? ??????????????? ???????????? ??????????????? ????????? ???????????????");
            $qr_code = $is_exist->qr_code;
        }

        return Redirect::to("/success/" . $qr_code);
    }

    public function profileDetails($id)
    {
        $is_exist = EventGuest::with("guest")->where('qr_code', $id)->first();
        if (is_null($is_exist)) {
            Alert::error("Error", "There is an Error");
            return Redirect::to("/");
        }

        $page_title = "Invitation for  " . $is_exist['guest']->name;
        return view("common.profile.index")
            ->with("profile", $is_exist)
            ->with("page_title", $page_title);
    }

    public function profileDetailsName($id, $name)
    {
        $is_exist = EventGuest::with("guest")->where('id', $id)->first();
        if (is_null($is_exist)) {
            Alert::error("Error", "There is an Error");
            return Redirect::to("/");
        }

        $page_title = "Invitation for  " . $is_exist['guest']->name;
        return view("common.profile.index")
            ->with("profile", $is_exist)
            ->with("page_title", $page_title);
    }

    public function profileUpdate(Request $request)
    {
        //return $request->all();
        $image_file = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/guests');
            $image->move($destinationPath, $image_name);
            $image_file = '/uploads/guests/' . $image_name;
        }

        try {
            Guest::where('id', $request['id'])->update([
                'picture' => $image_file
            ]);

            Alert::success("Success", "Successfully Profile picture updated");
        } catch (\Exception $exception) {

        }

        return back();
    }

    public function confirm($id)
    {
        EventGuest::where('qr_code', $id)->update([
            'status' => 1
        ]);

        Alert::success("Success", "Your space is confirmed");
        return Redirect::to("/profile/" . $id);

    }

    public function postDetails($id)
    {

        $result = Post::where('id', $id)->first();
        return view("test")->with("result", $result);
    }

    public function mail()
    {

        /*$data = array(
            'invoice' => uniqid(),
            'full_name' => "Motiur Rahaman",
            'phone_number' => "017178499658",
            'ticket_image' => "/ticket/cooper-jensen.jpeg",
            'date' => Carbon::now(),
            'url' => \url("/"),
        );
        $admin_email = "memotiur@gmail.com";

        try {
            Mail::send('email-template/confirm', $data, function ($message) use ($admin_email) {
                $message->to($admin_email)
                    ->subject('Mail from CEO');
                $message->from('motiur@gmail.com', 'Motiur Rahaman would like to be your friend on e-Verify');
            });
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }*/


        $data = array(
            'invoice' => uniqid(),
            'full_name' => "Motiur Rahaman",
            'phone_number' => "017178499658",
            /*'ticket_image' => "/ticket/635791bf5feb1.jpeg",*/
            'date' => Carbon::now(),
            'url' => \url("/"),
        );
        $admin_email = "memotiur@gmail.com";

        try {
            Mail::send('email-template/confirm', $data, function ($message) use ($admin_email) {
                $message->to($admin_email)
                    ->subject('???????????? ???????????? ???????????????');
                $message->from('motiur@gmail.com', '???????????? ???????????? ');

                $message->attach(public_path() . "/ticket/6357ffc4a07d8.jpeg");

            });
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }


        return "mail";
    }

    public function test()
    {

        return paloMessage("01717849968", "Test Message");


        return sendSms("01717849968", "???????????? ??????????????? ?????????????????? ?????????????????????");


        $url = $url = URL::to('/');
        $name = "Motiur Rahaman";
        $phone_number = "01717849968";

        $message = "???????????????" . $name . ", ???????????? ??????????????? ?????????????????? ????????????????????? ??????????????? ??????????????? ???????????? ??????????????? ????????????:" . $url;
        $message = "Test";
        $user = "PROTHOMALOOTP";
        $pass = "69A966o>";
        $sid = "PROTHOMALOOTPBNG";
        $sms_url = 'http://sms.sslwireless.com/pushapi/dynamic/server.php';


        /* return [
             'user' => $user,
             'pass' => $pass,
             'sms[0][0]' => $phone_number,
             'sms[0][1]' => urlencode($message),
             'sms[0][2]' => rand(1, 7885222),
             'sid' => $sid,
         ];*/


        try {
            return $response = Http::post($sms_url, [
                'user' => $user,
                'pass' => $pass,
                'sms[0][0]' => $phone_number,
                'sms[0][1]' => urlencode($message),
                'sms[0][2]' => rand(1, 7885222),
                'sid' => $sid,
            ]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

        /* $param= user=$user
             &pass=$pass
             &sms[0][0]=$phonenum
                 &sms[0][1]=urlencode($content)
                     &sms[0][2]=$refere_id
                     &sid=$sid*/


        return view("test");
    }

    public function qrCodeGenerate($qr_code)
    {
        return view("qr_code")->with("qr_code", $qr_code);
    }

    public function saveCapture(Request $request)
    {
        //return $request->all();

        // Get the incoming image data
        $image = $request["image"];

// Remove image/jpeg from left side of image data
// and get the remaining part
        $image = explode(";", $image)[1];

// Remove base64 from left side of image data
// and get the remaining part
        $image = explode(",", $image)[1];

// Replace all spaces with plus sign (helpful for larger images)
        $image = str_replace(" ", "+", $image);

// Convert back from base64
        $image = base64_decode($image);

// Save the image as filename.jpeg

        $image_name = $request['qr_code'];
        file_put_contents("ticket/" . $image_name . ".jpeg", $image);

        try {
            EventGuest::where('qr_code', $request['qr_code'])->update([
                'ticket' => "ticket/" . $image_name . ".jpeg"
            ]);
        } catch (\Exception $exception) {
            echo "Error2";
        }
        //$this->sendTicket($request['qr_code']);
        echo "Done" . $request['qr_code'];


    }

    public function sendTicket(Request $request)
    {
        $qr_code = $request['qr_code'];
        $is_exist = Guest::leftJoin('event_guests', 'event_guests.guest_id', '=', 'guests.id')->where('qr_code', $qr_code)->first();
        if (is_null($is_exist)) {
            return "Null";
        }


        $data = array(
            'invoice' => uniqid(),
            'full_name' => "Motiur Rahaman",
            'phone_number' => "017178499658",
            /*'ticket_image' => "/ticket/635791bf5feb1.jpeg",*/
            'date' => Carbon::now(),
            'url' => \url("/"),
        );
        $visitor_email = $is_exist->email;
        $ticket = public_path() . '/' . $is_exist->ticket;

        try {
            Mail::send('email-template/confirm', $data, function ($message) use ($ticket, $visitor_email) {
                $message->to($visitor_email)
                    ->subject('???????????? ???????????? ???????????????');
                $message->from('pathok.utsob@gmail.com', '???????????? ???????????? ');

                $message->attach($ticket);

            });
            return 1;
        } catch (\Exception $exception) {
            echo "Error1" . $exception->getMessage();
        }
    }
}
