@extends('templates/base')

@section('content')
<section class="wrapper">

	<h3>
		<i class="fa fa-angle-right"></i> Form Paket Soal Baru
		<span class="pull-right">
			<button class="btn btn-primary" onclick="store()"><i class="fa fa-floppy-o"></i></button>
		</span>
	</h3>

	<form id="pusingForm" action="" enctype="multipart/form-data" class="form-horizontal style-form">

  	<div class="row mt">
      	<div class="col-lg-12">
      
	      	<div class="form-panel">
	      		<h4 class="mb"><i class="fa fa-angle-right"></i> Informasi Umum</h4>
      			<div class="form-group">
                  	<label class="col-sm-2 col-sm-2 control-label">Bidang Studi</label>
                  	<div class="col-sm-4">
                      	<input type="hidden" name="subject_id" value="{{ $subject->id }}">
                      	<input type="text" class="form-control" name="subject_name" value="{{ $subject->name }}" disabled>
                  	</div>
              	</div>

              	<div class="form-group">
                  	<label class="col-sm-2 col-sm-2 control-label">Kode Soal</label>
                  	<div class="col-sm-2">
                      	<input type="text" class="form-control" name="code">
                  	</div>
              	</div>

              	<div class="form-group">
                  	<label class="col-sm-2 col-sm-2 control-label">Jumlah File Wacana</label>
                  	<div class="col-sm-2">
                      	<input type="text" class="form-control" name="literature" value="0">
                  	</div>
              	</div>

              	<div class="form-group">
                  	<label class="col-sm-2 col-sm-2 control-label">Jumlah File Listening</label>
                  	<div class="col-sm-2">
                      	<input type="text" class="form-control" name="listening" value="0">
                  	</div>
              	</div>

              	<div class="form-group">
                  	<label class="col-sm-2 col-sm-2 control-label">Jumlah Soal</label>
                  	<div class="col-sm-2">
                      	<input type="text" class="form-control" name="question" value="0">
                  	</div>
              	</div>
	      	</div>
		
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

	      			<tbody id="literature_lists">
		      			
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

	      			<tbody id="listening_lists">
	      				
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

	      			<tbody id="question_lists">
	      				
	      			</tbody>
	      		</table>
    		</div>
    	</div>
    </div>

    </form>

</section>

<script type="text/javascript">
	
	$(document).ready(function(){

		$('[name=code]').focus();

		$('[name=code]').keypress(function(e) {
			if(e.keyCode == 13) {
				$('[name=literature]').focus();
			}
		})

		$('[name=literature]').keypress(function(e){
            
			var html = '';

            if(e.keyCode == 13 && this.value != '0') {


                for (var i = this.value - 1; i >= 0; i--) {
                	
                	html += '<tr>';
                		html += '<td>';
                			html += '<input type="file" class="form-control" name="literatures" multiple>';
                		html += '</td>';
                	html += '</tr>';

                };

                $('#literature_lists').append(html);

                $('[name=listening]').focus();

            }else if(e.keyCode == 13) {
            	$('[name=listening]').focus();
            }

        });

        $('[name=listening]').keypress(function(e){
            
			var html = '';

            if(e.keyCode == 13 && this.value != '0') {


                for (var i = this.value - 1; i >= 0; i--) {
                	
                	html += '<tr>';
                		html += '<td>';
                			html += '<input type="file" class="form-control" name="listenings" multiple>';
                		html += '</td>';
                	html += '</tr>';

                };

                $('#listening_lists').append(html);

                $('[name=question]').focus();

            }else if(e.keyCode == 13) {
            	$('[name=question]').focus();
            }

        });

        $('[name=question]').keypress(function(e){
            
			var html = '';

            if(e.keyCode == 13 && this.value != '0') {


                for (var i = 1; i <= this.value; i++) {
                	
                	html += '<tr>';
                		html += '<td>';
                			html += '<input type="text" class="form-control" name="counters" value="'+i+'" disabled>';
                		html += '</td>';

                		html += '<td>';
                			html += '<input type="file" class="form-control" name="questions" multiple>';
                		html += '</td>';

                		html += '<td>';
                			html += '<select class="form-control" name="answers">'+
                					'<option value="1">A</option><option value="2">B</option>'+
	      							'<option value="3">C</option>'+
	      							'<option value="4">D</option>'+
	      							'<option value="5">E</option>'+
	      							'</select>';
                		html += '</td>';

                		html += '<td>';
                			html += '<input type="text" class="form-control" name="questionliteratures" value="0">';
                		html += '</td>';

                		html += '<td>';
                			html += '<input type="text" class="form-control" name="questionlistenings" value="0">';
                		html += '</td>';

                	html += '</tr>';

                };

                $('#question_lists').append(html);

            }

        });

	})

	function store() {

		var subject_id 			= $('[name=subject_id]').val();
		var code 				= $('[name=code]').val();
		var literature 			= $('[name=literature]').val();
		var listening			= $('[name=listening]').val();
		var question 			= $('[name=question]').val();

		var literatures 		= [];
		var listenings 			= [];
		var questions 			= [];
		var answers 			= [];
		var questionliteratures = [];
		var questionlistenings 	= [];

		$('[name=literatures]').each(function(){
            literatures.push(this.value);
        });

        $('[name=listenings]').each(function(){
            listenings.push(this.value);
        });

        $('[name=questions]').each(function(){
            questions.push(this.value);
        });

        $('[name=answers]').each(function(){
            answers.push(this.value);
        });

        $('[name=questionliteratures]').each(function(){
            questionliteratures.push(this.value);
        });

        $('[name=questionlistenings]').each(function(){
            questionlistenings.push(this.value);
        });

        $('#pusingForm').submit();

		if(code != ''  && questions.length == question) {

			/*$.ajax({
				url 		:"{{ URL::to('package') }}",
				type 		:"POST",
				data 		: {
							subject_id		: subject_id,
							code 			: code,
							literature 		: literature,
							listening 		: listening,
							question 		: question,
							literatures 	: literatures,
							listenings 		: listenings,
							questions 		: questions,
							answers			: answers,
							questionliteratures	: questionliteratures,
							questionlistenings 	: questionlistenings
				}
			});*/

			$('#pusingForm').submit();

		}

	}

</script>
    
@stop