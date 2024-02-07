@extends('blogs.layout')
@section('content')
<div class = "container">
    <h1>Quản lý bài đăng</h1>
    @if($message = Session::get('flash_message'))
        <div class = "alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <a href="{{ url('/blogs/create') }}" id="btnAdd" class = "btn btn-primary">+ Thêm bài đăng</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tiêu đề</th>
                <th scope="col">Nội dung</th>
                <th scope="col">Tác giả</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <td>{{$loop->iteration }}</td>
                    <td>{{$blog-> Title }}</td>
                    <td>{{$blog-> Content }}</td>
                    <td>{{$blog-> Username }}</td>
                    <td>
                        <form method="POST" action="{{ url('blogs' . '/' . $blog->BlogID) }}" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" title="Delete Author" onclick="return Del()" class = "btn btn-danger">X</button>
                        </form>
                        <a href="{{ url('blogs/' . $blog->BlogID . '/edit')}}" class = "btn btn-warning">[1</a>
                        {{-- <a href="{{ url('authors/' . $author->ma_tgia) }}" class = "btn btn-info">...</a> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
</div>
@endsection
<script>
    function Del() {
        return confirm("Bạn chắc chắn muốn xóa không?");
    }
</script>