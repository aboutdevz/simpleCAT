<?php namespace App\Controllers;

use CodeIgniter\Controller;


class Layout extends Controller
{
    public function index()
    {
        
    }

    public function dashNav()
    {
        return view('layout/dashNav');
    }

    public function mhsNav()
    {
        return view('layout/mhsNav');
    }
}