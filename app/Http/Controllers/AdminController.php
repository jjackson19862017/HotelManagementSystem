<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){

        return view('admin.index');
    }

    public function auditTime(){
        $data = [];
        $data['audits'] = User::find(10)->audits;
        $data['hotels'] = Hotel::find(2)->audits;
        //dd($data['audits']);
        return view('audit.index', $data);
    }
}
