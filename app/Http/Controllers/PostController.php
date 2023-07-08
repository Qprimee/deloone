<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Providers\RouteServiceProvider;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Post $post)
    {
        $donations = $post->where('type', 'donations')->latest()->get();
        $requirements = $post->where('type', 'requirements')->latest()->get();

        // $post = $post->first();
        // $date = $post->updated_at;
        // $jalali = CalendarUtils::strftime('Y-m-d', $date);
        return Inertia::render('Index', [
            'donations' => $donations,
            'requirements' => $requirements
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $this->authorize('create', Post::class);

        return Inertia::render('Post', []);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Post::class);

        $image = $request->file('img');
        if ($image) {
            $validated = $request->validate([
                'title' => 'required|unique:posts|max:255',
                'body' => 'required',
                'img' => 'image',
                'type' => 'required',Rule::in(['requirements','donations'])
            ]);

            $path = Storage::putFile('upload_img', $image, 'public');
            $path_to_array = explode('/', $path);
            $image->move($path_to_array[0],$path_to_array[1]);

            $post = Post::create([
                "title" => $request->title,
                "body" => $request->body,
                "img" => $path,
                "type" => $request->type
            ]);
        }else {
            $validated = $request->validate([
                'title' => 'required|unique:posts|max:255',
                'body' => 'required',
                'type' => 'required',Rule::in(['requirements','donations'])
            ]);

            $post = Post::create([
                "title" => $request->title,
                "body" => $request->body,
                "img" => "",
                "type" => $request->type
            ]);
        }
        return redirect()->route('post.show', ['name' => $request->title])
                         ->with('message', 'پست شما با موفقیت ساخته شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $name)
    {
        $post =  Post::where('title', $name)->first();
        if (!$post) {
            abort(404);
        }
        $status = Gate::allows('create-post', Post::class);

        $posts = Post::where('type', $post->type)->latest()->get();

        return Inertia::render('Show', [
            'create' => $status,
            'post' => $post,
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($name)
    {
        $this->authorize('create', Post::class);
        $post = Post::where('title', $name)->first();
        if (!$post) {
            abort(404);
        }

        return Inertia::render('Edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->authorize('create', Post::class);
        $post = Post::where('id', $id)->first();
        $image = $request->file('img');
        if ($image) {
            $validated = $request->validate([
                'title' => 'required|unique:posts|max:255',
                'body' => 'required',
                // 'img' => 'image',
                'type' => 'required',Rule::in(['requirements','donations'])
            ]);

            $path_to_array = explode('/', $post->path);
            $image->move($path_to_array[0],$path_to_array[1]);
            $post = $post->update([
                "title" => $request->title,
                "body" => $request->body,
                "img" => $path,
                "type" => $request->type
            ]);
        }else {
            $validated = $request->validate([
                'title' => 'required|unique:posts|max:255',
                'body' => 'required',
                'type' => 'required',Rule::in(['requirements','donations'])
            ]);

            $post = $post->update([
                "title" => $request->title,
                "body" => $request->body,
                "img" => $post->img,
                "type" => $request->type
            ]);

        }
        return redirect()->route('post.show', ['name' => $request->title])
                ->with('message', 'پست شما با موفقیت ویرایش شد');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post ,$id)
    {
        $post = $post->where('id', $id)->first();
        $post->delete();

        return redirect(RouteServiceProvider::HOME)
                ->with('message', 'پست شما با موفقیت حذف شد');
    }
}
