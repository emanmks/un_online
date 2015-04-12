@extends('templates/login')

@section('content')
	
	<form class="form-login" action="{{ URL::to('login') }}" method="POST">
        <h2 class="form-login-heading">Login Peserta Ujian</h2>
        <div class="login-wrap">

            <input type="text" name="username" class="form-control" placeholder="NIS" autofocus>
            <br>
            <input type="password" name="password" class="form-control" placeholder="PIN">
            <br>
            <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> LOGIN</button>
            <br>

        </div>

    </form>

@stop