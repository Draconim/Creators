<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Event_User_Status;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Nette\Utils\DateTime;


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
        if($this->checkUserRole() == 'foadmin'){
            return redirect()->route('userlist');
        }
        else{
        return view('events.create');
        }
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
        if($this->checkUserRole() == 'foadmin'){
            return redirect()->route('userlist');
        }
        else{
            if($this->checkUserRole() == 'user'){
                $events = Event::where('check_in_time', '>', new DateTime('now'))->orderBy('date', 'desc')->get();
            }
            else{
                $events = Event::orderBy('date', 'desc')->get();
            }
            return view('events.events',[
                'events' => $events
            ]);
        }
        
    }
    public function details($id)
    {
        if($this->checkUserRole() == 'foadmin'){
            return redirect()->route('userlist');
        }
        else{


        $event = Event::find($id);
        $userId=auth()->user()->id;
        
        if($this->checkUserRole() == 'user'){
            if($event->check_in_time < new DateTime('now')){
                return redirect('events');
            }
        }
        else{
            $events = Event::orderBy('date', 'desc')->get();
        }

        $checkIn = Event_User_Status::where('event_id', '=',$id)->where('user_id', '=', $userId)->get();
        //dd($checkIn);
        
        if(count($checkIn) ==1 ){
            
            if($checkIn[0]->status_id == 1){
                return view('events.details',[
                    'event' => $event,
                    'type'=> 1
                ]);
            }
            else if($checkIn[0]->status_id == 2){
                return view('events.details',[
                    'event' => $event,
                    'type'=> 2
                ]);
            }
            else if($checkIn[0]->status_id == 3){
                return view('events.details',[
                    'event' => $event,
                    'type'=> 3
                ]);
            }
            else if($checkIn[0]->status_id == 4){
                return view('events.details',[
                    'event' => $event,
                    'type'=> 4
                ]);
            }
        }
        else{
            $checkIn = Event_User_Status::where('event_id', '=',$id)->where('user_id', '=', $userId)->delete();
            return view('events.details',[
                'event' => $event,
                'type'=> 0
            ]);
        }
    }
        //    dd($checkIn);
        
        //return view('events.details')->with('data', $data);
    }
    public function getDetails($id){
        if($this->checkUserRole() == 'foadmin'){
            return redirect()->route('userlist');
        }
        else{
        $event = Event::find($id);
        return view('events.Edit')->with('event',$event);
        }
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
        $event->description = $request->input('description');
        $event->date = $request->input('date');
        $event->duration = $request->input('duration');
        $event->check_in_time = $request->input('check_in_time');
        $event->save();

        return redirect()->route('events')->with('flash_message', 'Contact Updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Event::destroy($request->input('id'));
        $events = Event::orderBy('date', 'desc')->paginate(6);

        
        return redirect()->route('events');
    }

    public static function checkUserRole(){
        $role = Role::find(Auth::user()->role_id);
        return $role->name;

    }

    public function setQrCode(Request $request, $id){
        $event = Event::find($id);

        $event_data = array($event->id, $event->name);

        $pdf = SnappyPdf::loadView('qr', compact('event'));
        return $pdf->stream('e.pdf');
    }

    public function search(Request $request){
        if($this->checkUserRole() == 'foadmin'){
            return redirect()->route('users');
        }
        else{
        $search_text = $_GET['eventSearch'];
        $fields = $request->get('searchItem', 0);
        if($this->checkUserRole() == 'user'){
            
            if($fields == 'srcName'){
                $events = Event::where('name','LIKE','%'.$search_text.'%')->where('check_in_time', '>', new DateTime('now'))->orderBy('date', 'desc')->get();
            }
            else if ($fields == 'srcDesc'){
                $events = Event::where('description','LIKE','%'.$search_text.'%')->where('check_in_time', '>', new DateTime('now'))->orderBy('date', 'desc')->get();
            } 
            else{
                $this->events();
            }
            
        }
        else{
            if($fields == 'srcName'){
                $events = Event::where('name','LIKE','%'.$search_text.'%')->orderBy('date', 'desc')->get();
            }
            else if ($fields == 'srcDesc'){
                $events = Event::where('description','LIKE','%'.$search_text.'%')->orderBy('date', 'desc')->get();

            } 
            else{
                $this->events();
            }
            
        }

        return view('events.events',[
            'events' => $events
        ]);
    }
    }

}

