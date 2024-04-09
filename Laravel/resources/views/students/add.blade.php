@extends('layout')

@section('title')
    {{$title}}
@endsection

@section('content')
    @if (session('msg'))
        <div class="alert alert-success">{{session('msg')}}</div>
    @endif 
    
    @if ($errors->any())
        <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ. Vui lòng kiểm tra lại</div>
    @endif

    <h1>{{$title}}</h1>
    <form action="" method="POST">
        <div class="md-3">
            <label for="">Họ và tên</label>
            <input type="text" class="form-control" name="name" placeholder="Họ và tên..." value="{{old('name')}}">
            @error('name')
                <span style="color: red;">{{$message}}</span>
            @enderror
        </div>

        <div class="md-3">
            <label for="">Phone</label>
            <input type="text" class="form-control" name="phone" placeholder="Số điện thoại..." value="{{old('phone')}}">
            @error('phone')
                <span style="color: red;">{{$message}}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Thêm mới</button>
        <a href="{{route('students.students')}}" class="btn btn-warning">Quay lại</a>
        @csrf
    </form>
   
@endsection