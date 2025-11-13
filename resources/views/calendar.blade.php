@extends('template')
@section('content')

<div class="card mb-4 p-4">
	<div class="calendar-wrap mb-4">
		<div id="calendar"></div>
	</div>

	<!-- Modal: Ver evento -->
	<div id="modal-view-event" class="modal fade" tabindex="-1" aria-labelledby="viewEventLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body">
					<h4 class="h4">
						<span class="event-icon fw-normal me-2"></span>
						<span class="event-title"></span>
					</h4>
					<div class="event-body mt-3"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-bs-dismiss="modal">
						Cerrar
					</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal: Añadir evento -->
	<div id="modal-view-event-add" class="modal fade" tabindex="-1" aria-labelledby="addEventLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<form id="add-event" method="post" action="{{ route('evento.store') }}">
					@csrf
					<div class="modal-body">
						<h4 class="text-primary h4 mb-3">Añadir evento</h4>

						<div class="mb-3">
							<label class="form-label">Título del evento</label>
							<input type="text" class="form-control" name="titulo" required>
						</div>

						<div class="mb-3">
							<label class="form-label">Fecha inicial del evento</label>
							<input type="text" class="form-control datetimepicker" name="fecha_ini" required>
						</div>

						<div class="mb-3">
							<label class="form-label">Fecha final del evento</label>
							<input type="text" class="form-control datetimepicker" name="fecha_fin" required>
						</div>

						<div class="mb-3">
							<label class="form-label">Descripción del evento</label>
							<textarea class="form-control" name="descripcion" rows="3"></textarea>
						</div>

						<div class="mb-3">
							<label class="form-label">Color</label>
							<input type="color" class="form-control form-control-color" name="color" value="#3788d8">
						</div>
					</div>

					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Guardar</button>
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
<script>
(function () {
	"use strict";

	jQuery(function () {
		jQuery("#calendar").fullCalendar({
			themeSystem: "bootstrap4", 
			businessHours: false,
			defaultView: "month",
			editable: true,
			header: {
				left: "title",
				center: "month,agendaWeek,agendaDay",
				right: "today prev,next",
			},
			locale: 'es',
			events: [
				@foreach ($eventos as $evento)
				{
					title: "{{ $evento->titulo }}",
					description: "{{ $evento->descripcion }}",
					start: "{{ $evento->fecha_ini }}",
					end: "{{ $evento->fecha_fin }}",
					backgroundColor: "{{ $evento->color }}",
					borderColor: "{{ $evento->color }}",
				},
				@endforeach
			],
			dayClick: function () {
				let modalAdd = new bootstrap.Modal(document.getElementById('modal-view-event-add'));
				modalAdd.show();
			},
			eventClick: function (event, jsEvent, view) {
				jQuery(".event-icon").html("<i class='fa fa-" + (event.icon || 'calendar') + "'></i>");
				jQuery(".event-title").html(event.title);
				jQuery(".event-body").html(event.description);
				let modalView = new bootstrap.Modal(document.getElementById('modal-view-event'));
				modalView.show();
			},
		});
	});
})();
</script>
@endsection
