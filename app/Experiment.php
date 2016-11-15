<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experiment extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['creator_id','name','tags','phase','due_date','bs_metric','bs_goal','bs_impact','bs_confidence','bs_effort','bs_results','pr_priority','bl_instructions','ts_startdate','ts_enddate','al_results_quantitative','al_goal_achieved','al_results','al_learnings'];

    private static $phases = array( 1 => 'Brainstorm',
                                    2 => 'Prioritize',
                                    3 => 'Build',
                                    4 => 'Test',
                                    5 => 'Analyze',
                                    6 => 'Winner',
                                    7 => 'Loser');

    private static $percentages = array(    1 => 'Low - 0% to 30%',
                                            2 => 'Medium - 30% to 70%',
                                            3 => 'High - 70% to 100%');

    private static $efforts = array(    1 => 'Small',
                                        2 => 'Medium',
                                        3 => 'Big');

    private static $priorities = array( 1 => 'Critical',
                                        2 => 'High Priority',
                                        3 => 'Neutral',
                                        4 => 'Low priority',
                                        5 => 'Unknown');

    /**
     * Get the creator of the experiment.
     */
    public function creator()
    {
        return $this->belongsTo('App\User', 'creator_id');
    }

    /**
     * Get percentages array.
     */
    public static function getPercentages()
    {
        return self::$percentages;
    }

    /**
     * Get efforts array.
     */
    public static function getEfforts()
    {
        return self::$efforts;
    }

    /**
     * Get priorities array.
     */
    public static function getPriorities()
    {
        return self::$priorities;
    }

    /**
     * Get phases array.
     */
    public static function getPhases()
    {
        return self::$phases;
    }

    /**
     * Get current experiment phase name.
     */
    public function getPhase($phase)
    {
        return self::$phases[$phase];
    }

    /**
     * Get current experiment phase name.
     */
    public function getPriority($priority)
    {
        return self::$priorities[$priority];
    }

    /**
     * Get current experiment phase progress value.
     */
    public function getPhaseProgress($phase)
    {
        switch ($phase) {
            case 1:
                return 20;
                break;

            case 2:
                return 40;
                break;

            case 3:
                return 60;
                break;

            case 4:
                return 80;
                break;

            case 5:
                return 90;
                break;

            case 6:
                return 100;
                break;

            case 7:
                return 100;
                break;

            default:
                return 20;
                break;
        }
    }

    /**
     * Get current experiment phase progress bar color.
     */
    public function getPhaseProgressColor($phase)
    {
        if ($phase == 6) {
            return 'success';
        } else if ($phase == 7) {
            return 'danger';
        } else {
            return 'info';
        }
    }
}
