@extends('layouts.app')

@section('css')
	<link href="{{ asset('css/student-firsttime.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="suggestion">
	<div class="col-md-6">
		<form action="#">
			<div class="grade">
			<label for="" class="label-title">Cấp học:</label>
			<select class="form-control form-control-lg" name="grade">
			  <option value="">Chọn</option>
			  <option value="">Cấp 1</option>
			  <option value="">Cấp 2</option>
			</select>
		</div>
		<br><br>
		<div class="subject">
			<label for="" class="label-title">Môn học quan tâm:</label>
			<div class="form-check">
			  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
			  <label class="form-check-label label-title" for="defaultCheck1">
			    Toán
			  </label>
			</div>
			<div class="form-check">
			  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
			  <label class="form-check-label label-title" for="defaultCheck1">
			    Tiếng Anh
			  </label>
			</div>
			<div class="form-check">
			  <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
			  <label class="form-check-label label-title" for="defaultCheck2">
			    Tiếng Việt
			  </label>
			</div>
		</div>
		</form>
	</div>
</div>
@endsection