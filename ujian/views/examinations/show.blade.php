@extends('templates/base')

@section('content')

<section class="wrapper">

  	<div class="row">
  		
  		<div class="col-lg-12">
  			

  			<div class="row mt">
  				
  				<div class="col-lg-8 col-lg-offset-2">
  					
  					<center>
  						
  						<h1>Selamat Anda Telah Menyelesaikan Ujian {{ $examination->package->subject->name }}</h1>

  						<h1>Jumlah Jawaban Benar : {{ $examination->correct }}</h1>

  						<h1>POIN : {{ round(($examination->correct/$examination->answers->count())*100) }}</h1>


  						<a href="{{ URL::to('logout') }}" class="btn btn-danger"><i class="fa fa-logout"></i> Keluar</a>
  					</center>



  				</div>

  			</div>
  			

  		</div>

  	</div>

</section>
    
@stop