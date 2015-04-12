@extends('templates/base')

@section('content')

<section class="wrapper">

  	<div class="row">
  		
  		<div class="col-lg-12">
  			

  			@foreach(array_chunk($packages->getCollection()->all(), 4) as $row)
		  		<div class="row mtbox">
		  			<div class="col-md-2 col-sm-2"></div>
		  			@foreach($row as $package)
						<a href="{{ URL::to('paket') }}/{{ $package->id }}">
								
							<div class="col-md-2 col-sm-2 box0">
								<div class="box1">
					  				<span class="text-primary fa fa-book"></span>
					  				<h4>{{ $package->code }}</h4>
								</div>
								<p>{{ $package->questions->count() }} Soal</p>
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