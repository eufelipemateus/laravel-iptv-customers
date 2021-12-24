<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateIptvCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('iptv_customers', function (Blueprint $table) {

            $table->foreignId('iptv_cdn_id')
                ->nullable()
                ->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('iptv_customers', function (Blueprint $table) {
             $table->dropColumn('iptv_cdn_id');
        });
    }
}
