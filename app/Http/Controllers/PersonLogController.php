<?php

namespace App\Http\Controllers;

use App\Models\PersonLog;

class PersonLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('logs.index', [
            'logs' => PersonLog::all()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PersonLog  $personLog
     * @return \Illuminate\Http\Response
     */
    public function show(PersonLog $log)
    {
        return view('logs.show', [
            'log' => $log
        ]);
    }
}
