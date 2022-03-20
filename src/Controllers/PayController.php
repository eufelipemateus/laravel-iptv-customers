<?php

namespace FelipeMateus\IPTVCustomers\Controllers;

use FelipeMateus\IPTVCore\Controllers\CoreController;
use Illuminate\Http\Request;
use FelipeMateus\IPTVCustomers\Models\IPTVCustomerInvoce;

class PayController extends CoreController
{
    public function checkout($cod, $invoce_id){
        $invoce = IPTVCustomerInvoce::findOrFail($invoce_id);


    }
}
