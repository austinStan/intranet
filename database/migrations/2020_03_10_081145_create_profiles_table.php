<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('staff_id')->unsigned();
            $table->date('employeedate');
            $table->string('nationality');
            $table->string('city');
            $table->integer('phonenumber');
            $table->string('maritalstatus');
            $table->string('spousename')->nullable();
            $table->string('childname')->nullable();
            $table->date('childdate')->nullable();
            $table->string('town');
            $table->string('street');
            $table->string('zone');
            $table->string('landmarks');
            $table->string('homedistrict');
            $table->string('hometown');
            $table->bigInteger('department_id')->unsigned();
            $table->date('startdate');
            $table->integer('salary');
            $table->string('jobstatus');
            $table->string('cv');
            $table->string('contactname');
            $table->string('jobposition');
            $table->string('relationshiptype');
            $table->integer('phoneno');
            $table->string('email')->unique();
            $table->boolean('bachelors')->default(false);
            $table->boolean('masters')->default(false);
            $table->boolean('diploma')->default(false);
            $table->boolean('certificate')->default(false);
            $table->string('academicdocument');
            $table->string('bankname');
            $table->string('bankbranch');
            $table->integer('bankaccount');
            $table->integer('nssfnumber');
            $table->integer('localtax');
            $table->string('signature');
            $table->date('signaturedate');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
