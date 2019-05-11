<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Blog;

class BlogsController extends Controller
{
  public function index()
  {
    $blogs = Blog::where('status_posting','SHOW')->paginate(5);
    return view('blog.blogs')->with(compact('blogs'));
  }

  public function listBlog()
  {
    $blogs = Blog::paginate(5);
    return view('admin.blog.list_blog')->with(compact('blogs'));
  }

  public function addBlog(Request $request)
  {
    if ($request->isMethod('post')) {
      $blogs = new Blog;
      $blogs->judul = $request->judul;
      $blogs->isi =  $request->editor1;

      if ($request->hasFile('foto_blog')) {
        $image2 = $request->file('foto_blog');
        $images2 = rand() . time() . '.' . $image2->getClientOriginalExtension();
        \Image::make($image2)->resize(600, 350)->save(storage_path('../public/img/blog/' . $images2));
        $blogs->blog_photo = $images2;
      }
      $blogs->save();

      return redirect('listBlog')->with(['success','Berhasil tambah postingan blog']);
    }
    return view('admin.blog.add_blog');
  }

  public function editBlog(Request $request, $id)
  {
    if ($request->isMethod('post')) {
      $blogs = Blog::findOrFail($id);
      $blogs->judul = $request->judul;
      $blogs->isi =  $request->editor1;

      if ($request->hasFile('foto_blog')) {
        $image2 = $request->file('foto_blog');
        $images2 = rand() . time() . '.' . $image2->getClientOriginalExtension();
        \Image::make($image2)->resize(600, 350)->save(storage_path('../public/img/blog/' . $images2));
        $blogs->blog_photo = $images2;
      }
      $blogs->save();
      return redirect()->back()->with(['success','Berhasil tambah postingan blog']);
    }

    $blogs = Blog::where('id' , $id)->get();
    return view('admin.blog.edit_blog')->with(compact('blogs'));
  }

  public function deleteBlog($id)
  {
    $blog = Blog::findOrFail($id);
    $blog->delete();
    return back();
  }
}
