<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Posts;

class PostController extends Controller
{
    public function index()
    {
        $post = Posts::all();
        return view('index', compact('post'));
    }
    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'title' => 'required|max:255',
            'text' => 'required|max:255',
        ]);
        $post = Posts::create($storeData);
        return redirect('/posts')->with('completed', 'Post has been saved!');
    }
    public function show($id)
    {}
    public function edit($id)
    {
        $post = Posts::findOrFail($id);
        return view('edit', compact('post'));
    }
    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'title' => 'required|max:255',
            'text' => 'required|max:255',
        ]);
        Posts::whereId($id)->update($updateData);
        return redirect('/posts')->with('completed', 'Post has been updated');
    }

    public function destroy($id)
    {
        $post = Posts::findOrFail($id);
        $post->delete();
        return redirect('/posts')->with('completed', 'Post has been deleted');
    }
}
