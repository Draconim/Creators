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
    public static function exportExcel($id){
        $event = Event::find($id);
        $keyList = Event_User_Status::where('event_id', '=',$id)->get();
        $visitorList = array();

        foreach ($keyList as $value) {
            $user = User::find($value->user_id);
            array_push($visitorList, $user);
        }
    }

    public function exportCsv(Request $request, $id)
{

   $event = Event::find($id);

   $fileName = $event->name.'.csv';


   $keyList = Event_User_Status::where('event_id', '=',$id)->get();
   $visitorList = array();

   foreach ($keyList as $value) {
       $user = User::find($value->user_id);
       array_push($visitorList, $user);
   }


        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0",
            "Separator"           => ","
        );

        $columns = array('Név', 'Email', 'Neptun kód', 'Szervezeti egység');

        $callback = function() use($visitorList, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($visitorList as $visitor) {
                $row['Név']  = $visitor->name;
                $row['Email']    = $visitor->email;
                $row['Neptun kód']    = $visitor->neptun_code;
                $row['Szervezeti egység']  = $visitor->department;

                fputcsv($file, array($row['Név'], $row['Email'], $row['Neptun kód'], $row['Szervezeti egység']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
    public function export(Request $request, $id)
    {

        // $event = Event::find($id);


        // $keyList = Event_User_Status::where('event_id', '=',$id)->get();
        // $visitorList = array();
        // foreach ($keyList as $value) {
        //     $user = User::find($value->user_id);
        //     array_push($visitorList, $user);
        // }
        
        //dd($visitorList);
        return Excel::download(new DataExport($id), 'users.xlsx');
    }
    
}

class DataExport implements FromGenerator{

    function __construct($id) {
        $this->id = $id;
    }
    private int $id = 0;


    // function collection(){
    //     $event = Event::find($this->id);


    //     $keyList = Event_User_Status::where('event_id', '=',$this->id)->get();
    //     $visitorIds = array();
    //     foreach ($keyList as $value) {
    //         array_push($visitorIds, $value->user_id);
    //     }
    //     return User::wherein('id', $visitorIds)->get();
    // }

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
        // for ($i = 1; $i <= 100; $i++) {
        //     yield [$i, $i+1, $i+2];
        // }
        for ($i=0; $i < count($visitors); $i++) {
            $status = Status::find($keyList[$i]->status_id); 
            //dd($status);
            yield [
                $visitors[$i]->name,
                $visitors[$i]->email,
                $status->name
            ];
        }
    }
}
