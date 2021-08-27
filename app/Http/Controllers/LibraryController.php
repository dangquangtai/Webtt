<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LibraryController extends Controller
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
        $all_library = Library::orderBy('order', 'asc')->paginate($quantity_view);
        return view('admin.library.index', compact('all_library'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->AuthLogin();
        return view('admin.library.create');
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
            'name' => 'required',
            'desc' => 'required',
            'content' => 'required',
            'status' => 'required',
            'image' => 'required',
        ]);
        $library = new Library();
        $library->name = $request->name;
        $library->desc = $request->desc;
        $library->content = $request->content;
        $library->meta_data = $request->meta_data;
        $library->keyword = $request->keyword;
        $library->status = $request->status;
        $library->slug = url_slug($request->name) . '_' . date('dmYHis');
        $get_image = $request->file('image');
        if ($get_image) {
            $new_image = $library->slug . date('dmYHis')  . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('uploads/library', $new_image);
            $library->image = $new_image;
        } else {
            $library->image = '';
        }
        $library->save();
        Session::flash('message', 'Thêm bài viết thành công!');
        return Redirect::to('/admin/library/index');
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
        $library = Library::find($id);
        return view('admin.library.edit', compact('library'));
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
            'name' => 'required',
            'desc' => 'required',
            'content' => 'required',
            'status' => 'required',
        ]);
        $library = Library::find($id);

        if ($request->name != $library->name) {
            $library->name = $request->name;
            $library->slug = url_slug($request->name) . '_' . date('dmYHis');
        }
        $library->desc = $request->desc;
        $library->content = $request->content;
        $library->meta_data = $request->meta_data;
        $library->keyword = $request->keyword;
        $library->status = $request->status;
        $img = $library->image;
        $get_image = $request->file('image');
        if ($get_image) {
            $new_image = $library->slug . date('dmYHis')  . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('uploads/library', $new_image);
            $library->image = $new_image;
            $image_path = "uploads/library/" . $img;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }
        $library->save();
        Session::flash('message', 'Sửa bài viết thành công!');
        return Redirect::to('/admin/library/index');
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
        $library = Library::findOrFail($id);
        $img = $library->image;
        $image_path = "uploads/library/" . $img;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $library->delete();
        Session::flash('message', 'Xoá thành công!');
        return Redirect::to('/admin/library/index');
    }

    public function arrange_library(Request $request)
    {
        $this->AuthLogin();
        $page_id_array = $request->page_id_array;
        foreach ($page_id_array as $key => $value) {
            $library = Library::find($value);
            $library->order = $key;
            $library->save();
        }
        echo "true";
    }
}
