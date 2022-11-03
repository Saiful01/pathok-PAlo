<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::orderBy('created_at', 'DESC')->get();
        return view("admin.video.show")->with('result', $videos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.video.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [

            'link' => 'required',

        ]);


        if ($validator->fails()) {
            Alert::error("Error", getErrorMessage("Please Fil the input filed properly", "Please Fil the input filed properly"));
            return back();
        }

        $data = [

            'link' =>getYoutubeVideoId($request['link']) ,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()

        ];
        try {
            Video::create($data);

            Alert::success("Success", "Successfully  Created");

        } catch (\Exception $exception) {

            return $exception->getMessage();
            Alert::error("Error", getErrorMessage($exception->getMessage(), "There is an Error. Try again Later"));
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        $video = Video::where('id', $video->id)->first();

        return view("admin.video.edit")
            ->with('video', $video);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $validator = Validator::make($request->all(), [

            'link' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error("Error", getErrorMessage("Please Fil the input filed properly", "Please Fil the input filed properly"));
            return back();
        }



        $data = [

            'link' =>getYoutubeVideoId($request['link']) ,

        ];
        try {
            Video::where('id', $video->id)->update($data);

            Alert::success("Success", "Successfully  Updated");

        } catch (\Exception $exception) {

            return $exception->getMessage();
            Alert::error("Error", getErrorMessage($exception->getMessage(), "There is an Error. Try again Later"));
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        try {
            Video::where('id', $video->id)->delete();
            Alert::success("Success", "Successfully  Deleted");

        } catch (\Exception $exception) {

            // return $exception->getCode();
            Alert::error("Error", getErrorMessage($exception->getMessage(), "There is an Error. Try again Later"));
        }


        return back();
    }
}
