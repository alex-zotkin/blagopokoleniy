<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
Use App\Article;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('admin.admin');
    }

    





















    public function achievements(){

        $dir = public_path("imgs/achievements/");
        $imgs = [];
            $handle = opendir($dir);
            while($file = readdir($handle)){
                if($file !== '.' && $file !== '..' && $file !== 'pdf'){
                    
                    array_push($imgs, $file);
                } 
            }
            closedir($handle);  
            
            
        $docs_dir = public_path("imgs/achievements/pdf/");
        $docs = [];
            $handle = opendir($docs_dir);
            while($file = readdir($handle)){
                if($file !== '.' && $file !== '..'){
                    
                    array_push($docs, $file);
                } 
            }
            closedir($handle);   

        $data['docs'] = $docs;
        $data['imgs'] = $imgs;
        return view('admin.admin-achievements', $data);
    }




    public function achievementsAdd(Request $request){
        $picture = '';  
        if ($request->hasFile('imgs')) {
            $files = $request->file('imgs');
            foreach($files as $file){
                $filename = $file->getClientOriginalName();
                
                $extension = $file->getClientOriginalExtension();
                $picture = date('His').$filename;
                $destinationPath = public_path("imgs/achievements/");
                $file->move($destinationPath, $picture);
            }
        }
            
                
      
        // return Responce::json(array('success' => true));
    
    }

    public function achievementsAddDocs(Request $request){
        $doc = '';  
        if ($request->hasFile('docs')) {
            $files = $request->file('docs');
            foreach($files as $file){
                $filename = $file->getClientOriginalName();
                
                $extension = $file->getClientOriginalExtension();
                $doc = date('His').$filename;
                $destinationPath = public_path("imgs/achievements/pdf/");
                $file->move($destinationPath, $doc);
            }
        }
            
                
      
        
    
    }



    public function achievementsDelete($name){
        

        $dir = public_path("imgs/achievements/{$name}");
        if(is_file($dir)){
            unlink($dir);
            return redirect()->route('adminAchievements');
        }
        // unlink(public_path("imgs/achievements/{$name}"));

            // $handle = opendir($dir);
            // while($file = readdir($handle)){
            //     // $file = mb_convert_encoding($file, 'utf-8', 'windows-1251');
            //     if($file !== '.' && $file !== '..' && $file !== 'pdf' && $file == $name){

            //         $path = "{$dir}{$file}";
            //         // $path = mb_convert_encoding($file, 'windows-1251', 'utf-8');
                    
                    
            //     } 
            // }
            // closedir($handle); 
            
            
 
            // dd($path);
            // return redirect()->route('adminAchievements');
        

    }

    public function achievementsDeleteDoc($name){
       
        $path = '';  
        $dir = public_path("imgs/achievements/pdf/");
            $handle = opendir($dir);
            while($file = readdir($handle)){
                if($file !== '.' && $file !== '..' && $file == $name){
                    $path = "{$dir}{$name}";
                    unlink($path);
                    
                } 
            }
            closedir($handle);         
            return redirect()->route('adminAchievements');
        
            dd($path);
    }










    public function events(){
        $events = Event::orderBy('created_at', 'desc')->get();
        $data['events'] = $events;
        return view('admin.admin-events', $data);
    }


    public function eventsAdd(){
        return view('admin.admin-eventsAdd');
    }


    public function eventsAddPost(Request $request){
       
        $date = Carbon::parse($request->input('datepicker'));
        $eventName = $request->input('eventName');


        $dir = public_path("imgs/events/{$date->year}/");
        if(file_exists($dir)){
            $dir = public_path("imgs/events/{$date->year}/{$eventName}/");
            $img = '';  
            if ($request->hasFile('imgs')) {
                $files = $request->file('imgs');
                foreach($files as $file){
                    $filename = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $img =$filename;
                    $file->move($dir, $img);
                }
            }
        } else {
            mkdir(public_path("imgs/events/{$date->year}/"), 0777);
            $dir = public_path("imgs/events/{$date->year}/{$eventName}/");
            $img = '';  
            if ($request->hasFile('imgs')) {
                $files = $request->file('imgs');
                foreach($files as $file){
                    $filename = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $img =$filename;
                    $file->move($dir, $img);
                }
            }
        }

        $event = new Event;
        $event->created_at = $date;
        $event->eventName = $eventName;
        
        $event->save();

        return redirect()->route('adminEvents');
        
    }

    public function eventsDelete($year, $name){
        $dt = Carbon::now();
        $dt->year($year)->month(0)->day(0)->hour(0)->minute(0)->second(0)->toDateTimeString();
        $dt2 = Carbon::now();
        $dt2->year($year + 1)->month(0)->day(0)->hour(0)->minute(0)->second(0)->toDateTimeString();
        $dir = public_path("imgs/events/{$year}/{$name}/");
        if ($objs = glob($dir."/*")) {
            foreach($objs as $obj) {
              is_dir($obj) ? removeDirectory($obj) : unlink($obj);
            }
         }
         rmdir($dir);
        $event = Event::where('created_at', '>=', $dt)->where('created_at', '<', $dt2)->where('eventName', '=', $name)->take(1)->orderBy('created_at', 'desc')->delete();


        return redirect()->route('adminEvents');
    }

    public function eventsEdit($year, $name){
        $data['year'] = $year;
        $data['name'] = $name;
        return view('admin.admin-eventsEdit', $data);
    }




    public function news(){
        $news = Article::orderBy('created_at', 'desc')->get();
        $data['news'] = $news;
        return view('admin.admin-news', $data);
    }

    public function newsAdd(){
        // $news = Article::orderBy('created_at', 'desc')->get();
        // $data['news'] = $news;
        return view('admin.admin-newsAdd');
    }

    public function newsAddPost(Request $request){
        $Article = new Article;
        $Article->created_at = $request->input('datepicker');
        $Article->title = $request->input('title');
        $Article->body = $request->input('text');
        $picture = '';  
        if ($request->hasFile('imgs')) {
            $files = $request->file('imgs');
            foreach($files as $file){
                $filename = $file->getClientOriginalName();
                
                $extension = $file->getClientOriginalExtension();
                $picture = date('His').$filename;
                $destinationPath = public_path("imgs/news/");
                
                $file->move($destinationPath, $picture);
            }
        }
        $Article->imgName = $picture;
        $Article->save();
        return redirect()->route('adminNews');


    }


    public function newsDelete($id){
        $img = Article::where('id', '=', $id)->get();
        $img = $img[0]['imgName'];
        $obj = public_path("imgs/news/{$img}");
        unlink($obj);
        Article::where('id', '=', $id)->take(1)->delete();

        return redirect()->route('adminNews');
    }

    
}

