<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Document</title>
</head>
<body>
    <table>
        <th><h3>{{$event->name}}</h3></th>
        <tr>
            <td><h3>Esemény leírása:</h3></td>
        </tr>
        <tr>
            <td><div style="font-size:25px">{{$event->description}}</div></td>
        </tr>
        <th>
            <div style="margin-top:30px">
                {{QrCode::size(420)->generate("http://127.0.0.1:8000/events/checkin/".$event->code);}}
            </div>
        </th>
    </table>
    
</body>
</html>