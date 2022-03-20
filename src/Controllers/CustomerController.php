<?php

namespace  FelipeMateus\IPTVCustomers\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use FelipeMateus\IPTVCustomers\Models\IPTVPlan;
use FelipeMateus\IPTVCustomers\Models\IPTVCustomer;
use FelipeMateus\IPTVCore\Controllers\CoreController;
use FelipeMateus\IPTVChannels\Model\IPTVCdn;
use FelipeMateus\IPTVGatewayPayment\Models\IPTVGateway;

class CustomerController extends CoreController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        ////$this->middleware('auth');
    }

    /**
     * Show new customer page.
     *
     * @return view -> IPTV:customer
     */
	public function new(){
		$data["Planslist"] = IPTVPlan::activePlanList();
        $data['Cdnslist'] = IPTVCdn::all();
		return view("IPTV::customer",$data);
	}

    /**
     * Show page from customer with id.
     *
     * @param $id - channewl id
     * @return view -> IPTV:chanel
     */
	public function show($id){
		$data["Customer"]  = IPTVCustomer::findOrFail($id);
        $data["Planslist"] = IPTVPlan::activePlanList();
        $data["PlansAdditionallist"] = $data["Customer"]->planAditionalList();
        $data['Cdnslist'] = IPTVCdn::all();
        $data['CustomerPlansAddionalList'] = $data["Customer"]->plans_additional()->get();
        $data['CustomerInvoceList'] = $data["Customer"]->customer_invoce()->get();
        $data['GatewaysList'] = IPTVGateway::where('active',1)->get();

        return view("IPTV::customer",$data);
	}

    /**
     * Save new data from new channel in database.
     *
     * @return redirect -> list_channels
     */
    public function create(Request $request){
		$this->validate($request, [
			'name' => 'string|required',
			'username' => 'required|string',
			'iptv_plan_id' => 'required|exists:iptv_plans,id',
		]);
		$data = $request->all();
        $data['hash_acess'] = md5(now());
		IPTVCustomer::create($data);
        return redirect()->route('list_customer');
	}

    /**
     * Save new data from new channel in database.
     *
     * @param id from channel
     * @return redirect -> list_channels
     */
	public function update($id,Request $request){
		$channel =IPTVCustomer::findOrFail($id);

		$this->validate($request, [
			'name' => 'string|required',
			'username' => 'required|string',
			'iptv_plan_id' => 'required|exists:iptv_plans,id',
		]);

		$data = $request->all();

        $data['active'] = $request->boolean('active','bool');
		$channel->update($data);

		return redirect()->route('list_customer');
	}

    /**
     * Delete channel form database.
     *
     * @param id from channel
     * @return redirect -> list_customer
     */
    public function delete($id,Request $request){
		$group =IPTVCustomer::findOrFail($id);
		$group->delete();
		return redirect()->route('list_customer');
	}

    /**
     * Return a customer List from database.
     *
     * @return view -> IPTV::customer_list
     */
    public function list(){
		$data['list'] = IPTVCustomer::getList();
		return view("IPTV::customer_list",$data);
	}
}
