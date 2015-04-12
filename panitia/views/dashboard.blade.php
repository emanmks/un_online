@extends('templates/base')

@section('content')
<section class="wrapper">

  	<div class="row">
      	<div class="col-lg-12">
      
	      	<div class="row mtbox">
	      		<div class="col-md-2 col-sm-2 col-md-offset-2 box0">
	      			<div class="box1">
			  			<span class="li_data"></span>
			  			<h3>{{ $subjects }}</h3>
	      			</div>
			  			<p>Jumlah Bidang Studi yang Ikut Ujian Nasional CBT</p>
	      		</div>

	      		<div class="col-md-2 col-sm-2 box0">
	      			<div class="box1">
			  			<span class="li_data"></span>
			  			<h3>{{ $packages }}</h3>
	      			</div>
			  			<p>Total Paket Soal Ujian</p>
	      		</div>

	      		<div class="col-md-2 col-sm-2 box0">
	      			<div class="box1">
			  			<span class="li_data"></span>
			  			<h3>{{ $users }}</h3>
	      			</div>
			  			<p>Calon Peserta Ujian</p>
	      		</div>

	      		<div class="col-md-2 col-sm-2 box0">
	      			<div class="box1">
			  			<span class="li_data"></span>
			  			<h3>{{ $examinations }}</h3>
	      			</div>
			  			<p>Peserta yang telah mengikuti Ujian</p>
	      		</div>
	      	
	      	</div>

	      	<div class="row mtbox">
	      		
	      		<br/><br/><br/><br/>
	      	
	      	</div>
		
      	</div>
    </div>

</section>

{{ HTML::script('assets/js/jquery.dcjqaccordion.2.7.js') }}
{{ HTML::script('assets/js/jquery.scrollTo.min.js') }}
{{ HTML::script('assets/js/jquery.nicescroll.js') }}
{{ HTML::script('assets/js/jquery.sparkline.js') }}
{{ HTML::script('assets/js/common-scripts.js') }}

    
@stop