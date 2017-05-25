<?php

namespace App\Http\Controllers\Desktop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
    public function index()
    {
      return view('dashboards');
    }
}
