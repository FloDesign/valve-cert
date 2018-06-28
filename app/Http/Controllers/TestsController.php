<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Valve;

class TestsController extends Controller
{
    protected $valve;

    public function __construct(Valve $valve)
    {
        $this->valve = $valve;
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
