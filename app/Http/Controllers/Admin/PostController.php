<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostFormRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Post::class);
        $posts = Post::orderBy("created_at", "DESC")->paginate(10);

        return view('admin.posts.index', [
            "posts" => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create', []);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostFormRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('thumbnail')) {
            $thumbnail = str_replace(
                'public/posts',
                '',
                $request->file('thumbnail')->store('public/posts')
            );
            $data['thumbnail'] = $thumbnail;
        }

        $post = Post::create($data);

        return redirect(route("admin.posts.index"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //$post = Post::findOrFail($id);

        /*if (!Gate::forUser(auth('admin')->user())->allows('update', $post)) {
            abort(403);
        }
        
        if(auth('admin')->user()->cannot('update', $post)) {
            abort(403);
        }*/

        return view('admin.posts.create', [
            "post" => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostFormRequest $request, Post $post)
    {
        //$post = Post::findOrFail($id);

        $data = $request->validated();

        if($request->has("thumbnail")) {
            $thumbnail = str_replace("public/posts", "", $request->file("thumbnail")->store("public/posts"));
            $data["thumbnail"] = $thumbnail;
        }

        $post->update($data);

        return redirect(route("admin.posts.index", [
            "post" => $post,
        ]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //Post::destroy($id);

        $post->delete();

        return redirect(route("admin.posts.index"));
    }
}
