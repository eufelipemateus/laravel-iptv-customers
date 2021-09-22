<?php

namespace FelipeMateus\IPTVCustomers\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use FelipeMateus\IPTVChannels\Model\IPTVChannelGroup;

class IPTVPlan extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'price', 'active', 'additional'
    ];

    protected $table = "iptv_plans";

     /**
     * Get the comments for the blog post.
     */
    public function groups()
    {
        return $this->hasMany(IPTVChannelGroup::class);
    }

}
