<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Models\GuestCoupon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Browsershot\Browsershot;

class ExcelController extends Controller
{
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function import()
    {


        /*$data = Excel::toArray(new UsersImport, 'chorki1.xlsx');
        $i = 0;
        $counter = 0;
        foreach ($data[0] as $item) {
            if ($i != 0) {
                if ($item[0] != null) {

                    $array = [
                        'chorki_coupon' => $item[0],
                    ];
                    try {
                        GuestCoupon::create($array);
                        $counter++;
                    } catch (\Exception $exception) {
                        //return $exception->getMessage();
                    }
                } else {
                    continue;
                }
            }
            $i++;
        }
        return "ok" . $counter;*/


        /* For Prothom Alo*/
        //$data = Excel::toArray(new UsersImport, 'chorki1.xlsx');
        $data = Excel::toArray(new UsersImport, 'palo2.csv');
        $i = 0;
        $counter = 0;
        foreach ($data[0] as $item) {
            if ($i != 0) {
                $is_exist = GuestCoupon::whereNull("prothomalo_coupon")->first();
                if (is_null($is_exist)) {
                    continue;
                }
                if ($item[0] != null) {

                    $array = [
                        'prothomalo_coupon' => $item[0],
                    ];
                    try {
                        GuestCoupon::where("id", $is_exist->id)->update($array);
                        $counter++;
                    } catch (\Exception $exception) {
                       // return $exception->getMessage();
                    }
                } else {
                    continue;
                }


            }
            $i++;
        }


        return 'All good!'. $counter;

        //return view('mail');
    }

    public function importSave(Request $request)
    {

        // return $request->all();
        if ($request->hasFile('file')) {


            $path = $request->file('file')->getRealPath();

            return $data = Excel::toArray($path)->get();


            $path = $request->file('file')->getRealPath();
            $data = Excel::import([], $path);

            $i = 0;
            foreach ($data[0] as $item) {

                if ($i != 0) {
                    return $item[1];


                    $data = [
                        'institute_id' => "",
                        'subject_id' => "",
                        'program_level_id' => $item[1],
                        'application_fee' => "",
                        'admission_info' => "",
                        'application_qualification' => "",
                        'tuition_fee' => "",
                        'duration' => "",

                    ];
                }


                $i++;
                //return $item;
            }
        }


    }

    public function htmlToImage()
    {

        Browsershot::url('https://google.com')
            ->setOption('landscape', true)
            ->windowSize(3840, 2160)
            ->waitUntilNetworkIdle()
            ->save("storage/" . 'googlescreenshot.jpg');


    }

    public function ticket()
    {

        return view("common.profile.ticket");


    }

}
