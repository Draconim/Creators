<?php

namespace App\Http\Controllers;

use App\Models\Event;
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
            'status_id' => 1,
        ];
        Event_User_Status::create($create);
        //return view('events/'.$event->id)->with('events', $event);
        return redirect()
            ->route('details', $id)
            ->with('success', __('Sikeres jelentkezés'));
    }
    public function checkedIn($eventId){
        $userId=auth()->user()->id;
        $event =Event_User_Status::where('event_id', '=',$eventId)->where('user_id', '=', $userId)->where('status_id', '=', 1)->get();
        dd($eventId);
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
    public function userAppear(?string $code){


        $event = Event::where('code', '=', $code)->get();

        $eventId = $event[0]->id;
        $getRecord = Event_User_Status::where('event_id', '=',$eventId)->where('user_id', '=', Auth::id())->get();

        $getRecord[0]->status_id = 2;
        $getRecord[0]->save();
    }
}
