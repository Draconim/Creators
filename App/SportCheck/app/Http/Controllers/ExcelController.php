<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Status;
use App\Models\User;
use App\Models\Event_User_Status;
use App\Exports\visitorExport;
use App\Invoice;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Excel;
use Generator;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromGenerator;



class ExcelController extends Controller
{

    public function export(Request $request, $id)
    {

        $event = Event::find($id);
        return Excel::download(new DataExport($id), $event->name.'.xlsx');
    }
    
}

class DataExport implements FromGenerator{

    function __construct($id) {
        $this->id = $id;
    }
    private int $id = 0;

    use Exportable;

    public function generator(): Generator
    {
        $keyList = Event_User_Status::where('event_id', '=',$this->id)->get();
        $visitorIds = array();
        foreach ($keyList as $value) {
            array_push($visitorIds, $value->user_id);
        }
        $visitors = User::wherein('id', $visitorIds)->get();

        yield ['Név', 'Email', 'Státusz'];
        for ($i=0; $i < count($visitors); $i++) {
            $status = Status::find($keyList[$i]->status_id); 
            yield [
                $visitors[$i]->name,
                $visitors[$i]->email,
                $status->name
            ];
        }
    }
}
