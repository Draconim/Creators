@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="d-flex flex-column mx-auto">
            @if($status == 'success')
                <div class="d-flex justify-content-center align-items-center">
                    <img src="image\success.svg" alt="sikeres bejelentkezés" height="300px" class="mt-0 mx-auto">
                </div>
                <div class="d-flex justify-content-center align-items-center mt-3 h4">
                    Sikeresen bejelentkezett az eseményre!
                </div>
            @elseif($status == 'isAdmin')
                <div class="d-flex justify-content-center align-items-center">
                    <img src="image\user.svg" alt="sikeres bejelentkezés" height="300px" class="mt-0 mx-auto">
                </div>
                <div class="d-flex justify-content-center align-items-center mt-3 h4">
                    Csak felhasználó jelentkezhet eseményekre!
                </div>
            @elseif($status == 'checked')
                <div class="d-flex justify-content-center align-items-center">
                    <img src="image\warning.png" alt="sikeres bejelentkezés" height="300px" class="mt-0 mx-auto">
                </div>
                <div class="d-flex justify-content-center align-items-center mt-3 h4">
                    Már jelentkezett az eseményre!
                </div>
            @elseif($status == 'outdated')
                <div class="d-flex justify-content-center align-items-center">
                    <img src="image\error.png" alt="sikeres bejelentkezés" height="300px" class="mt-0 mx-auto">
                </div>
                <div class="d-flex justify-content-center align-items-center mt-3 h4">
                    Az esemény már elmúlt!
                </div>
            @elseif($status == 'checkedWithoutApply')
                <div class="d-flex justify-content-center align-items-center">
                    <img src="image\warning.png" alt="sikeres bejelentkezés" height="300px" class="mt-0 mx-auto">
                </div>
                <div class="d-flex justify-content-center align-items-center mt-3 h4">
                    Bejelentkezés nélkül jelent meg!
                </div>
            @endif
        </div>
    </div>
@endsection