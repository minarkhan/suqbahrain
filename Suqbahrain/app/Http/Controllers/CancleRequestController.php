<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Order;
use App\OrderDetail as AppOrderDetail;
use Illuminate\Http\Request;
use App\RefundRequest;
use Illuminate\Support\Facades\Auth;

class CancleRequestController extends Controller
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        $order = Order::find($id);
        $order->cancel_request = 1;
        $order->viewed = 0;
        $order->save();
        $orderdetails = OrderDetail::where('order_id', $id)->get();
        foreach($orderdetails as $key => $orderdetail){
            $orderdetail->cancel_request = 1;
            $orderdetail->save();
        }
        flash('your cancel request successfully submitted');
        return redirect()->back();
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

    public function refund_request_send_page($id)
    {
        $order_detail = OrderDetail::findOrFail($id);
        return view('frontend\seller\refund_form', compact('order_detail'));
    }

    public function refund_send_customer(Request $request, $id)
    {
        // return $request->email;

        if( $request->refund_method == 'Bank Account' ){
            $request->validate([
                // 'method_details' => 'nullable|string|max:255',
                'ac_holder' => 'required',
                'ac_no' => 'required',
                'iban_number' => 'required',
                'bank_name' => 'required',
            ]);
        } elseif( $request->refund_method == 'Benifit Pay' || $request->refund_method == 'Paypal' ) {
            $validated = $request->validate([
                'email' => 'required',
            ]);
        }
        // } else{
        //     $validated = $request->validate([
        //         'method_details' => 'nullable|string|max:255',
        //     ]);
        // }

        $order_detail = OrderDetail::where('id', $id)->first();
        $refund = new RefundRequest;
        $refund->user_id = Auth::user()->id;
        $refund->order_id = $order_detail->order_id;
        $refund->order_detail_id = $order_detail->id;
        $refund->seller_id = $order_detail->seller_id;
        $refund->seller_approval = 0;
        $refund->reason = $request->reason;
        $refund->admin_approval = 0;
        $refund->admin_seen = 0;
        $refund->refund_amount = $order_detail->price + $order_detail->tax;
        $refund->refund_status = 0;
        $refund->refund_method = $request->refund_method;

        if( $request->refund_method == 'Bank Account' ){
            $request = $request->all();
            $refund->method_details = json_encode($request);
        } else {
            $refund->method_details = $request->email;
        }
        // $refund->method_details = $request->method_details;

        if ($refund->save()) {
            flash("Refund Request has been sent successfully")->success();
            return redirect()->route('purchase_history.index');
        }
        else {
            flash("Something went wrong")->error();
            return back();
        }

    }

    public function refund_reuest_vendor_pay($id)
    {
        $refund = RefundRequest::findOrFail($id);
        $refund->refund_status = 1;

        if ( $refund->save() ) {
            flash('success');
            return redirect()->back();
        }
        else {
            flash('Fail');
            return redirect()->back();
        }

    }

}
