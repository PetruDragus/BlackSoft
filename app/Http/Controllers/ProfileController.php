<?php

namespace App\Http\Controllers;

use App\Profile;
use Auth;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, $id)
    {
        $profile = Profile::where('user_id', '=', Auth::user()->id)->findOrFail($id);

        return view('pages.users.profile', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::findOrFail($id);

        return view('pages.users.profile', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $profile = Profile::find($id);

        if(!empty($request->has('avatar'))) {
            $cover = $request->file('avatar');
            $extension = $cover->getClientOriginalExtension();
            Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
        }

        $profile->name      = $request->get('name');
        $profile->city      = $request->get('city');
        $profile->address   = $request->get('address');
        $profile->email     = $request->get('email');
        $profile->phone     = $request->get('phone');
        $profile->country   = $request->get('country');

        if(!empty($request->has('avatar'))) {
            $profile->mime = $cover->getClientMimeType();
            $profile->original_filename = $cover->getClientOriginalName();
            $profile->filename = $cover->getFilename().'.'.$extension;
        }

        $profile->save();

        return redirect()
            ->back()
            ->with('success', 'Profile edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
