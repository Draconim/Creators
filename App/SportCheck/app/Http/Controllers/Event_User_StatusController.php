<?php

namespace App\Http\Controllers;

use App\Models\Event_User_Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Event_User_StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $create=[
            'user_id' => Auth::id(),
            'event_id' => $id,
            //'status_id' => $request->status_id,
        ];
        Event_User_Status::create($create);
        //return view('events/'.$event->id)->with('events', $event);
        return redirect()
            ->route('details', $id)
            ->with('success', __('Sikeres jelentkezés'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event_User_Status  $event_User_Status
     * @return \Illuminate\Http\Response
     */
    public function show(Event_User_Status $event_User_Status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event_User_Status  $event_User_Status
     * @return \Illuminate\Http\Response
     */
    public function edit(Event_User_Status $event_User_Status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event_User_Status  $event_User_Status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event_User_Status $event_User_Status)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event_User_Status  $event_User_Status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event_User_Status $event_User_Status)
    {
        //
    }
}
