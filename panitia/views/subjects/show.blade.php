@extends('templates/base')

@section('content')
<section class="wrapper">

	<h3>
		<i class="fa fa-angle-right"></i> {{ $subject->name }}
		<span class="pull-right">
			<a href="#" onclick="showFormCreatePackage()" class="btn btn-primary"><i class="fa fa-plus"></i> Tambahkan Paket Soal</a>
		</span>
	</h3>

  	<div class="row">
      	<div class="col-lg-12">
      
	      	<div class="row mt">

	      		<div class="col-lg-12">
	      			@if(Session::has('message'))
                		<div class="alert alert-info alert-dismissable">{{ Session::get('message') }}</div>
            		@endif

	      		</div>
	      		
	      		<div class="col-lg-12">
	      				
	      			<div class="content-panel">
	      				
	      				<h4><i class="fa fa-angle-right"></i> Tabel Paket Soal {{ $subject->name }}</h4>
	      				<hr>


	      				<table class="table">
	      					
	      					<thead>
	      						<tr>
	      							<td>ID</td>
	      							<td>Kode Paket</td>
	      							<td>Jumlah Soal</td>
	      							<td width="30%">Aksi</td>
	      						</tr>
	      					</thead>

	      					<tbody>
	      						@forelse($subject->packages as $package)
	      							<tr>
	      								<td>{{ $package->id }}</td>
	      								<td>{{ $package->code }}</td>
	      								<td>{{ $package->questions->count() }}</td>
	      								<td>
	      									<input type="hidden" id="name-{{ $subject->id }}" value="{{ $subject->name }}">
	      									<a href="{{ URL::to('package') }}/{{ $package->id }}" class="btn btn-xs btn-primary"><i class="fa fa-list"></i> Lihat</a>
	      									<a href="#" onclick="destroy({{ $package->id }})" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i> Hapus</a>
	      								</td>
	      							</tr>
	      						@empty
	      							<tr>
	      								<td colspan="4">
	      									<center>
	      										<span class="label label-danger">Belum Ada Data</span>
	      									</center>
	      								</td>
	      							</tr>
	      						@endforelse
	      					</tbody>

	      				</table>
	      			</div>

	      		</div>
	      	
	      	</div>
		
      	</div>
    </div>

</section>

<!-- Form Create  [modal]
===================================== -->
<div id="formCreatePackage" class="modal fade" tabindex="-1" aria-hidden="true">
   <div class="modal-dialog">
       <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 name="myModalLabel">Paket Soal Baru</h3>
            </div>

            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-xs-3 control-label" for="subject_name">Nama Bidang Studi</label>
                        <div class="col-xs-5">
                            <input type="text" class="form-control" name="subject_name" value="{{ $subject->name }}" disabled>
                            <input type="hidden" name="subject_id" value="{{ $subject->id }}">
                        </div>
                    </div>
                    <div class="form-group">
	                  	<label class="col-xs-3 control-label">Kode Soal</label>
	                  	<div class="col-xs-3">
	                      	<input type="text" class="form-control" name="code">
	                  	</div>
	              	</div>

	              	<div class="form-group">
	                  	<label class="col-xs-3 control-label">Jumlah File Wacana</label>
	                  	<div class="col-xs-3">
	                      	<input type="text" class="form-control" name="literature" value="0">
	                  	</div>
	              	</div>

	              	<div class="form-group">
	                  	<label class="col-xs-3 control-label">Jumlah File Listening</label>
	                  	<div class="col-xs-3">
	                      	<input type="text" class="form-control" name="listening" value="0">
	                  	</div>
	              	</div>

	              	<div class="form-group">
	                  	<label class="col-xs-3 control-label">Jumlah Soal</label>
	                  	<div class="col-xs-3">
	                      	<input type="text" class="form-control" name="question" value="0">
	                  	</div>
	              	</div>
                </form>
            </div>

            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
                <button class="btn btn-primary" onClick="createPackage()" data-dismiss="modal" aria-hidden="true">Mulai</button>
            </div>
       </div>
   </div>
</div>
<!-- End of Form Create  [modal] -->

<script type="text/javascript">
	
	$(document).ready(function(){



	})

	function showFormCreatePackage() {

		$('#formCreatePackage').modal('show');

	}

	function createPackage() {

		var subject_id 			= $('[name=subject_id]').val();
		var code 				= $('[name=code]').val();
		var literature 			= $('[name=literature]').val();
		var listening			= $('[name=listening]').val();
		var question 			= $('[name=question]').val();

		if(subject_id && code && question > 0) {

			window.location = "{{ URL::to('package') }}/create?subject_id="+subject_id+"&code="+code+
							"&literature="+literature+"&listening="+listening+"&question="+question;

		} else {

			window.alert("Upps tidak dapat diproses!!");

		}

	}

	function destroy(id) {

		if(confirm("Yakin akan menghapus paket Soal ini?!")) {

			$.ajax({

				url 			:"{{ URL::to('package') }}/"+id,
				type 			:"DELETE",
				success 		: function() {

					window.location = "{{ URL::to('subject') }}/{{ $subject->id }}";

				}

			});

		}

	}

</script>
    
@stop