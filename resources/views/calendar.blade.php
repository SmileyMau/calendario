
@extends('template')
@section ('content')

<div class="pd-20 card-box mb-30">
	<div class="calendar-wrap">
		<div id="calendar"></div>
	</div>
	<!-- calendar modal -->
	<div
		id="modal-view-event"
		class="modal modal-top fade calendar-modal"
	>
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body">
					<h4 class="h4">
						<span class="event-icon weight-400 mr-3"></span
						><span class="event-title"></span>
					</h4>
					<div class="event-body"></div>
				</div>
				<div class="modal-footer">
					<button
						type="button"
						class="btn btn-primary"
						data-dismiss="modal"
					>
						Close
					</button>
				</div>
			</div>
		</div>
	</div>
	
	<div
		id="modal-view-event-add"
		class="modal modal-top fade calendar-modal"
	>
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<form id="add-event" method="post" action="{{route('evento.store')}}">
					@csrf
					<div class="modal-body">
						<h4 class="text-blue h4 mb-10">Añadir evento</h4>
						<div class="form-group">
							<label>Titulo del evento</label>
							<input type="text" class="form-control" name="titulo" />
						</div>
						<div class="form-group">
							<label>Fecha inicial del evento</label>
							<input type="text" class="form-control datetimepicker" name="fecha_ini" />
						</div>
						<div class="form-group">
							<label>Fecha final del evento</label>
							<input type="text" class="form-control datetimepicker" name="fecha_fin" />
						</div>
						<div class="form-group">
							<label>Descripcion del evento</label>
							<textarea class="form-control" name="descripcion"></textarea>
						</div>
						<div class="form-group">
							<label>Color</label>
							<input type="color" class="form-control" name="color" />
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">
							Guardar
						</button>
						<button
							type="button"
							class="btn btn-primary"
							data-dismiss="modal"
						>
							Cerrar
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section ('js')
<script>
	
(function () {
	"use strict";
	// ------------------------------------------------------- //
	// Calendar
	// ------------------------------------------------------ //
	jQuery(function () {
		// page is ready
		jQuery("#calendar").fullCalendar({
			themeSystem: "bootstrap4",
			// emphasizes business hours
			businessHours: false,
			defaultView: "month",
			// event dragging & resizing
			editable: true,
			
			// header
			header: {
				left: "title",
				center: "month,agendaWeek,agendaDay",
				right: "today prev,next",
			},
			locale: 'es',
			events: [
				@foreach ($eventos as $evento)
				{
					title: "{{$evento->titulo}}",
					description:
						"{{$evento->descripcion}}",
					start: "{{$evento->fecha_ini}}",
					end: "{{$evento->fecha_fin}}",
					backgroundColor: '{{$evento->color}}',
					borderColor: '{{$evento->color}}',
				},
				@endforeach
				
			],
			dayClick: function () {
				jQuery("#modal-view-event-add").modal();
			},
			eventClick: function (event, jsEvent, view) {
				jQuery(".event-icon").html("<i class='fa fa-" + event.icon + "'></i>");
				jQuery(".event-title").html(event.title);
				jQuery(".event-body").html(event.description);
				jQuery(".eventUrl").attr("href", event.url);
				jQuery("#modal-view-event").modal();
			},
		});
	});
})(jQuery);

</script>
@endsection
