<?php

namespace Tschope\IPTVCustomers\Dashs;

use Tschope\IPTVCore\Helpers\IPTVDashBase;
use Tschope\IPTVCustomers\Models\IPTVCustomer;

class Customers extends IPTVDashBase {
    public static  $title = "Customers Total";

    public static function view(){
        $data['total'] = IPTVCustomer::count();
        return view('IPTV::customer_dash', $data);
    }
}
