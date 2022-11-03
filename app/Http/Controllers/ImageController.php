<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $image = Image::orderBy('created_at', 'DESC')->get();
        return view("admin.image.show")->with('result', $image);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.image.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'image' => 'required',
        ]);


        if ($validator->fails()) {
            Alert::error("Error", getErrorMessage("Please Fil the input filed properly", "Please Fil the input filed properly"));
            return back();
        }

        $image_file = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/gallery');
            $image->move($destinationPath, $image_name);
            $image_file = '/uploads/gallery/' . $image_name;
        }

        $data = [
            'featured_image' => $image_file,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        try {
            Image::create($data);

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
     * @param \App\Models\Image $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Image $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {

        $image = Image::where('id', $image->id)->first();
        return view("admin.image.edit")
            ->with('image', $image);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Image $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required',
        ]);


        if ($validator->fails()) {
            Alert::error("Error", getErrorMessage("Please Fil the input filed properly", "Please Fil the input filed properly"));
            return back();
        }

        $image_file = $image->featured_image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/gallery');
            $image->move($destinationPath, $image_name);
            $image_file = '/uploads/gallery/' . $image_name;
        }


        $data = [

            'featured_image' => $image_file,
        ];
        try {
            Image::where('id', $image->id)->update($data);

            Alert::success("Success", "Successfully Post Updated");

        } catch (\Exception $exception) {

            return $exception->getMessage();
            Alert::error("Error", getErrorMessage($exception->getMessage(), "There is an Error. Try again Later"));
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Image $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Image $image)
    {



        try {
            Image::where('id', $request['id'])->delete();
            Alert::success("Success", "Successfully  Deleted");

        } catch (\Exception $exception) {

            // return $exception->getCode();
            Alert::error("Error", getErrorMessage($exception->getMessage(), "There is an Error. Try again Later"));
        }


        return back();
    }
}
