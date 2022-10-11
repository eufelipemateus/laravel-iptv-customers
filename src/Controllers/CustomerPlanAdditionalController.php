<?php

namespace Tschope\IPTVCustomers\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Tschope\IPTVCore\Controllers\CoreController;
use Tschope\IPTVCustomers\Models\IPTVCustomer;
use Tschope\IPTVCustomers\Models\IPTVPlan;

class CustomerPlanAdditionalController extends CoreController
{

    public function add($customer_id, Request $request){

        $this->validate($request, [
			'iptv_plan_id' => [
                'string',
                'required',
                Rule::exists('iptv_plans', 'id')->where(function ($query) {
                    return $query->where('additional', 1);
                }),
            ]
        ]);


        $customer = IPTVCustomer::findOrFail($customer_id);
        $plan_id  = $request->input('iptv_plan_id');

	    $customer->plans_additional()->save( IPTVPlan::findOrFail($plan_id));
        return redirect()->route('show_customer',['id'=>$customer->id]);
    }

    public function del($customer_id, Request $request){
        $this->validate($request, [
			'iptv_plan_id' => [
                'string',
                'required',
                Rule::exists('iptv_plans', 'id')->where(function ($query) {
                    return $query->where('additional', 1);
                }),
            ]
        ]);

        $customer = IPTVCustomer::findOrFail($customer_id);
        $plan_id  = $request->input('iptv_plan_id');

        $customer->plans_additional()->detach($plan_id);
        $customer->save();

        return redirect()->route('show_customer',['id'=>$customer->id]);

    }
}
