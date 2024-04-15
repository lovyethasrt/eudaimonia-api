<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\VoucherResource;
use App\Models\Voucher;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $vouchers = Voucher::all();
            return response()->json(VoucherResource::collection($vouchers));
        }catch(\Throwable $th){
            Log::info($th->getMessage());
            return response()->json([
                'message' => 'Server error.'
            ],500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Validator = Validator::make($request->all(),[
            'title' => ['required'],
            'description' => ['nullable'],
            'active_date' => ['required','date_format:Y-m-d'],
            'expiration_date' => ['required', 'date_format:Y-m-d'],
            'discount_value' => ['required','numeric'],
            'discount_value' => ['required','numeric'],
        ]);

        if($Validator->fails()){
            return response()->json([
                'errors' => $Validator->getMessageBag()
            ], 422);
        }

        $voucher = Voucher::create($request->only([
            'title',
            'description',
            'active_date',
            'expiration_date',
            'discount_value',
            'quota'
        ]));

        return response()->json(
            VoucherResource::make($voucher)
        ,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $voucher
     * @return \Illuminate\Http\Response
     */
    public function show(string $voucher)
    {
        try{
            $voucher = Voucher::findOrFail($voucher);
            return response()->json(VoucherResource::make($voucher));
        }catch(ModelNotFoundException $e){
            return response()->json([
                'message' => 'Voucher not found'
            ],404);
        }
        catch(\Throwable $th){
            Log::info($th->getMessage());
            return response()->json([
                'message' => 'Server error.'
            ],500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $voucher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $voucher)
    {
        try{
            $voucher = Voucher::findOrFail($voucher);
            
        $updatedVoucher = $voucher->update($request->only([
            'title',
            'description',
            'active_date',
            'expiration_date',
            'discount_value',
            'quota'
        ]));
        $Validator = Validator::make($request->all(),[
            'title' => ['required'],
            'description' => ['nullable'],
            'active_date' => ['required','date_format:Y-m-d'],
            'expiration_date' => ['required', 'date_format:Y-m-d'],
            'discount_value' => ['required','numeric'],
            'discount_value' => ['required','numeric'],
        ]);

        if($Validator->fails()){
            return response()->json([
                'errors' => $Validator->getMessageBag()
            ], 422);
        }
        return response()->json(VoucherResource::make($voucher));
        }catch(ModelNotFoundException $e){
            return response()->json([
                'message' => 'Voucher not found'
            ],404);
        }
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $voucher
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $voucher)
    {
        try{
            $voucher = Voucher::findOrFail($voucher);
            $voucher->delete();
        }catch(\Throwable $th){
            Log::info($th->getMessage());
            return response()->json([
                'message' => 'Server error.'
            ],500);
        }
    }
}
