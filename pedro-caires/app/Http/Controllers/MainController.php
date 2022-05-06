<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class MainController extends Controller
{

    public function index(){

        $directory = "../resources/views/posts/";
        $filecount = 0;
        $files = glob($directory . "*");
        $posts = [];
        $contents = [];

        if ($files){
            $filecount = count($files);
        }

        foreach($files as $f){
            $content = file_get_contents(resource_path($f));
            $content = str_replace("@extends('index')", '', $content);    
            $content = str_replace("@section('content')", '', $content);  
            $content = str_replace("@endsection", '', $content);  
            $content = str_replace("@section('title')", '', $content); 
            $content = explode(PHP_EOL, $content); 
            array_push($contents, array_values(array_filter($content)));
            
            $f = str_replace('.blade.php', '', $f);
            $f = str_replace('../resources/views/posts/', '', $f);
            array_push($posts, $f);
        }

        $data=[
            'quantity' => count($posts),
            'posts' => $posts,
            'contents' => $contents,
        ];

        echo view("pages.home", $data);

    }

}
