<?php

namespace App\Http\Controllers\API;

use App\ContactForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = ContactForm::searchPaginateAndOrder();
        $columns = ContactForm::$columns;

        return response()
            ->json([
                'model' => $model,
                'columns' => $columns,
                'items_count' => $model->count()
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'         => 'required',
            'email'        => 'required',
            'subject'      => '',
            'message'      => 'required',
        ]);

        return ContactForm::create([
            'name'           => $request['name'],
            'email'          => $request['email'],
            'subject'        => $request['subject'],
            'message'        => $request['message'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contactForm = ContactForm::findOrFail($id);

        // Delete the article
        $contactForm->delete();
        return ['message' => 'Contact Deleted!'];
    }
}
