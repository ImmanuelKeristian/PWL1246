<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index()
    {
        echo "Selamat datang";
        echo "<h1>". Auth::user()->nama ."</h1>";
        echo "<a href=logout>Log Out </a>";
    }

    function admin()
    {
        echo "Selamat datang";
        echo "<h1>". Auth::user()->nama ."</h1>";
        echo "<a href=logout>Log Out </a>";
    }

    function student()
    {
        echo "Selamat datang";
        echo "<h1>". Auth::user()->nama ."</h1>";
        echo "<a href=logout>Log Out </a>";
    }

    function program()
    {
        echo "Selamat datang";
        echo "<h1>". Auth::user()->nama ."</h1>";
        echo "<a href=logout>Log Out </a>";
    }
}
