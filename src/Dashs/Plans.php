<?php

namespace Tschope\IPTVCustomers\Dashs;

use Tschope\IPTVCore\Helpers\IPTVDashBase;
use Tschope\IPTVCustomers\Models\IPTVPlan;

class Plans extends IPTVDashBase {
    public static  $title = "Plans Total";

    public static function view(){
        $data['total'] = IPTVPlan::count();
        return view('IPTV::plan_dash', $data);
    }
}
