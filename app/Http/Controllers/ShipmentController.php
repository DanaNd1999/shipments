<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//use Tymon\JWTAuth\Contracts\Providers\Auth;
//use Tymon\JWTAuth\JWTAuth;

class ShipmentController extends Controller {


    /**
     * Create a new ShipmentController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware( 'jwt.verify' );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() {
        $shipments = auth()->user()->shipments;

        return response()->json( [
            'status'    => 200,
            'shipments' => $shipments
        ] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request ) {
        $request->validate( [
            'waybill'          => 'required',
            'customer_address' => 'required',
            'customer_name'    => 'required',
            'phone_number'     => 'required',
        ] );

        try {
            auth()->user()->shipments()->create(
                $request->only( [ 'waybill', 'customer_address', 'customer_name', 'phone_number' ]
                ) );

            return response()->json( [
                'message' => 'Shipment Created Successfully!!'
            ], 200 );
        } catch ( \Exception $e ) {
            return response()->json( [
                'message' => 'Something goes wrong while creating the shipment!!'
            ], 500 );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Shipment $shipment
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show( $id = null ) {
        $shipment = auth()->user()->shipments()->where('id', $id)->first();
        if ($shipment) {
            return response()->json( [
                'shipment' => $shipment
            ], 200 );
        }else{
            return response()->json( [
                'message' => 'Shipment not found!!'
            ], 404 );
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param                          $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( Request $request, $id ) {
        $request->validate( [
            'waybill'          => 'required',
            'customer_address' => 'required',
            'customer_name'    => 'required',
            'phone_number'     => 'required',
        ] );

        try {

            $shipment = auth()->user()->shipments()->where('id', $id)->first();
            if ($shipment) {
                $shipment->update(
                    $request->only( [ 'waybill', 'customer_address', 'customer_name', 'phone_number' ]
                    ) );

                return response()->json( [
                    'message' => 'Shipment Created Successfully!!'
                ], 200 );
            }else{
                return response()->json( [
                    'message' => 'Shipment not found!!'
                ], 404 );
            }
        } catch ( \Exception $e ) {
            return response()->json( [
                'message' => 'Something goes wrong while creating the shipment!!'
            ], 500 );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Shipment $shipment
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function cancel( $id ) {
        try {
            $shipment = auth()->user()->shipments()->where('id', $id)->first();
            if ($shipment) {
                $shipment->is_canceled = 1;
                $shipment->save();

                return response()->json( [
                    'message' => 'Shipment canceled'
                ], 200 );
            }
            else{
                return response()->json( [
                    'message' => 'Shipment not found!!'
                ], 404 );
            }
        } catch ( \Exception $e ) {
            return response()->json( [
                'message' => 'Something goes wrong while creating the shipment!!'
            ], 500 );
        }
    }
}
