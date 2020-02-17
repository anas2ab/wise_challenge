<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\State;
use App\Food;

class AvgFoodPrices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:avgfoodprices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'The average prices for each of the food items by state.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //select format(avg(foods.steak), 2), states.state 
        //from foods left join states on
        //foods.state_id = states.id group by states.state;
        for($i = 2; $i <= 52; $i++) {
            $steak = State::find($i)->foods()
            ->selectRaw('format(avg(steak),2) as steak')
            ->first();

            $sausage = State::find($i)->foods()
            ->selectRaw('format(avg(sausage),2) as sausage')
            ->first();

            $beef = State::find($i)->foods()
            ->selectRaw('format(avg(grnd_beef),2) as beef')
            ->first();


            $fry_chick = State::find($i)->foods()
            ->selectRaw('format(avg(fry_chick),2) as fry_chick')
            ->first();


            $tuna = State::find($i)->foods()
            ->selectRaw('format(avg(tuna),2) as tuna')
            ->first();


            $result = State::find($i)->state. ": ";
            $result .= "Steak (";
            $result .= $steak["steak"] . "), ";
            $result .= "Ground Beef (";
            $result .= $beef["beef"] . "), ";
            $result .= "Sausage (";
            $result .= $sausage["sausage"] . "), ";
            $result .= "Fried Chicken (";
            $result .= $fry_chick["fry_chick"] . "), ";
            $result .= "Tuna (";
            $result .= $tuna["tuna"] . ")";
            
            $result .= "\n";

            echo $result;
        }

        // foreach($foods as $food) {
        //     echo "Alabama: Steak " . $food->steak . " ";
        // }
        
    }
}
