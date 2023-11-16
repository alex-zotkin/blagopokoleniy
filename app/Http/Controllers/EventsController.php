<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Carbon\Carbon;
class EventsController extends Controller
{
    public function index($year = null, $id = null){
        $data['year'] = $year;
        $data['id'] = $id;


        $eventsYearsData = Event::orderBy('created_at', 'desc')->get();
        $eventsYears = [];
        foreach($eventsYearsData as $i){
            $y = $i->created_at->year;
            if (!in_array($y, $eventsYears)){
                array_push($eventsYears, $y);
            }
        }
        arsort($eventsYears);
        $data['eventsYears'] = $eventsYears;


        if($year!=null){
            $dt = Carbon::now();
            $dt->year($year)->month(0)->day(0)->hour(0)->minute(0)->second(0)->toDateTimeString();
            $dt2 = Carbon::now();
            $dt2->year($year + 1)->month(0)->day(0)->hour(0)->minute(0)->second(0)->toDateTimeString();


            $events_list = Event::where('created_at', '>=', $dt)->where('created_at', '<', $dt2)->orderBy('created_at', 'desc')->get();
            $data['events_list'] = $events_list;
        }

        if($year!=null){
            $dt = Carbon::now();
            $dt->year($year-1)->month(12)->day(31)->hour(23)->minute(59)->second(59)->toDateTimeString();
            $dt2 = Carbon::now();
            $dt2->year($year)->month(12)->day(31)->hour(23)->minute(59)->second(59)->toDateTimeString();


            $events_list = Event::where('created_at', '>', $dt)->where('created_at', '<', $dt2)->orderBy('created_at', 'desc')->get();
            $data['events_list'] = $events_list;
        }


        if($year!=null && $id!=null){
            $name = null;
            foreach($events_list as $event){
                if($event['id'] == $id){
                    
                    $name = $event['eventName'];
                    
                    break;
                }
            }
            
            

            

             
            $dir = public_path("imgs/events/{$year}/{$name}");
            
            $imgs = [];

            $handle = opendir($dir);
            while($file = readdir($handle)){
                if($file !== '.' && $file !== '..' && $file !== 'Thumbs.db'){
                    // $fileName = mb_convert_encoding($file, 'utf-8', 'cp-1251');
                    array_push($imgs, $file);
                } 
            }            
            closedir($handle);      
            
            
            $data['imgs'] = $imgs;
            $data['name'] = $name;
            
            }
        


        return view('events.events', $data);
}
}
