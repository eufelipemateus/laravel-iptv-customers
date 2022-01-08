<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIptvCustomerPlanAdditionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iptv_customer_plan_additionals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('iptv_customer_id')->constrained();
            $table->foreignId('iptv_plans_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('iptv_customer_plan');
    }
}
