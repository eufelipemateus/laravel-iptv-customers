<?php

namespace FelipeMateus\IPTVCustomers\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IPTVCustomer extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'hash_acess'
    ];

    protected $table = "iptv_customers";

    /**
     * Get the plan for the blog post.
     */
    public function plan()
    {
        return $this->belongsTo(IPTVPlan::class);
    }


}
