@extends('issues.master')
@section('content')
@if ($message = Session::get('success'))
<div class="container">
    <div class="alert alert-success" role="alert">
        <strong>{{$message}}</strong>
    </div>
</div>
@endif
@if ($message = Session::get('error'))
<div class="container">
    <div class="alert alert-danger" role="alert">
        <strong>{{$message}}</strong>
    </div>
</div>
@endif
<div class="card">
    <div class="card-header">
        <div class="text-center text-uppercase text-success">
            <h1>Quản lý sự cố</h1>
        </div>
        <div>
            <a name="" id="" class="btn btn-success float-right" href="{{route('issues.create')}}" role="button">Thêm vấn đề</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Mã sự cố</th>
                    <th class="text-center">Tên máy tính</th>
                    <th class="text-center">Người báo cáo</th>
                    <th class="text-center">Ngày báo cáo</th>
                    <th class="text-center">Mô tả</th>
                    <th class="text-center">Mức độ</th>
                    <th class="text-center">Trạng thái</th>
                    <th class="text-center">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @if (count($issues) >0)
                @foreach ($issues as $row )
                <tr>
                    <td scope="row"><?= $row->id ?></td>
                    <td><?= $row->computer->computer_name ?></td>
                    <td><?= $row->reported_by ?></td>
                    <td><?= $row->reported_date ?></td>
                    <td><?= $row->description ?></td>
                    <td><?= $row->urgency ?></td>
                    <td><?= $row->status ?></td>

                    <td>
                        <a name="" id="" class="btn btn-primary" href="{{route('issues.show',$row->id)}}" role="button">Xem chi tiết</a>
                        <a name="" id="" class="btn btn-warning" href="{{route('issues.edit',$row->id)}}" role="button">Sửa</a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modelId{{$row->id}}">Xóa</button>

                        <!-- Modal -->
                        <div class="modal fade" id="modelId{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Thông báo xóa</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Bạn chắc chắn xóa?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{route('issues.destroy',$row->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Xóa</button>
                                        </form>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="5" class="text-center">No Data Found</td>
                </tr>
                @endif
            </tbody>
        </table>
        {!! $issues->links() !!}
    </div>

</div>
@endsection