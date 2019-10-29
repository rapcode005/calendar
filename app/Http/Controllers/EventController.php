<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calendar;

class EventController extends Controller
{
    public function index() 
    {
        $lists = Calendar::all();
        if (!isset($lists)) {
            $lists = array();
            $month = date('m');
            $monthname = date('M');
            $year = date('y');
            $total_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);       
            for ($i=0; $i < $total_days; $i++) { 
                array_push($lists, $monthname." ".($i + 1));
            }
        }
        else {
            //= date_parse_from_format("Y-m-d", $date);
            //$current_date = $data->latest()->pluck('from')->first();
            //$last_date =  $data->latest()->pluck('to')->first();
            //$i = 0;
            //while ($current_date <= $last_date) 
            //{   
                //$day = date('D', strtotime($current_date));
                //$monthname = date('M', strtotime($current_date));
                //$day_has_event =  $data_cal->pluck($day)->first();
                //dd(Calendar::latest()->value($day));
                //$i += 1;
            //}
            
            return view('welcome', compact('lists')); 
        }
        
        return view('welcome', compact("lists"));
    }

    public function add()
    {

        Calendar::truncate();
        $from_date= request('from_date');
        $to_date = request('to_date');
        $event_m = request('Event');

        $from_date = date_create($from_date);
        $to_date = date_create($to_date);
        while ($from_date <= $to_date)
        {
            $day = strtolower(date_format($from_date, 'D'));
            $dayn = date_format($from_date, 'd');
            $monthname = date_format($from_date, 'M');
            $all = $monthname.$dayn;
            if (request($day) == "on")
            {
                $all = $all."  -  ".$event_m;
            }
            Calendar::create([
                'has_event' => $all,
            ]);
            date_add($from_date,date_interval_create_from_date_string("1 days"));
        }
        return redirect()->to('/');
    }
}
