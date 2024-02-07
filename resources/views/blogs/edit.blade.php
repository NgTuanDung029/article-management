@extends('blogs.layout')
@section('title') {{ ' - Sửa' }} @endsection
@section('content')
    <div class="container">
        <h1>Sửa thông tin bài đăng</h1>
        @if($errors ->any())
            <div class = "alert alert-danger">
                <strong>Lỗi</strong> Bạn chưa nhập đầy đủ thông tin
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('blogs.update', $blogs->BlogID) }}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            @method('PUT')
            <input type="hidden" name = "BlogID" id ="BlogID" value ="{{ $blogs->BlogID }}">
            <div class="mb-2">
                <label>Tiêu đề</label>
                <input type="text" name="Title" id = "Title" class="form-control" value ="{{ $blogs->Title }}" />
            </div>
            <div class="mb2">
                <label>Nội dung</label>
                <input type="text" name="Content" id = "Content" value ="{{ $blogs->Content }}" class="form-control" />
            </div>
            <div class="mb-2">
                <label>Tác giả</label>
                <!-- <input type="text" name="categoryID" class="form-control" /> -->
                <select name="AuthorID" id="lang-select">
                    <option value="1">Lexie Dare PhD</option>
                    <option value="2">Stanton Lakin Sr.</option>
                    <option value="3">Mr. Dorian Effertz DVM</option>
                    <option value="4">Rodger Quigley Jr.</option>
                    <option value="5">Arvid Wyman</option>
                </select>
            </div>
            <input class="btn btn-primary" type="submit" value="Lưu" >
        </td>
        </form>
    </div>
@endsection