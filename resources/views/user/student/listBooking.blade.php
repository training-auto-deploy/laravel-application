@extends('user.layout.main')

@section('title', 'Booking list')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header">
                        <h4 class="card-title"> Table on Plain Background</h4>
                        <p class="card-category"> Here is a subtitle for this table</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>
                                    Môn học
                                </th>
                                <th>
                                    Giáo viên
                                </th>
                                <th>
                                    Thời gian bắt đầu
                                </th>
                                <th>
                                    Thời gian kết thúc
                                </th>
                                <th>
                                    Trạng thái
                                </th>
                                <th class="text-right"></th>
                                </thead>
                                <tbody>
                                @foreach($datas as $data)
                                <tr>
                                    <td>
                                        {{ $data['name'] }}
                                    </td>
                                    <td>
                                        {{ $data['teacher_name'] }}
                                    </td>
                                    <td>
                                       {{ $data['start_time'] }}
                                    </td>
                                    <td>
                                       {{ $data['end_time'] }}
                                    </td>
                                    <td>
                                        @if($data['status'] == 'Open')
                                            <span class="badge badge-pill badge-success">
                                        @elseif($data['status'] == 'Learning')
                                            <span class="badge badge-pill badge-primary">
                                        @elseif($data['status'] == 'Close')
                                            <span class="badge badge-pill badge-danger">
                                        @endif
                                        {{ $data['status'] }}</span>
                                    </td>
                                    <td class="text-right">
                                        @if($data['status'] == 'Close')
                                            <span href="{{ $data['link_call'] }}" target="_blank" class="btn btn-sm btn-info" disabled="disabled">Join</span>
                                        @else
                                            <a href="{{ $data['link_call'] }}" target="_blank" class="btn btn-sm btn-info" disabled="disabled">Join</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
