<?php

namespace FelipeMateus\IPTVCustomers\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use FelipeMateus\IPTVChannels\Model\IPTVCdn;

class IPTVCustomer extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'hash_acess', 'iptv_plan_id','iptv_cdn_id'
    ];

    protected $table = "iptv_customers";


    public function getPersonalUrlAttribute(){

       $cdn =  IPTVCdn::findOrFail($this->iptv_cdn_id);


        return http_build_url(route("client-playlist",['slug'=>$cdn->name]),
            array(
                "user" => $this->username,
                "pass" => $this->hash_acess,
            )
        );

    }

    /**
     * Get the plan for the blog post.
     */
    public function plan()
    {
        return $this->belongsTo(IPTVPlan::class, 'iptv_plan_id');
    }

    /**
     * get list fucntion
     *
     * @return list
     */
	public function scopeGetList($query){
    	return $query->orderBy("name")->get();
    }

    /**
     * Get the cdn for the customer.
     */
    public function cdn()
    {
        return $this->belongsTo(IPTVCdn::class, 'iptv_cdn_id');
    }

}
