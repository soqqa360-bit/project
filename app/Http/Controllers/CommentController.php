<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Models\Blog;
use App\Models\Comment;
use App\Notifications\NewCommentNotification;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CommentController extends Controller
{
    use AuthorizesRequests;

    public function store(CommentStoreRequest $request, Blog $blog)
    {
        $request->validated();
        $comment = $blog->comments()->create([
            'comment' => $request->comment,
            'user_id' => auth()->id(),
        ]);

        if(auth()->id() !== $blog->user_id) {
            $blog->user->notify(new NewCommentNotification($comment, $blog));
        }

        return redirect()->route('blog.detail', $blog->slug)->with('success', 'Comment Yaratildi');
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $blogId = $comment->blog->slug;

        $comment->delete();

        return redirect()->route('blog.detail', $blogId)->with('success', 'Comment O\'chirildi');
    }
}
