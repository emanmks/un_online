@extends('templates/base')

@section('content')

{{ HTML::style('assets/icheck/css/all.css') }}

<section class="wrapper">

    <div class="row">
        <div class="col-lg-12">
            <center>
                <h3>{{ $package->subject->name }} | {{ $package->code }}</h3>
                <h3 id="timer">00:00:00</h3>
            </center>
        </div>

        <div class="col-lg-12">
            <center>
                <button id="btn-start" class="btn btn-danger" onclick="startUP()">Mulai</button>
                <button id="btn-end" class="btn btn-primary" onclick="endUP()">Selesai</button>
                <button id="btn-submit" class="btn btn-primary" onclick="submit()">Submit Jawaban</button>
            </center>
        </div>
    </div>

    <br/>

    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    <input type="hidden" name="package_id" value="{{ $package->id }}">

    <div class="row">
        <div class="col-lg-8 col-lg-offset-1">
            <?php $counter = 1 ?>
            @foreach($questions as $question)
                <div class="well" id="question-{{ $counter }}">
                    <div class="image-box">
                        @if($question->literature_id > 0)
                            <img class="img-question" src="{{ URL::to('assets/literatures') }}/{{ $question->literature->filename }}">
                        @endif
                        <img class="img-question" src="{{ URL::to('assets/questions') }}/{{ $question->picture->filename }}">
                    </div>

                    @if($question->listening_id > 0)

                        <audio controls>
                            <source src="{{ URL::to('assets/listenings') }}/{{ $question->listening->filename }}" type="audio/mpeg">
                        </audio>

                    @endif

                    <br/>

                    <center>
                        <label class="label-control"><input type="radio" name="options-{{ $counter }}" value="{{ $counter }}#A"> A </label> &nbsp;&nbsp;
                        <label class="label-control"><input type="radio" name="options-{{ $counter }}" value="{{ $counter }}#B"> B </label> &nbsp;&nbsp;
                        <label class="label-control"><input type="radio" name="options-{{ $counter }}" value="{{ $counter }}#C"> C </label> &nbsp;&nbsp;
                        <label class="label-control"><input type="radio" name="options-{{ $counter }}" value="{{ $counter }}#D"> D </label> &nbsp;&nbsp;
                        <label class="label-control"><input type="radio" name="options-{{ $counter }}" value="{{ $counter }}#E"> E </label> &nbsp;&nbsp;
                    </center>
                </div>
                <?php $counter++; ?>
            @endforeach
                <div class="well" id="panel">
                    <button class="btn btn-info" onclick="showPrev()"><i class="fa fa-arrow-left"></i> Sebelumnya</button>
                    <button class="btn btn-info pull-right" onclick="showNext()"><i class="fa fa-arrow-right"></i> Selanjutnya</button>
                </div>
        </div>
        <div class="col-lg-3">
            <?php $counter = 1 ?>
            <table class="table">
                
                @foreach(array_chunk($questions->all(), 4) as $row)
                    <tr>
                    @foreach($row as $question)

                        <td><button class="btn btn-xs btn-success" id="panel-answer-{{ $counter }}" onclick="showMe({{ $counter }})">{{ $counter }} : </button></td>
                        <?php $counter++; ?>

                    @endforeach
                    </tr>
                @endforeach

            </table>
            
        </div>
    </div>

</section>
    
{{ HTML::script('assets/icheck/js/icheck.js') }}
{{ HTML::script('assets/js/moment.js') }}

<script type="text/javascript">

    var answers = [];
    var position = 1;
    
    $(function() {

        $('#btn-end').hide();
        $('#btn-submit').hide();

        $('.well').hide();

        $('#panel').show();

        $('input').iCheck({
            checkboxClass:'icheckbox_flat-blue',
            radioClass:'iradio_flat-blue'
        });

        $('input').on("ifClicked", function(){
            
            var answ = this.value;
            var answe = answ.split("#");

            answers[answe[0]-1] = answe[1];

            console.log(answers);

            $("#panel-answer-"+answe[0]).html(answe[0]+" => "+answe[1]);
        });

        answer_length = parseInt("{{ $questions->count() }}");

        for(var i = 0; i < answer_length; i++) {

            answers.push("");

        }

        console.log(answers);
    });

    function startUP() {

        $('.well').hide();
        $('#panel').show();
        $('#question-'+position).show();

        $('#btn-start').hide();
        $('#btn-end').show();

        runTimer();
    }

    function runTimer() {

        var time = 3600;
        var duration = moment.duration(time * 1000, 'milliseconds');
        var interval = 1000;

        setInterval(function(){
            duration = moment.duration(duration.asMilliseconds() - interval, 'milliseconds');
            //show how many hours, minutes and seconds are left
            
            if(time > 0) {
                $('#timer').text(moment(duration.asMilliseconds()).format('mm:ss'));
                time -= 1;
            } else {
                clearInterval();
                $('#timer').text("Waktu Habis");
                endUP();
            }
            

            }, interval);

    }

    function endUP() {

        $('.well').hide();

        $('#btn-start').hide();
        $('#btn-end').hide();
        $('#btn-submit').show();

    }

    function showPrev() {

        position -= 1;

        $('.well').hide();
        $('#panel').show();
        $('#question-'+position).show();

    }

    function showNext() {

        position += 1;

        $('.well').hide();
        $('#panel').show();
        $('#question-'+position).show();

    }

    function showMe(id) {

        $('.well').hide();

        $('#panel').show();
        $('#question-'+id).show();

        position = id;

    }

    function submit() {

        var package_id  = $('[name=package_id]').val();
        var user_id     = $('[name=user_id]').val();

        if(confirm("Anda Akan Mengirim Jawaban Anda ke Server, Yakin akan melanjutkan?!")) {

            $.ajax({
                url         : "{{ URL::to('ujian') }}",
                type        : "POST",
                data        : {package_id:package_id,user_id:user_id,answers:answers},
                success     : function(response) {

                    window.location = "{{ URL::to('ujian') }}/"+response.id;

                }
            })

        }

    }

</script>
    
@stop