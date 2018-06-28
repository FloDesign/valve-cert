<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreValve;
use App\Http\Requests\SearchValve;
use Illuminate\Support\Facades\Auth;
use App\Valve;
use App\Test;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\UpdateValve;

class ValveController extends Controller
{
    protected $valve;
    protected $test;

    public function __construct(Valve $valve, Test $test)
    {
        $this->valve = $valve;
        $this->test = $test;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $valves = $this->valve->all();

            return view('valves.index')->with('valves', $valves);
        }

        return view('valves.search');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            return view('valves.create');
        }

        return redirect('/valves')->with('status', 'You must be logged in as Admin to add a valve');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreValve $request)
    {
        $data = $request->validated();

        $valve = $this->valve->storeValve($data);

        if ($valve instanceof Valve) {
            return redirect('/valves')->with('status', "Valve {$valve->serial} created successfully");
        }

        return redirect('/valves/create')->withInput($data)->with('error', 'Something went wrong when creating the valve');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($valveID)
    {
        $valve = $this->valve->findBySerial($valveID);

        if ($valve instanceof Valve) {
            return view('valves.show')->with('valve', $valve);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($valve)
    {
        if (!Auth::check()) {
            return redirect('/valves')->with('error', 'You must be logged in as Admin to edit a valve');
        }

        $valveObj = $this->valve->findBySerial($valve);

        if ($valveObj instanceof Valve) {
            return view('valves.edit', ['valve' => $valveObj]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateValve $request, $valve)
    {
        $data = $request->validated();

        $valveObj = $this->valve->updateValve($data, $valve);

        if ($valveObj instanceof Valve) {
            return redirect("/valves/{$valveObj->serial}")->with('status', 'Valve updated succesfully');
        }

        return back()->withInput()->with('error', 'Could not update the valve');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($valve)
    {
        if (Auth::check()) {
            $deleted = $this->valve->deleteValve($valve);
            if ($deleted === true) {
                return redirect('/valves')->with('status', 'Valve was succesfully deleted');
            }
        }

        return redirect('/valves')->with('error', 'You must be logged in as Admin to delete a valve');
    }

    public function search(SearchValve $request)
    {
        try {
            $data = $request->validated();
            $valve = $this->valve->findBySerial($data['search']);

            if ($valve instanceof Valve) {
                return redirect("/valves/{$valve->serial}");
            }
        } catch (ModelNotFoundException $e) {
            return redirect('/valves')->with('error', 'No valve with that serial could be find');
        }
    }
}
