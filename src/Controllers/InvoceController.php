<?php

namespace FelipeMateus\IPTVCustomers\Controllers;

use Illuminate\Http\Request;
use FelipeMateus\IPTVCore\Controllers\CoreController;
use FelipeMateus\IPTVCustomers\Models\IPTVCustomerInvoce;
use FelipeMateus\IPTVCustomers\Requests\IPTVCustomerInvoceCreateInvoceRequest;
use DateTime;

class InvoceController extends CoreController
{
    //
    public function new($customer_id){
        // $data['CustomerInvoce'] = IPTVCustomerInvoce::where("iptv_customer_id",$customer_id);
        return view("IPTV::customer_invoce");
    }

    public function create($customer_id, IPTVCustomerInvoceCreateInvoceRequest $request){
        $input = $request->all();
        $data['iptv_customer_id'] = $customer_id;
        $data['duedate_at'] = $input['duedate_at'];
        //$data['payeddate_at'] = $dateTime = (new DateTime($input['payeddate_at']))->getTimestamp();

		IPTVCustomerInvoce::create($data);

        return redirect()->route('show_customer', ['id'=>$customer_id]);

    }

    public function pay($customer_id, $id){
        $customer = IPTVCustomerInvoce::find($id);
        $customer->payeddate_at = now();
        $customer->save();
        return redirect()->route('show_customer', ['id'=>$customer_id]);
    }

    public function cancel($customer_id, $id){
        $customer = IPTVCustomerInvoce::find($id);
        $customer->canceleddate_at = now();
        $customer->save();
        return redirect()->route('show_customer', ['id'=>$customer_id]);
    }
}
