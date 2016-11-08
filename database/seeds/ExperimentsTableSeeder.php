<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class ExperimentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Winner
        DB::table('experiments')->insert([
            'creator_id' => 1,
            'name' => 'Change buttons on landing page',
            'tags' => 'Acquisition',
            'phase' => 6,
            'due_date' => Carbon::now()->addDays(30),
            'bs_metric' => 'Sign-up conversion rate',
            'bs_goal' => 'From 10% to 15%',
            'bs_impact' => 3,
            'bs_confidence' => 2,
            'bs_effort' => 1,
            'bs_results' => 'MixPanel, Google Analytics, Intercom',
            'pr_priority' => 1,
            'bl_instructions' => 'Do not forget to add X to Y',
            'ts_startdate' => Carbon::now()->addDays(5),
            'ts_enddate' => Carbon::now()->addDays(10),
            'al_results_quantitative' => 'Increased from 10% to 20%',
            'al_goal_achieved' => true,
            'al_results' => 'Exceeded the results by 5%',
            'al_learnings' => 'We learned that by adding X to the Y we got far better results than expected',
            'created_at' => Carbon::now()
        ]);

        // Loser
        DB::table('experiments')->insert([
            'creator_id' => 1,
            'name' => 'Change copy on landing page',
            'tags' => 'Acquisition',
            'phase' => 7,
            'due_date' => Carbon::now()->addDays(30),
            'bs_metric' => 'Sign-up conversion rate',
            'bs_goal' => 'From 20% to 25%',
            'bs_impact' => 3,
            'bs_confidence' => 2,
            'bs_effort' => 2,
            'bs_results' => 'MixPanel, Google Analytics, Intercom',
            'pr_priority' => 1,
            'bl_instructions' => 'Do not forget to add X to Y',
            'ts_startdate' => Carbon::now()->addDays(5),
            'ts_enddate' => Carbon::now()->addDays(10),
            'al_results_quantitative' => 'Decreased from 20% to 15%',
            'al_goal_achieved' => true,
            'al_results' => 'Results dropped by 5%',
            'al_learnings' => 'We learned that by changing copy from X to the Y we got far worst results than expected',
            'created_at' => Carbon::now()
        ]);

        // Brainstorm
        DB::table('experiments')->insert([
            'creator_id' => 1,
            'name' => 'Drop prices by $5',
            'tags' => 'Monetization',
            'phase' => 3,
            'due_date' => Carbon::now()->addDays(30),
            'bs_metric' => 'Sales Increase',
            'bs_goal' => 'From $500 to $1000 in one week',
            'bs_impact' => 3,
            'bs_confidence' => 2,
            'bs_effort' => 1,
            'bs_results' => 'Stripe',
            'created_at' => Carbon::now()
        ]);
    }
}
