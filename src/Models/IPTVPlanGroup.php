<?php

namespace Tschope\IPTVCustomers\Models;

use Tschope\IPTVChannels\Model\IPTVChannelGroup;

/**
 *  This class represent channel group in custumers package.
 */
class IPTVPlanGroup extends IPTVChannelGroup
{
    public function plan(){
        return $this->belongsTo(IPTVPlan::class,'iptv_plan_id');
    }
}
