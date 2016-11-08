<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperimentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiments', function (Blueprint $table) {
            // General Experiment Information
            $table->increments('id');
            $table->integer('creator_id')->unsigned();
            $table->foreign('creator_id')->references('id')->on('users');
            $table->string('name')->unique();
            $table->string('tags')->nullable();
            $table->tinyInteger('phase')->default(1);
            $table->date('due_date')->nullable();
            // Brainstorm
            $table->string('bs_metric');
            $table->string('bs_goal');
            $table->tinyInteger('bs_impact')->default(1);
            $table->tinyInteger('bs_confidence')->nullable();
            $table->tinyInteger('bs_effort')->default(1);
            $table->text('bs_results')->nullable();
            // Prioritize
            $table->tinyInteger('pr_priority')->nullable();
            // Build
            $table->text('bl_instructions')->nullable();
            // Test
            $table->date('ts_startdate')->nullable();
            $table->date('ts_enddate')->nullable();
            // Analyze
            $table->string('al_results_quantitative')->nullable();
            $table->boolean('al_goal_achieved')->nullable();
            $table->text('al_results')->nullable();
            $table->text('al_learnings')->nullable();
            // Timestamps
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
        Schema::dropIfExists('experiments');
    }
}
