<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\AuthorizesUsers;
use App\Photo;
use App\Flyer;
use App\AddPhotoToFlyer;

class PhotosController extends Controller
{
    
    use AuthorizesUsers;
    
    public function store(Request $request, $zip, $street) {
        
        $this->validate($request, [
           'photo' => 'required|mimes:jpg,jpeg,png, bmp' 
        ]);
        
        if (!$this->userCreatedFlyer($request)) {
            
            return $this->unauthorized($request);
            
        }
        
        $flyer = Flyer::locatedAt($zip,$street);
        
        $photo = $request->file('photo');
        
        (new AddPhotoToFlyer($flyer, $photo))->save();
        
    }
    
    public function destroy($id) {
       $photo = Photo::findOrFail($id)->delete();
       
       return back();
    }
}
