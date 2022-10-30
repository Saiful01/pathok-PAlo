<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
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

        $rows = Excel::toArray(new UsersImport, 'users.xlsx');
        return response()->json(["rows" => $rows]);

        return $rows = Excel::toArray(new UsersImport, 'users.xlsx');
        //return $rows = Excel::toArray(new UsersImport, $request->file('sampledata'));


        return Excel::import(new UsersImport, 'users.xlsx');

        return 'All good!';

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
