<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Models;
use App\Models\Clearance;
use Barryvdh\DomPDF\Facade\Pdf;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('role:user|superadministrator');
    }

    public function clearanceForm(){
        return(view('user.clearance-form'));
    }


    public function clearancePost(){
        Clearance::create([
            'user_id' => auth()->id(),
            'admission_year' => request('startyear'),
            'completion_year' => request('endyear'),
            'department' => request('department'),
            'level' => request('level')
        ]);
        return redirect()->back();
    }

    public function getClearance(){
        $detail =  Clearance::whereUserId(auth()->id())->first();
        return view('user.clearance', compact('detail'));
        $pdf = PDF::loadView('user.clearance', compact('detail'));
        return $pdf->download('clearance.pdf');
        
    }

    public function userProfile(){
        return(view('user.user-profile'));
    }

    public function edit(){
        return(view('user.edit'));
    }

    public function update(Request $request){

        // find user profile to update info
        $userProfile = auth()->user();
        $userProfile->update(['name'=>$request->name]);
        $userProfile->update(['email'=>$request->email]);
        $userProfile->update(['regNumber'=>$request->regNumber]);
        $userProfile->update(['IdNumber'=>$request->IdNumber]);
        $userProfile->update(['phoneNumber'=>$request->phoneNumber]);

        return redirect('/user-profile')->with('message', 'Updated!');
    }


    public function notifications(){
        return(view('user.notifications'));
    }

    // function to upload a new image
    public function imageUpload(Request $request){
        // find if the request has a file
        if($request->hasFile('image')){
            $imageName = $request->file('image')->getClientOriginalName();
            // delete an existing profileImage
            $this->deleteOldImage();

            $request->file('image')->storeAs('images', $imageName, 'public');
            auth()->user()->update(['profileImage'=> $imageName]);

            // give success message for the upload
            $request->session()->flash('message', 'Profile Image Uploaded Successfully!');

            return redirect()->back();
        }

        // show message for upload error
        $request->session()->flash('error', 'No profile image selected!');

        return redirect()->back();
    }

    // function to delete an existing image
    protected function deleteOldImage(){
        if(auth()->user()->profileImage){
            Storage::delete('/public/images/'.auth()->user()->profileImage);
        }
    }
}
