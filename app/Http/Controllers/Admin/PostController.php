<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts=Post::all();

        return view('admin.posts.index',compact('posts'));
    }
    public function create()
    {
        return view('admin.posts.create-edit');
    }
    public function edit(Post $post)
    {
        return view('admin.posts.create-edit',compact('post'));
    }
    public function show(Post $post)
    {
        return view('admin.posts.show',compact('post'));
    }
    public function store(PostRequest $request)
    {
        $this->validate($request,['image_path'=> 'required|image']);

        $post = new Post();
        $post->user_id = Auth::id();
        if($request->hasFile('image_path'))
        {
            $post->image_path= $request->file('image_path')->store('posts','public');
        }
        //filling translations
        foreach (\Localization::getSupportedLocales() as $key => $value)
        {
            if ($request->get('title_' . $key))
                $post->translateOrNew($key)->title = $request->get('title_' . $key);
            if ($request->get('body_' . $key))
                $post->translateOrNew($key)->body = $request->get('body_' . $key);
        }
        $post->save();

        return redirect(action('Admin\PostController@index'))->with('success','تم النشر بنجاح!');

    }
    public function update(Post $post, PostRequest $request)
    {
        $UpdatePost = Post::findOrFail($post->id);
        if ($request->hasFile('image_path'))
        {
            if (file_exists(storage_path('app/public/' . $UpdatePost->image_path)))
            {
                unlink(storage_path('app/public/' . $UpdatePost->image_path));
            }
            $UpdatePost->image_path = $request->file('image_path')->store('posts','public');
        }
        foreach (\Localization::getSupportedLocales() as $key => $value)
        {
            if ($request->get('title_' . $key))
                $UpdatePost->translateOrNew($key)->title = $request->get('title_' . $key);
            if ($request->get('body_' . $key))
                $UpdatePost->translateOrNew($key)->body = $request->get('body_' . $key);
        }
        $UpdatePost->save();
        return redirect(action('Admin\PostController@index'))->with('success','تم تعديل المنشور بنجاح');




    }
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if (file_exists(storage_path('app/public' . $post->image_path))) {
            unlink(storage_path('app/public/' . $post->image_path));
        }
        $post->delete();
        return redirect(action('Admin\PostController@index'))->with('success', 'تم حذف المنشور بنجاح!');


    }
    public function visible(Post $post){
        return $this->set_editable($post, 'visible');
    }
}

