<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->foreignId('loggedBy_id')->references('id')->on('logged_bies')->constrained()->onDelete('cascade');
            $table->string('reported_by')->nullable();
            $table->string('resident')->nullable();
            $table->string('urgency')->nullable();
            $table->longText('description')->nullable();
            $table->foreignId('staff_id')->references('id')->on('staff')->constrained()->onDelete('cascade');
            $table->foreignId('unit_id')->references('id')->on('units')->constrained()->onDelete('cascade');
            $table->foreignId('issue_id')->references('id')->on('issues')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('jobs');
    }
}
