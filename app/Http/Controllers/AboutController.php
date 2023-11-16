<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $dir = public_path("imgs/partners/");
        $partners = [];
            $handle = opendir($dir);
            while($file = readdir($handle)){
                if($file !== '.' && $file !== '..' && $file != 'medics.png' && $file != 'rbn.png'){
                    
                    array_push($partners, $file);
                } 
            }
            closedir($handle);         
            
        $data['partners'] = $partners;
        
        return view('about.about', $data);
    }
}
