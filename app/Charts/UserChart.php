<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Chartisan\PHP\Chartisan;
use Chartisan\PHP\ServerData;
use Illuminate\Http\Request;

class UserChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
}
