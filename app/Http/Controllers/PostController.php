<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function showCreateForm() {
        return view('create-post');
    }

    public function storeNewPost(Request $request) {
        $allowedTags = '<p><a><strong><em><ul><ol><li><br>';

        $incomingFields = $request->validate([
            'title'=>'required',
            'body'=>'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body'],  $allowedTags);
        $incomingFields['user_id'] = auth()->id();


        $newPost = Post::create($incomingFields);

        return redirect("/post/{$newPost->id}")->with('success', 'New post successfully created.');
    }

    public function viewSinglePost(Post $post) {
        return view('single-post', ['post'=>$post]);
    }

    public function delete(Post $post) {
        $post->delete();
        return redirect('/profile/'.auth()->user()->username)->with('success', 'Post successfully deleted.');
    }

    public function showEditForm(Post $post) {
        return view('edit-post', ['post'=>$post]);
    }

    public function editPost(Post $post, Request $request) {
        $allowedTags = '<p><a><strong><em><ul><ol><li><br>';

        $incomingFields = $request->validate([
            'title'=>'required',
            'body'=>'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body'],  $allowedTags);
        $incomingFields['user_id'] = auth()->id();


        $post->update($incomingFields);

        return back()->with('success', 'Post successfully updated.');
    }
}
