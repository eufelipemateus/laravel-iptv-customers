<?php

namespace  FelipeMateus\IPTVCustomers\Controllers;

use Illuminate\Http\Request;
use FelipeMateus\IPTVCustomers\Models\IPTVPlan;
use  FelipeMateus\IPTVChannels\Model\IPTVChannelGroup;

class PlanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Return new page _blank.
     *
     * @return view -> IPTV::plan
     */
	public function new(){
		return view("IPTV::plan");
	}

    /**
     * Create new channel in database.
     *
     * @return redirect -> list_plan
     */
    public function create(Request $request){
		$data = $request->all();
		IPTVPlan::create($data);
		return redirect()->route('list_plan');
	}

    /**
     * Return a page with group from database.
     *
     * @param id -> from group
     * @return redirect -> list_group
     */
    public function show($id){
		$data["Plan"] = IPTVPlan::findOrFail($id);
        $data['GroupList'] = $data["Plan"]->groupsList();
        $data['PlanGroupList'] =$data["Plan"]->groups;
		return view("IPTV::plan",$data);
	}

    /**
     * Update group in database
     *
     * @param id from group
     * @return redirect -> list_plan
     */
    public function update($id,Request $request){
		$plan =IPTVPlan::findOrFail($id);
        $data = $request->all();
		$plan->update($data);

        if(!isset($data['active'])){
			$plan->active=false;
		}else{
			$plan->active=true;
		}

        if(!isset($data['additional'])){
			$plan->additional=false;
		}else{
			$plan->additional=true;
		}

        $plan->save();
		return redirect()->route('list_plan');
	}

    /**
     * Delete group from database
     *
     * @param id from group
     * @return redirect -> list_plan
     */
    public function delete($id,Request $request){
		$group =IPTVPlan::findOrFail($id);
		$group->delete();
		return redirect()->route('list_plan');
	}

    /**
     * Return list group from database
     *
     * @param id from group
     * @return redirect -> list_group
     */
    public function list(){
		$data["list"] = IPTVPlan::get();
		return view("IPTV::plan_list",$data);
	}

}
