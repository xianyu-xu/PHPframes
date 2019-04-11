<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HtmlController extends Controller
{
    //
    public function index()
    {
        // return view('html.index');
        $data = [
            'name'=>'lxd',
            'age'=>12
        ];

        $people = [
            ['id'=>1, 'title'=>'php1',],
            ['id'=>2, 'title'=>'php2',],
            ['id'=>3, 'title'=>'php3',],
            ['id'=>4, 'title'=>'php4',],
        ];
        $user = [];
        return view('html.index',compact('data','people','user'));
    }


    public function extend()
    {
        return view('ext');
    }
}
