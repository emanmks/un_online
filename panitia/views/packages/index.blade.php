@extends('templates/base')

@section('content')
<section class="wrapper">

	<h3>
		<i class="fa fa-angle-right"></i> Paket Soal
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
	      				
	      				<h4><i class="fa fa-angle-right"></i> Tabel Paket Soal</h4>
	      				<hr>


	      				<table class="table">
	      					
	      					<thead>
	      						<tr>
	      							<td>ID</td>
	      							<td>Nama Bidang Studi</td>
	      							<td>Kode Paket Soal</td>
	      							<td>Jumlah Soal</td>
	      							<td width="30%">Aksi</td>
	      						</tr>
	      					</thead>

	      					<tbody>
	      						@forelse($packages as $package)
	      							<tr>
	      								<td>{{ $package->id }}</td>
	      								<td>{{ $package->subject->name }}</td>
	      								<td>{{ $package->code }}</td>
	      								<td>{{ $package->questions->count() }}</td>
	      								<td>
	      									<input type="hidden" id="package-{{ $package->id }}" value="{{ $package->name }}">
	      									<input type="hidden" id="name-{{ $package->id }}" value="{{ $package->name }}">
	      									<a href="{{ URL::to('package') }}/{{ $package->id }}" class="btn btn-xs btn-success"><i class="fa fa-archive"></i> Paket</a>
	      									<a href="#" onclick="showFormUpdate({{ $package->id }})" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Edit</a>
	      									<a href="#" onclick="destroy({{ $package->id }})" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i> Hapus</a>
	      								</td>
	      							</tr>
	      						@empty
	      							<tr>
	      								<td colspan="5">
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
<div id="formCreate" class="modal fade" tabindex="-1" aria-hidden="true">
   <div class="modal-dialog">
       <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 name="myModalLabel">Form Bidang Studi</h3>
            </div>

            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class=" col-xs-3 control-label" for="name">Nama Bidang Studi</label>
                        <div class="col-xs-5">
                            <input type="text" class="form-control" name="name">
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
                <button class="btn btn-primary" onClick="store()" data-dismiss="modal" aria-hidden="true">Simpan</button>
            </div>
       </div>
   </div>
</div>
<!-- End of Form Create  [modal] -->

<!-- Form Create  [modal]
===================================== -->
<div id="formUpdate" class="modal fade" tabindex="-1" aria-hidden="true">
   <div class="modal-dialog">
       <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 name="myModalLabel">Form Update Bidang Studi</h3>
            </div>

            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class=" col-xs-3 control-label" for="updated_name">Nama Bidang Studi</label>
                        <div class="col-xs-5">
                        	<input type="hidden" name="updated_id" value="0">
                            <input type="text" class="form-control" name="updated_name">
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
                <button class="btn btn-primary" onClick="update()" data-dismiss="modal" aria-hidden="true">Simpan</button>
            </div>
       </div>
   </div>
</div>
<!-- End of Form Create  [modal] -->

<script type="text/javascript">
	
	$(document).ready(function(){



	})

	function showFormCreate() {

		$('#formCreate').modal('show');

		$('[name=name]').focus();

	}

	function showFormUpdate(id) {

		$('#formUpdate').modal('show');

		$('[name=updated_name]').val($('#name-'+id).val());
		$('[name=updated_id]').val(id);

	}

	function store() {

		var name = $('[name=name]').val();

		if(name) {

			$.ajax({
				url 		:"{{ URL::to('package') }}",
				type 		:"POST",
				data 		: {name:name},
				success		: function() {

					window.location = "{{ URL::to('package') }}";

				}
			});

		}

	}

	function update() {

		var id = $('[name=updated_id]').val();
		var name = $('[name=updated_name]').val();

		if(id) {

			$.ajax({
				url 		:"{{ URL::to('package') }}/"+id,
				type 		:"PUT",
				data 		: {name:name},
				success		: function() {

					window.location = "{{ URL::to('package') }}";

				}
			});

		}

	}

	function destroy(id) {

		if(confirm("Yakin akan menghapus paket Soal ini?!")) {

			$.ajax({

				url 		:"{{ URL::to('package') }}/"+id,
				type 		:"DELETE",
				success 	: function() {

					window.location = "{{ URL::to('package') }}";

				}

			});

		}

	}

</script>
    
@stop