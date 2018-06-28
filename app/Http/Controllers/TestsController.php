<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Valve;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTest;
use App\Test;

class TestsController extends Controller
{
    protected $valve;
    protected $test;

    public function __construct(Valve $valve, Test $test)
    {
        $this->valve = $valve;
        $this->test = $test;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($valve)
    {
        $valve = $this->valve->findBySerial($valve);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($test)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($test)
    {
    }
}
