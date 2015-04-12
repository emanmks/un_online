@extends('templates/base')

@section('content')
<section class="wrapper">

	<h3>
		<i class="fa fa-angle-right"></i> Paket Soal {{ $subject->name }} Kode : {{ $code }}
	</h3>

	{{ Form::open(array("url"=>"uploadpackage", "files"=>true, "class" => "form-horizontal")) }}

   <input type="hidden" name="subject_id" value="{{ $subject->id }}">
   <input type="hidden" name="code" value="{{ $code }}">

   <div class="row mt">
      <div class="col-lg-12">
         <input type="submit" class="btn btn-primary" name="Submit">
      </div>
   </div>

   <div class="row mt">
    	<div class="col-lg-6">
    		<div class="content-panel">
    			<h4><i class="fa fa-angle-right"></i> File-File Wacana</h4>
	      		<hr>

	      		<table class="table">
	      			<thead>
	      				<tr>
	      					<th>File</th>
	      				</tr>
	      			</thead>

	      			<tbody>
		      			@for($i = 0; $i < $literature; $i++)
                    <tr>
                       <td><input type="file" class="form-control" name="literatures[]" multiple></td>
                    </tr>
                 @endfor
		      		</tbody>
	      		</table>
    		</div>
    	</div>

    	<div class="col-lg-6">
    		<div class="content-panel">
    			<h4><i class="fa fa-angle-right"></i> File-File Listening</h4>
	      		<hr>

	      		<table class="table">
	      			<thead>
	      				<tr>
	      					<th>File</th>
	      				</tr>
	      			</thead>

	      			<tbody>
	      				@for($i = 0; $i < $listening; $i++)
                  <tr>
                    <td><input type="file" class="form-control" name="listenings[]" multiple></td>
                  </tr>
                @endfor
	      			</tbody>
	      		</table>
    		</div>
    	</div>
   </div>

   <div class="row mt">
    	<div class="col-lg-12">
    		<div class="content-panel">
    			<h4><i class="fa fa-angle-right"></i> File-File Soal</h4>
	      		<hr>

	      		<table class="table">
	      			<thead>
	      				<tr>
	      					<th width="10%">Nomor</th>
	      					<th>File</th>
	      					<th width="10%">Jawaban</th>
	      					<th width="10%">File Wacana Ke-</th>
	      					<th width="10%">File Listening Ke-</th>
	      				</tr>
	      			</thead>

	      			<tbody>
	      				@for($i = 1; $i <= $question; $i++)
                        <tr>
                           <td><input type="text" class="form-control" name="counters" value="{{ $i }}" disabled></td>
                           <td><input type="file" class="form-control" name="questions[]" multiple></td>
                           <td>
                              <select class="form-control" name="answers[]">
                                 <option value="A">A</option>
                                 <option value="B">B</option>
                                 <option value="C">C</option>
                                 <option value="D">D</option>
                                 <option value="E">E</option>
                              </select>
                           </td>
                           <td><input type="text" class="form-control" name="questionliteratures[]" value="0"></td>
                           <td><input type="text" class="form-control" name="questionlistenings[]" value="0"></td>
                        </tr>
                     @endfor
	      			</tbody>
	      		</table>
    		</div>
    	</div>
   </div>

   {{ Form::close() }}

</section>

<script type="text/javascript">
	
	$(document).ready(function(){

		

	})

</script>
    
@stop