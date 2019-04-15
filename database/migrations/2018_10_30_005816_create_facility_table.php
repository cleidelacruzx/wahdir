<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facility', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            // $table->char('site_id',1);
            $table->char('region_code',2);
            $table->char('province_code',4);
            $table->char('muncity_code',6);
            $table->char('brgy_code',9);
            $table->string('hfhudcode');
            $table->date('deactivation_date')->nullable();
            $table->string('remarks')->nullable();
            $table->char('is_active',1);
            $table->timestamps();

            $table->foreign('region_code')->references('region_code')->on('lib_region');
            $table->foreign('province_code')->references('province_code')->on('lib_province');
            $table->foreign('muncity_code')->references('muncity_code')->on('lib_muncity');
            $table->foreign('brgy_code')->references('brgy_code')->on('lib_brgy');
            $table->foreign('hfhudcode')->references('hfhudcode')->on('lib_facility');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('facility', function($table) {  
          $table->dropForeign('facility_region_code_foreign');
          $table->dropForeign('facility_province_code_foreign');
          $table->dropForeign('facility_muncity_code_foreign');
          $table->dropForeign('facility_brgy_code_foreign');
          $table->dropForeign('facility_hfhudcode_foreign');
        });
        Schema::dropIfExists('facility');
    }
}
