<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuffixTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suffixes', function (Blueprint $table) {
              $table->char('suffix_code',5);
              $table->string('suffix_desc');

              $table->primary('suffix_code');
            });

        DB::table('suffixes')
          ->insert([
            ['suffix_code' => 'II', 'suffix_desc' => 'II'],
            ['suffix_code' => 'III', 'suffix_desc' => 'III'],
            ['suffix_code' => 'IV', 'suffix_desc' => 'IV'],
            ['suffix_code' => 'JR', 'suffix_desc' => 'Jr.'],
            ['suffix_code' => 'NOTAP', 'suffix_desc' => 'Not Applicable'],
            ['suffix_code' => 'SR', 'suffix_desc' => 'Sr.'],
            ['suffix_code' => 'V', 'suffix_desc' => 'V']
          ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('suffixes');
    }
}
