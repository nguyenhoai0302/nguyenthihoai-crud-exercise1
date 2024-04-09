@extends('layout')

@section('title')
    {{$title}}
@endsection

@section('content')
    @if (session('msg'))
        <div class="alert alert-success">{{session('msg')}}</div>
    @endif 
    
    <h1>{{$title}}</h1>
    <hr>

    <a href="{{route('students.add')}}" class="btn btn-primary m-3">Thêm mới</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="5%">STT</th>
                <th><a href="">Tên học sinh</a></th>
                <th><a href="">Số điện thoại</a></th>
                <th width="10%">Sửa</th>
                <th width="10%">Xóa</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($studentsList))
                @foreach ($studentsList as $key => $item)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->phone}}</td>
                        <td>
                            <a href="{{route('students.edit', ['id'=>$item->id])}}" class="btn btn-warning btn-sm">Sửa</a>
                        </td>
                        <td>
                            <a onclick="return confirm('Bạn có chắc chắc muốn xóa?')" href="{{route('students.delete', ['id'=>$item->id])}}" class="btn btn-danger btn-sm">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6">Không có người dùng</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection