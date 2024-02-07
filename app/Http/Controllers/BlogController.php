<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Author;
use App\Models\User;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blogs = DB::select('select * from blogs, users, authors where blogs.AuthorID = authors.AuthorID and authors.UserID = users.UserID order by BlogID desc');

        return view('blogs.index', ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'Title' => 'required',
            'Content' => 'required',
            'AuthorID' => 'required',
        ];
        $messages = [
            'Title.required' => 'Vui lòng nhập tiêu đề.',
            'Content.required' => 'Vui lòng nhập nội dung.',
            'AuthorID.required' => 'Vui lòng chọn tác giả.',
        ];
        $request->validate($rules, $messages);
        $input = $request->all();
        Blog::create($input);
        return redirect('blogs')->with('flash_message', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $blog = Blog::find($id);
        return view('blogs.edit')->with('blogs', $blog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $blog = Blog::find($id);
        $rules = [
            'Title' => 'required',
            'Content' => 'required',
            'AuthorID' => 'required',
        ];
        $messages = [
            'Title.required' => 'Vui lòng nhập tiêu đề.',
            'Content.required' => 'Vui lòng nhập nội dung.',
            'AuthorID.required' => 'Vui lòng chọn tác giả.',
        ];
        $request->validate($rules, $messages);
        $input = $request->all();
        $blog->update($input);
        return redirect('blogs')->with('flash_message', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Blog::destroy($id);
        return redirect('blogs')->with('flash_message', 'Xóa thành công');
    }
}
