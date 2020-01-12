<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Profile;
use App\User;
use Auth;
use Session;
use Spatie\Permission\Models\Role;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{

    public function index()
    {
        return view('pages.users.index');
    }

    public function getData()
    {
        $model = User::advancedFilter();

        return response()
            ->json([
                'collection' => $model,
                'items_count' => $model->count()
            ]);
    }

    /**
     * Export to excel
     */
    public function exportExcel()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    /**
     * Export to csv
     */
    public function exportCSV()
    {
        return Excel::download(new UsersExport, 'users.csv');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('pages.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name'     => $request->get('name'),
            'email'    => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        $user->assignRole($request->input('roles'));

        Profile::create([
            'user_id'  =>      $user->id,
        ]);

        notify()->success('User successfully created!');

        return redirect()
            ->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('pages.users.profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
