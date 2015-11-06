<?php

namespace App\Http\Controllers;

use App\Image;
use App\Http\Requests\AddImageRequest;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Storage;
use Auth;
use App\Libraries\ImageResize;
use Illuminate\Support\Facades\Mail;

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

        $images = $this->image->active()->latest('created_at')->get();

        return view('images.index', compact('images'));
    }

    public function getUpload($user_id = null){

        Session::flash('message', "Upload your photo!");
        Session::flash('alert-class', 'alert-success');

        return view('upload')->withTitle('Upload')->with('user_id', $user_id);
    }

    /**
     * @param AddImageRequest $request
     * @param $user_id
     * @return \Illuminate\Http\RedirectResponse
     * @internal param $image
     */
    public function postUpload( AddImageRequest $request, $user_id ){

            $image  = $request->file('image');
            $name   = $request->get('name');
            $ip     = $request->getClientIp();
            $user   = User::find($user_id);

//            $ip = '125.125.125.266'; // for testing

            if($image) {

                try {

                    $img_resize = new ImageResize();
                    $imgObj     = $this->image;
                    $img        = $img_resize->addImage($image, $imgObj, $name, $user_id, $ip);

                    Session::flash('message', "Your image has been  uploaded successfully.  We wish you loads of success!");
                    Session::flash('alert-class', 'alert-success');

                    Mail::send('emails.upload-note', ['user' => $user], function ($m) use ($user) {


                        $m->from('gogglesl@zealoptics.com', 'Zeal Optics')->to($user->email, $user->username)->subject('Ski Goggles Game Upload!');


                    });

                }
                catch(QueryException $e){

                    if (strpos($e->getMessage(),'Duplicate') !== false) {

                        Session::flash('message', "No cheating bro!! You're disqualified now!! ");
                        Session::flash('alert-class', 'error');
                    }

//                    dd(strpos($e->getMessage(),'Duplicate'));

                }

            }


        return redirect()->route('home');

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
        $file       = Storage::disk('local')->get('/uploads/'.$entry->filename);
        $img_resize = new ImageResize();
        $file       = $img_resize->resize_image($filename, $size);

        return (new Response($file, 200))
            ->header('Content-Type', $entry->mime);
    }


}
