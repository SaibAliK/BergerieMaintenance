<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobAssignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_assigns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->references('id')->on('jobs');
            $table->string('assign_to')->nullable();
            $table->string('selected_user_id')->nullable();
            $table->longText('comment')->nullable();
            $table->date('closure_date');
            $table->date('date_emailed')->nullable();
            $table->string('job_assigned')->nullable()->default(0);
            $table->enum('status', ['open','hold','closed'])->default('hold');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_assigns');
    }
}
