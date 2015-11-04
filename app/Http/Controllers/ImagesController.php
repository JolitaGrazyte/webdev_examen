<?php

namespace App\Http\Controllers;

use App\Image;
use App\Http\Requests\AddImageRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Storage;
use Auth;
use App\Votes;
use App\Libraries\ImageResize;
use Illuminate\Support\Facades\DB;

class ImagesController extends Controller
{
    private $image;


    public function __construct( Image $image ){

        $this->image    = $image;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getImages()
    {

        $images = $this->image->active()->get();

        return view('images.index', compact('images'));
    }

    public function getUpload($user_id = null){

        Session::flash('message', "Upload your photos!");
        Session::flash('alert-class', 'alert-success');

        return view('upload')->withTitle('Upload')->with('user_id', $user_id);
    }

    /**
     * @param AddImageRequest $request
     * @param $user_id
     * @return
     * @internal param $image
     */
    public function postUpload( AddImageRequest $request, $user_id ){

            $image  = $request->file('image');
            $name   = $request->get('name');
            $ip     = $request->getClientIp();

//        dd($ip);
//        $user_id = 1;

        $ip = '125.125.125.266';

            if($image) {

                try {

                    $img_resize = new ImageResize();
                    $imgObj     = $this->image;
                    $img        = $img_resize->addImage($image, $imgObj, $name, $user_id, $ip);

                }
                catch(QueryException $e){

                    redirect()->route('home')->withMessage('There were some problems uploading your image.');
                }

            }


        return redirect()->route('home')->withMessage('Successfully saved!');

    }

    /**
     *
     * Get resized image
     * @param $filename
     * @param $size
     * @return $this
     */
    public function getImage($filename, $size){

        $entry      = $this->image->where('filename', $filename)->firstOrFail();
        $file       = Storage::disk('local')->get($entry->filename);
        $img_resize = new ImageResize();
        $file       = $img_resize->resize_image($filename, $size);

        return (new Response($file, 200))
            ->header('Content-Type', $entry->mime);
    }


}
