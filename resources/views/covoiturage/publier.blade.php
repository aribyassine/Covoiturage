@extends('app')
@section('content')
<link href="{{ asset('DateTimePicker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" media="screen">

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

					@if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
							<strong>Whoops!</strong> Une erreur est survenue.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('covoiturage/store') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="panel panel-default">
                        	<div class="panel-heading"><h4>Itinéraire <span class="glyphicon glyphicon-road"></span></h4></div>
                        	<div class="panel-body">
                        		<div class="form-group">
                            		<div class="input-group col-md-offset-2 col-md-8">
                                        <span class="input-group-addon">Point de départ</span>
                                        <input id="autocomplete_d" type="text" class="form-control" required>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span></span>
                                    </div>
                            	</div>
                            	<input type="hidden"  id="ville_d">
                                <input type="hidden"  id="wilaya_d">
                                <input type="hidden"  id="geoloc_d">

                            	<div class="form-group">
                            		<div class="input-group col-md-offset-2 col-md-8">
                                        <span class="input-group-addon">Point d'arrivée &nbsp;</span>
                                        <input id="autocomplete_a" type="text" class="form-control" required>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span></span>
                                    </div>
                            	</div>
                            	<input type="hidden"  id="ville_a">
                                <input type="hidden"  id="wilaya_a">
                                <input type="hidden"  id="geoloc_a">

                                <div class="form-group">
                                    <div class="input-group date col-md-offset-2 col-md-8" id="form_datetime">
                                        <span class="input-group-addon">Date et horaire &nbsp;</span>
                                        <input class="form-control" type="text" required readonly>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                </div>
                            </div>
                        </div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									S'inscrire
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('maps_onload')
    onload="initialize()"
@endsection

@section('maps_script')
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places&language=fr&region=dz"></script>
@endsection

@section('script_maps_autocomplete')
    <script type="text/javascript" src="{{ asset('DateTimePicker/js/bootstrap-datetimepicker.js')}}" charset="UTF-8"></script>
    <script type="text/javascript" src="{{ asset('DateTimePicker/js/locales/bootstrap-datetimepicker.fr.js')}}" charset="UTF-8"></script>

	<script>
	var now = new Date();
	var yyyy   = now.getFullYear().toString();
	var yyyyend   = (now.getFullYear()+1).toString();
    var mm     = (now.getMonth()+1).toString();
    var dd     = now.getDate().toString();
    var hh     = ((now.getHours()+6)%24).toString();
    var ii     = now.getMinutes().toString();
    if(now.getHours()+6>24){dd++}

    $('#form_datetime').datetimepicker({
            language:  'fr',
            format: 'yyyy-mm-dd hh:ii',
            weekStart: 7,
            todayBtn:  1,
            autoclose: true,
            startDate: yyyy+"-"+mm+"-"+dd+" "+hh+":"+ii,
            endDate: yyyyend+"-"+mm+"-"+dd+" "+hh+":"+ii,
            minuteStep: 30
        });
    </script>

    <script src="{{asset('js/maps_autocomplete.js')}}"></script>
@endsection