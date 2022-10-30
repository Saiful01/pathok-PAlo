<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use App\Models\Event;
use App\Models\EventGuest;
use App\Models\EventGuestCategory;
use App\Models\Guest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class EventGuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //$query = EventGuest::with("event", "guest", 'guestCategory')->orderBy('created_at', 'DESC');
        $query = EventGuest::leftJoin("events", 'events.id', "=", "event_guests.event_id")
            ->leftJoin("guests", 'guests.id', "=", "event_guests.guest_id");

        if ($request['query'] != null) {
            $query->where("guests.phone_number", "LIKE", "%" . $request['query'] . "%")
                ->orWhere("guests.name", "LIKE", "%" . $request['query'] . "%");
        }
        if ($request['category'] != null) {
            $query->where("guests.category_id", $request['category']);
        }
        if ($request['gender'] != null) {
            $query->where("guests.gender", $request['gender']);
        }
        $result = $query->select(
            'event_guests.*',
            'guests.picture',
            'guests.name',
            'guests.gender',
            'guests.address',
            'guests.email',
            'guests.phone_number',
            'guests.id as guest_id',
            'events.title',
        )->paginate(25);
        $categories = EventGuestCategory::get();
        $events = Event::get();


        return view("admin.event-guest.show")
            ->with('result', $result)
            ->with('categories', $categories)
            ->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'event_id' => 'required',
            'category_id' => 'required',
            /* 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',*/
        ]);

        // return $request->all();

        if ($validator->fails()) {
            Alert::error("Error", getErrorMessage("Please Fil the input filed properly", "Please Fil the input filed properly"));
            return back();
        }

        $image_file = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/guests');
            $image->move($destinationPath, $image_name);
            $image_file = '/uploads/guests/' . $image_name;
        }
        $request->request->add(['picture' => $image_file]);

        $is_exist = Guest::where('phone_number', $request['phone_number'])->first();
        if (!is_null($is_exist)) {
            $guest_id = $is_exist->id;
        } else {
            $request['created_at'] = Carbon::now();
            $request['updated_at'] = Carbon::now();

            $request->except(['_token', '_method', 'event_id', 'image']);
            $guest_id = Guest::insertGetId($request->except(['_token', '_method', 'event_id', 'image']));
        }
        //return $guest_id;

        $is_exist = EventGuest::where('event_id', 1)
            ->where('guest_id', $guest_id)
            ->first();


        if (is_null($is_exist)) {
            try {
                EventGuest::create([
                    'event_id' => $request['event_id'],
                    'guest_id' => $guest_id,
                    'qr_code' => uniqid(),
                ]);
                Alert::success("Success", "Successfully Guest Created");
            } catch (\Exception $exception) {
                Alert::error("Error", getErrorMessage($exception->getMessage(), "There is an Error. Try again Later"));
            }
        } else {
            Alert::error("Error", "Phone no Already Added");
        }

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\EventGuest $eventGuest
     * @return \Illuminate\Http\Response
     */
    public function show(EventGuest $eventGuest)
    {
        $guest = Guest::where('id', $eventGuest->guest_id)->first();
        $is_exist = Guest::leftJoin('event_guests', 'event_guests.guest_id', '=', 'guests.id')->where('guests.id', $eventGuest->guest_id)->first();
        if (is_null($is_exist)) {
            return back();
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
                    ->subject('পাঠক উৎসব টিকেট');
                $message->from('motiur@gmail.com', 'পাঠক উৎসব ');

                $message->attach($ticket);

            });

        } catch (\Exception $exception) {
            echo "Error1" . $exception->getMessage();
        }

        EventGuest::where('guest_id', $eventGuest->guest_id)->update([
            'mail_sent' => true
        ]);

        Alert::success("Success", "Successfully Done");
        return back();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\EventGuest $eventGuest
     * @return \Illuminate\Http\Response
     */
    public
    function edit(EventGuest $eventGuest)
    {
        return "Edit";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EventGuest $eventGuest
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, EventGuest $eventGuest)
    {


        $validator = Validator::make($request->all(), [
            'event_id' => 'required',
            /* 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',*/
        ]);


        if ($validator->fails()) {
            Alert::error("Error", getErrorMessage("Please Fil the input filed properly", "Please Fil the input filed properly"));
            return back();
        }


        $image_file = $request['picture'];
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/guests');
            $image->move($destinationPath, $image_name);
            $image_file = '/uploads/guests/' . $image_name;
        }
        $request->request->add(['picture' => $image_file]);

        try {
            Guest::where('id', $eventGuest->guest_id)->update($request->except(['_token', '_method', 'event_id', 'image', 'status', 'qr_code']));

            EventGuest::where('id', $eventGuest->id)->update([
                'status' => $request['status'],
                'qr_code' => $request['qr_code'],
            ]);

            Alert::success("Success", "Successfully Guest Updated");
        } catch (\Exception $exception) {
            Alert::error("Error", getErrorMessage($exception->getMessage(), "There is an Error. Try again Later"));
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\EventGuest $eventGuest
     * @return \Illuminate\Http\Response
     */
    public
    function destroy(EventGuest $eventGuest)
    {
        try {
            EventGuest::where('id', $eventGuest->id)->delete();
            Alert::success("Success", "Successfully Deleted");

        } catch (\Exception $exception) {

            Alert::error("Error", getErrorMessage($exception->getMessage(), "There is an Error. Try again Later"));
        }

        return back();
    }

    public
    function import(Request $request)
    {

        //return $request->all();
        if ($request->hasFile('excel')) {

            $path = $request->file('excel')->getRealPath();

            $rows = Excel::toArray(new UsersImport, $path);
            $i = 1;
            foreach ($rows[0] as $row) {
                if ($i != 1) {


                    $is_exist = Guest::where('phone_number', $row[1])->first();
                    if (is_null($is_exist)) {
                        $id = Guest::insertGetId([
                            'category_id' => 1,
                            'name' => $row[0],
                            'phone_number' => $row[1],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ]);
                    } else {
                        $id = $is_exist->id;
                    }

                    $is_exist = EventGuest::where('event_id', 1)
                        ->where('guest_id', $id)
                        ->first();
                    if (is_null($is_exist)) {
                        EventGuest::create([
                            'event_id' => 1,
                            'guest_id' => $id,
                            'qr_code' => uniqid(),
                        ]);
                    }

                }
                $i++;
            }

            Alert::success("Success", "Successfully Created");
        }
        return back();
    }

    public
    function ticket($qr_code)
    {
        $guest = EventGuest::where('qr_code', $qr_code)
            ->leftJoin("guests", "guests.id", "=", "event_guests.guest_id")
            ->first();
        if (is_null($guest)) {
            return Redirect::to("/event-guests");
        }
        if ($guest->picture == null) {
            $guest->picture = "/uploads/blank_profile.png";
        }

        return view("admin.event-guest.event-ticket")
            ->with("guest", $guest)
            ->with("qr_code", $qr_code);

    }


}
