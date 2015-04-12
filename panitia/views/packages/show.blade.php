@extends('templates/base')

@section('content')

{{ HTML::style('assets/js/fancybox/jquery.fancybox.css') }}

<section class="wrapper">

	<h3>
		<i class="fa fa-angle-right"></i> Paket Soal Kode : {{ $package->code }} | Bidang Studi : {{ $package->subject->name }}
	</h3>

  	<div class="row mt">
      	
  	    <table class="table">
            <thead>
                <tr>
                    <th width="30%">Screenshoot Soal</th>
                    <th width="30%">Screenshoot Wacana</th>
                    <th width="30%">Previce Audio</th>
                    <th>Kunci Jawaban</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($package->questions as $question)
                    <tr>
                        <td>
                            <a class="fancybox" href="{{ URL::to('assets/questions') }}/{{ $question->picture->filename }}"><img class="image-box img-responsive" src="{{ URL::to('assets/questions') }}/{{ $question->picture->filename }}" alt=""></a>
                            <div class="overlay"></div>
                        </td>
                        <td>
                            @if($question->literature_id > 0)
                                <a class="fancybox" href="{{ URL::to('assets/literatures') }}/{{ $question->literature->filename }}"><img class="image-box img-responsive" src="{{ URL::to('assets/literatures') }}/{{ $question->literature->filename }}" alt=""></a>
                                <div class="overlay"></div>
                            @else
                                <h1>Not Available</h1>
                            @endif
                        </td>
                        <td>
                            @if($question->listening_id > 0)
                                <audio controls>
                                    <source src="{{ URL::to('assets/listenings') }}/{{ $question->listening->filename }}" type="audio/mpeg">
                                </audio>
                            @else
                                <h1>Not Available</h1>
                            @endif                        
                        </td>
                        <td>
                            <h1 id="answer-{{ $question->id }}">{{ $question->answer }}</h1>
                            <select class="form-control" name="answers-{{ $question->id }}" onchange="updateAnswer({{ $question->id }})">
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                            </select>
                            <script type="text/javascript">
                                $("[name=answers-{{ $question->id }}]").val("{{ $question->id }}");
                                $("[name=answers-{{ $question->id }}]").hide();
                            </script>
                        </td>
                        <td>
                            <a href="#" onclick="showFormUpdateAnswer({{ $question->id }})" class="btn btn-primary"><i class="fa fa-edit"></i> Koreksi</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
      	
    </div>

</section>

{{ HTML::script('assets/js/fancybox/jquery.fancybox.js') }}

<script type="text/javascript">
    $(function() {
        jQuery(".fancybox").fancybox();
    });

    function showFormUpdateAnswer(id) {

        $("[name=answer-"+id+"]").hide();
        $("[name=answers-"+id+"]").show();

    }

    function updateAnswer(id) {

        var answer      = $("[name=answers-"+id+"]").val();

        if(confirm("Yakin akan mengupdate Kunci Jawaban")) {

            $.ajax({
                url         : "{{ URL::to('question') }}/"+id,
                type        : "PUT",
                data        : {answer:answer},
                success     : function() {
                    window.location = "{{ URL::to('package') }}/{{ $package->id }}";
                }
            });

        }
    }

</script>
    
@stop