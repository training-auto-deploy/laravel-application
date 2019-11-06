@extends('user.layout.main')

@section('title', 'Lịch của bạn')

@section('content')

<div class="home">
	<div class="breadcrumbs_container">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="breadcrumbs">
						<ul>
							<li><a href="index.html">Home</a></li>
							<li>Blog</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>			
</div>



<div class="blog">
	<div class="row">
		<div class="col-9">
			<div id='calendar'></div>
		</div>
		<div class="col-3">
			<form id="time">
				<h4 id="selectedDate">
					{{ $today }}
				</h4>
				<div class="courses_search_container mr-3 mb-2 mt-2">
					<div class="courses_search_form d-flex flex-row align-items-center justify-content-start">
						<div class="col-2">Từ</div>
						<select class="col-10 courses_search_select courses_search_input" id="from-time">
							@foreach($hours as $hour)
								<option value="{{ $hour }}">{{ $hour }}:00</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="courses_search_container mr-3 mb-2 mt-0">
					<div class="courses_search_form d-flex flex-row align-items-center justify-content-start">
						<div class="col-2">Đến</div>
						<select class="col-10 courses_search_select courses_search_input" id="to-time">
							@foreach($hours as $hour)
								<option value="{{ $hour }}">{{ $hour }}:00</option>
							@endforeach
						</select>
					</div>
				</div>
				<button class="btn btn-success" type="button" id="add_time">Thêm khoảng giờ</button>
			</form>
		</div>
	</div>
</div>

@endsection

@section('css')
<link href='https://unpkg.com/@fullcalendar/core@4.3.1/main.min.css' rel='stylesheet' />
<link href='https://unpkg.com/@fullcalendar/daygrid@4.3.0/main.min.css' rel='stylesheet' />
<link href='https://unpkg.com/@fullcalendar/timegrid@4.3.0/main.min.css' rel='stylesheet' />
<style type="text/css">
	.home {
	    width: 100%;
	    height: 182px;
	}
	.courses_search_input {
	    width: 80px;
	}

	.courses_search_container {
	     padding-left: 0; 
	}
	#selectedDate {
	     margin-top: 3.5rem;
	     margin-bottom: 0;
	}
	.pick-time {
		margin-top: 100px;
	}
	.fc-event{
	    background-color: #14bdee;
	    color: #FFF !important;
	}
	.fc-addEventButton-button {
		display: none;
	}
</style>
@endsection

@section('js')
  <script src='https://unpkg.com/@fullcalendar/core@4.3.1/locales-all.js'></script>
<script src='https://unpkg.com/@fullcalendar/core@4.3.1/main.min.js'></script>
<script src='https://unpkg.com/@fullcalendar/interaction@4.3.0/main.min.js'></script>
<script src='https://unpkg.com/@fullcalendar/daygrid@4.3.0/main.min.js'></script>

<script>

    $(function () {
    	var selectedDate = '{{ $today }}';
	    var events = [
		];

		var calendarEl = document.getElementById('calendar');

	    var calendar = new FullCalendar.Calendar(calendarEl, {
			plugins: [ 'interaction', 'dayGrid', 'timeGrid' ],
			defaultView: 'dayGridMonth',
			defaultDate: '{{ $today }}',
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'addEventButton,saveCalendar'
			},
			events: [],
			locale: 'vi',
			dateClick: function(event) {
			    selectedDate = event.dateStr;
			    $('#selectedDate').html(selectedDate);
			},
			selectable: true,
			customButtons: {
		        addEventButton: {
		          text: 'add event...',
		          click: function() {
	          		let time = $( "#from-time option:selected" ).text() + ' - ' + $( "#to-time option:selected" ).text();
					let item = {
					    title: time,
					    start: selectedDate,
					};

					events.push({
						date: selectedDate,
						from: $( "#from-time" ).val(),
						to: $( "#to-time" ).val(),
					});

		            calendar.addEvent(item);
		          }
		        },
		        saveCalendar: {
		            text: 'Lưu lịch',
		            click: function() {
	          		    window.axios.put("{{ route('calendar.update') }}", events)
	          		    	.then(() => {
	          		    		window.location.href = '{{ route('calendar.index') }}';
	          		    	})
	          		    	.catch(() => {
	          		    		alert('Error');
	          		    	});
		            }
		        }
		      }
	    });

	    calendar.render();

		$('#add_time').click(() => {
			document.getElementsByClassName("fc-addEventButton-button")[0].click();
		});
    });

</script>

@endsection
