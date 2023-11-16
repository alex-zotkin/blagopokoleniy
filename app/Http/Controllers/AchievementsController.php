<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AchievementsController extends Controller
{

    public function index(){

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
        


            $data['imgs'] = $imgs;
            $data['docs'] = $docs;
            
        
        return view('achievements.achievements', $data);
    }
}
