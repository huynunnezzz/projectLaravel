@extends('issues.master')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="text-center text-uppercase text-success">
                <h1>Sửa vấn đề</h1>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('issues.update',$issue->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Tên máy tính: </label>
                    <input type="text" class="form-control" name="computer_name" id="" aria-describedby="helpId" placeholder="" readonly value="<?= $computer->computer_name ?>">
                </div>
                <div class="form-group">
                    <label for="">Người báo cáo: </label>
                    <input type="text" class="form-control" name="reported_by" id="" aria-describedby="helpId" placeholder="" required value="<?= $issue->reported_by?>">
                </div>
                <div class="form-group">
                    <label for="">Thời gian báo cáo: </label>
                    <input type="date" class="form-control" name="reported_date" id="" aria-describedby="helpId" placeholder="" required value="<?= $issue->reported_date?>">
                </div>
                <div class="form-group">
                    <label for="">Mô tả: </label>
                    <input type="text" class="form-control" name="description" id="" aria-describedby="helpId" placeholder="" required value="<?= $issue->description?>" >
                </div>
                <div class="form-group">
                    <label for="">Mức độ sự cố</label>
                    <select class="form-control" name="urgency" id="">
                        <option>Low</option>
                        <option>Medium</option>
                        <option>High</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Trạng thái</label>
                    <select class="form-control" name="status" id="">
                        <option>Open</option>
                        <option>In Process</option>
                        <option>Resolved</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <a name="" id="" class="btn btn-secondary" href="{{route('issues.index')}}" role="button">Quay lại</a>

            </form>
        </div>

    </div>
</div>

@endsection