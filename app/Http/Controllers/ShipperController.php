<?php

namespace App\Http\Controllers;

use App\Models\Shipper;
use Illuminate\Http\Request;

class ShipperController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Using the axios request params to create a new shipper
        $shipper = new Shipper();

        $shipper->shippers_name = $request->input('shippers_name');
        $shipper->address_1     = $request->input('address_1');
        $shipper->address_2     = $request->input('address_2');
        $shipper->address_3     = $request->input('address_3');
        $shipper->country       = $request->input('country');
        $shipper->post_code     = $request->input('post_code');

        $shipper->save();

        $data = [
            'status' => 200,
            'data' => 'Shipper information saved successfully'
        ];

        return response($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shipper  $shipper
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if($request->input('id')) {
            $shipper = Shipper::where('id', $request->input('id'))->first();

            $data = [
                'status' => 200,
                'data' => $shipper
            ];

            return response($data);
        }

        $shippers = Shipper::get();

        $data = [
            'status' => 200,
            'data' => $shippers
        ];

        return response($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shipper  $shipper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shipper $shipper)
    {
        //
        $shipper = Shipper::where('id', $request->input('id'))->first();

        $shipper->shippers_name = $request->input('shippers_name');
        $shipper->address_1     = $request->input('address_1');
        $shipper->address_2     = $request->input('address_2');
        $shipper->address_3     = $request->input('address_3');
        $shipper->country       = $request->input('country');
        $shipper->post_code     = $request->input('post_code');

        $shipper->update();

        $data = [
            'status' => 200,
            'data' => 'Shipper information updated successfully'
        ];

        return response($data);
    }
}
