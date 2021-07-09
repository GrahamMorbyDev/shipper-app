<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $contact = new Contact();

        $contact->shipper_id   = $request->input('shipper_id');
        $contact->contact_name = $request->input('contact_name');
        $contact->contact_number = $request->input('contact_number');
        $contact->is_primary = $request->input('is_primary');

        $contact->save();

        $data = [
            'status' => 200,
            'data' => 'Contact information saved successfully'
        ];

        return response($data);
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $contacts = Contact::where('id', $request->input('shipper_id'))->get();

        $data = [
            'status' => 200,
            'data' => $contacts
        ];

        return response($data);
    }


}
