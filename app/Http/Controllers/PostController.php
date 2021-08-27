<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function AuthLogin()
    {
        $login = Auth::id();
        if ($login) {
            return Redirect::to('/dashboard');
        } else {
            return Redirect::to('/admin')->send();
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->AuthLogin();
        $quantity_view = Session::get('admin_quantity_view', 9);
        $all_post = Post::orderBy('post_order', 'asc')->paginate($quantity_view);
        return view('admin.post.index', compact('all_post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->AuthLogin();
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->AuthLogin();
        $this->validate($request, [
            'post_name' => 'required',
            'post_desc' => 'required',
            'post_content' => 'required',
            'post_status' => 'required',
            'post_image' => 'required',
        ]);
        $post = new Post();
        $post->post_name = $request->post_name;
        $post->post_desc = $request->post_desc;
        $post->post_content = $request->post_content;
        $post->post_meta_data = $request->post_meta_data;
        $post->post_keyword = $request->post_keyword;
        $post->post_status = $request->post_status;
        $post->post_slug = url_slug($request->post_name) . '_' . date('dmYHis');
        $get_image = $request->file('post_image');
        if ($get_image) {
            $new_image = $post->post_slug . date('dmYHis')  . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('uploads/post', $new_image);
            $post->post_image = $new_image;
        } else {
            $post->post_image = '';
        }
        $post->save();
        Session::flash('message', 'Thêm tin tức thành công!');
        return Redirect::to('/admin/post/index');
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
        $this->AuthLogin();
        $post = Post::find($id);
        return view('admin.post.edit', compact('post'));
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
        $this->AuthLogin();
        $this->validate($request, [
            'post_name' => 'required',
            'post_desc' => 'required',
            'post_content' => 'required',
            'post_status' => 'required',
        ]);
        $post = post::find($id);

        if ($request->post_name != $post->post_name) {
            $post->post_name = $request->post_name;
            $post->post_slug = url_slug($request->post_name) . '_' . date('dmYHis');
        }
        $post->post_desc = $request->post_desc;
        $post->post_content = $request->post_content;
        $post->post_meta_data = $request->post_meta_data;
        $post->post_keyword = $request->post_keyword;
        $post->post_status = $request->post_status;
        $img = $post->post_image;
        $get_image = $request->file('post_image');
        if ($get_image) {
            $new_image = $post->post_slug . date('dmYHis')  . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('uploads/post', $new_image);
            $post->post_image = $new_image;
            $image_path = "uploads/post/" . $img;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }
        $post->save();
        Session::flash('message', 'Sửa tin tức thành công!');
        return Redirect::to('/admin/post/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->AuthLogin();
        $post = post::findOrFail($id);
        $img = $post->post_image;
        $image_path = "uploads/post/" . $img;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $post->delete();
        Session::flash('message', 'Xoá thành công!');
        return Redirect::to('/admin/post/index');
    }

    public function arrange_post(Request $request)
    {
        $this->AuthLogin();
        $page_id_array = $request->page_id_array;
        foreach ($page_id_array as $key => $value) {
            $post = Post::find($value);
            $post->post_order = $key;
            $post->save();
        }
        echo "true";
    }
}