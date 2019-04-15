<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesDesignationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites_designation', function (Blueprint $table) {
              $table->engine = 'InnoDB';
              // $table->char('id',20);
              // $table->string('sites_desc');

              // $table->primary('id');
                $table->increments('id');
                $table->string('sites_desc');
            });

        DB::table('sites_designation')
          ->insert([
            ['id' => '1',  'sites_desc' => 'Officer In Charge'],
            ['id' => '2',  'sites_desc' => 'Medical Officer IV'],
            ['id' => '3',  'sites_desc' => 'Statistician II'],
            ['id' => '4',  'sites_desc' => 'Nurse I'],
            ['id' => '5',  'sites_desc' => 'Nurse II'],
            ['id' => '6',  'sites_desc' => 'Nurse III'],
            ['id' => '7',  'sites_desc' => 'Nurse IV'],
            ['id' => '8',  'sites_desc' => 'Nurse V'],
            ['id' => '9',  'sites_desc' => 'Midwife I'],
            ['id' => '10', 'sites_desc' => 'Midwife II'],
            ['id' => '11', 'sites_desc' => 'Midwife III'],
            ['id' => '12', 'sites_desc' => 'Admin Officer I'],
            ['id' => '13', 'sites_desc' => 'Admin Officer II'],
            ['id' => '14', 'sites_desc' => 'Admin Officer III'],
            ['id' => '15', 'sites_desc' => 'Midwife IV'],
            ['id' => '16', 'sites_desc' => 'Dentist I'],
            ['id' => '17', 'sites_desc' => 'Dentist II'],
            ['id' => '18', 'sites_desc' => 'Dentist III'],
            ['id' => '19', 'sites_desc' => 'Dental Aide'],
            ['id' => '20', 'sites_desc' => 'Day Care Worker I'],
            ['id' => '21', 'sites_desc' => 'Medical Technologist I'],
            ['id' => '22', 'sites_desc' => 'Medical Technologist II'],
            ['id' => '23', 'sites_desc' => 'Contractual Medical Technologist'],
            ['id' => '24', 'sites_desc' => 'Provincial Populations Officer I'],
            ['id' => '25', 'sites_desc' => 'Provincial Populations Officer II'],
            ['id' => '26', 'sites_desc' => 'Provincial Populations Officer II'],
            ['id' => '27', 'sites_desc' => 'Provincial Populations Officer IV'],
            ['id' => '28', 'sites_desc' => 'Health Eduation Providing Officer I'],
            ['id' => '29', 'sites_desc' => 'Health Eduation Providing Officer II'],
            ['id' => '30', 'sites_desc' => 'Health Eduation Providing Officer III'],
            ['id' => '31', 'sites_desc' => 'Computer Operator'],
            ['id' => '32', 'sites_desc' => 'Barangay Health Worker'],
            ['id' => '33', 'sites_desc' => 'Nurses Deployment Program'],
            ['id' => '34', 'sites_desc' => 'Rural Health Midwife'],
            ['id' => '35', 'sites_desc' => 'RHMPP'],
            ['id' => '36', 'sites_desc' => 'Public Health Nurse'],
            ['id' => '37', 'sites_desc' => 'Public Health Nurse I'],
            ['id' => '38', 'sites_desc' => 'Public Health Nurse II'],
            ['id' => '39', 'sites_desc' => 'Public Health Nurse III'],
            ['id' => '40', 'sites_desc' => 'Public Health Nurse IV'],
            ['id' => '41', 'sites_desc' => 'LYING-IN.DOH'],
            ['id' => '42', 'sites_desc' => 'Rural Health Physician'],
            ['id' => '43', 'sites_desc' => 'Pharmacist'],
            ['id' => '44', 'sites_desc' => 'DEMO I'],
            ['id' => '45', 'sites_desc' => 'DEMO II'],
            ['id' => '46', 'sites_desc' => 'Information Technology'],
            ['id' => '47', 'sites_desc' => 'Municipal Health Officer'],
            ['id' => '48', 'sites_desc' => 'RN HEALS'],
            ['id' => '49', 'sites_desc' => 'Rural Sanitaty Inspector'],
            ['id' => '50', 'sites_desc' => 'Rural Sanitaty Inspector II'],
            ['id' => '51', 'sites_desc' => 'JOW Nurse'],
            ['id' => '52', 'sites_desc' => 'JOW Midwife'],
            ['id' => '53', 'sites_desc' => 'Job Order Admin Aide'],
            ['id' => '54', 'sites_desc' => 'Volunteer Nurse'],
            ['id' => '55', 'sites_desc' => 'Public Health Associate'],
            ['id' => '56', 'sites_desc' => 'UHCI'],
            ['id' => '57', 'sites_desc' => 'Provincial Health Office'],
            ['id' => '58', 'sites_desc' => 'Chief Administrative Officer'],
            ['id' => '59', 'sites_desc' => 'District Nurse Supervisor'],
            ['id' => '60', 'sites_desc' => 'Admin Aide VI'],
            ['id' => '61', 'sites_desc' => 'Data Encoder'],
            ['id' => '62', 'sites_desc' => 'Philhealth Staff'],
          ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sites_designation');
    }
}
