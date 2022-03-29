<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Event_User_Status;
use App\Models\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('date', 'desc')->paginate(6);
        return view('events.Index',[
            'events' => $events
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $code = md5(date('Y-m-d H:i:s'));
        $create=[
            'name' => $request->name,
            'description' => $request->description,
            'date'=>$request->date,
            'duration'=>$request->duration,
            'check_in_time'=>$request->check_in_time,
            'code'=>$code
        ];
        //$input = $request->all();
        Event::create($create);
        
        return redirect('events')->with('flash_message', 'Contact Addedd!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    //public function show($id)
    //{
    //    $event = Event::find($id);
    //    return view('events.show')->with('events', $event);
    //}
    public function events()
    {
        $events = Event::orderBy('date', 'desc')->paginate(6);
        return view('events.events',[
            'events' => $events
        ]);
    }
    public function details($id)
    {
        $event = Event::find($id);
        $userId=auth()->user()->id;
        $checkIn = Event_User_Status::where('event_id', '=',$id)->where('user_id', '=', $userId)->get();
        //dd($checkIn);
        if(count($checkIn) ==1 ){
            return view('events.details',[
                'event' => $event,
                'type'=> 1
            ]);
        }
        else{
            $checkIn = Event_User_Status::where('event_id', '=',$id)->where('user_id', '=', $userId)->delete();
            return view('events.details',[
                'event' => $event,
                'type'=> 0
            ]);
        }

        //    dd($checkIn);
        
        //return view('events.details')->with('data', $data);
    }
    public function getDetails($id){
        $event = Event::find($id);
        return view('events.Edit')->with('event',$event);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        return view('events.edit')->with('event', $event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $event = Event::find($id);
        $event->name = $request->input('name');
        $event->description = $request->input('desc');
        $event->date = $request->input('date');
        $event->duration = $request->input('dur');
        $event->check_in_time = $request->input('checkin');
        $event->save();

        return redirect()->route('events')->with('flash_message', 'Contact Updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::destroy($id);
        $events = Event::orderBy('date', 'desc')->paginate(6);

        
        return redirect()->route('eventlist');
    }
}

