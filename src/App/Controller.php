<?php

namespace App;

class Controller
{
    public function index() 
    {
        return new View('homepage', ['title' => 'General Page']);
    }

    public function about() 
    {
        return new View('about', ['title' => 'About Page']);
    }
}
