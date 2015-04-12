@extends('templates/base')

@section('content')

<section class="wrapper">

  	<div class="row">
  		
  		<div class="col-lg-12">
  			

  			@foreach(array_chunk($subjects->all(), 4) as $row)
		  		<div class="row mtbox">
		  			<div class="col-md-2 col-sm-2"></div>
		  			@foreach($row as $subject)
						<a href="{{ URL::to('bidangstudi') }}/{{ $subject->id }}">
								
							<div class="col-md-2 col-sm-2 box0">
								<div class="box1">
					  				<span class="text-warning fa fa-book"></span>
					  				<h4>{{ $subject->name }}</h4>
								</div>
								<p>{{ $subject->packages->count() }} Paket</p>
							</div>

						</a>
					@endforeach
					<div class="col-md-2 col-sm-2"></div>
				</div>
		  	@endforeach


  		</div>

  	</div>

</section>
    
@stop