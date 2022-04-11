<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bejelentkezés</title>
</head>
<body>
    @if($status == 'success')
        Sikeresen bejelentkezett az eseményre!

    @elseif($status == 'checked')
        Már jelentkezett az eseményre!
    @elseif($status = 'checkedWithoutApply')
        Bejelentkezés nélkül jelent meg!
    @endif
</body>
</html>