<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\View;


class DashboardController extends Controller
{
    public function __construct(){
        View::share('email_count', \App\Models\ContactMail::where('is_deleted', 0)->where('is_read', 0)->count());
    }
}
