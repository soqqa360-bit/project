<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendContactRequest;
use App\Mail\ContactMail;
use App\Models\Blog;
use App\Models\Carousel;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Service;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function homePage()
    {
        $recentPosts = Blog::latest()->take(3)->get();
        $latestComments = Comment::with('blog', 'user')->latest()->take(4)->get();
        $carousels = Carousel::all();
        $services = Service::latest()->paginate(8);
        return view('home', compact('recentPosts', 'latestComments', 'carousels', 'services'));
    }

    public function aboutPage()
    {
        return view('about');
    }

    public function blogPage(Request $request)
    {
        $query = Blog::with(['category', 'user'])->latest();

        if ($request->filled('search')) {
            $searchTerm = trim($request->search);
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'LIKE', "%{$searchTerm}%")->orWhere('content', 'LIKE', "%{$searchTerm}%");
            });
        }

        if ($request->filled('tag')) {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->where('tags.id', $request->tag);
            });
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        $blogs = $query->paginate(6);

        $searchQuery = $request->search;
        $selectedTag = (int) $request->tag;
        $selectedCategory = (int) $request->category;
        $categories = Category::withCount('blogs')->get();

        return view('blog', compact('blogs', 'searchQuery', 'selectedTag', 'selectedCategory', 'categories'));
    }

    public function blogDetail($slug)
    {
        $blog = Blog::with('category', 'user', 'tags')->where('slug', $slug)->firstOrFail();
        $sessionKey = 'blog_viewed_' . $blog->id;

        if (!session()->has($sessionKey)) {
            $blog->increment('views');

            session()->put($sessionKey, true);
        }

        $recentBlogs = Blog::where('id', '!=', $blog->id)->latest()->take(5)->get();
        $popularBlogs = Blog::where('id', '!=', $blog->id)->orderBy('views', 'desc')->latest()->take(5)->get();
        $topicalBlogs = Blog::where('id', '!=', $blog->id)->where('category_id', $blog->category_id)->latest()->take(5)->get();
        $categories = Category::withCount('blogs')->get();
        $tags = Tag::all();
        return view('blog-detail', compact('blog', 'categories', 'recentBlogs', 'tags', 'popularBlogs', 'topicalBlogs'));
    }

    public function contactPage()
    {
        return view('contact');
    }


    public function sendContactEmail(SendContactRequest $request)
    {
        $validated = $request->validated();

        $data = [
            'name' => auth()->check() ? auth()->user()->name : $validated['name'],
            'email' => auth()->check() ? auth()->user()->email : $validated['email'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
        ];

        Mail::to('githubuchun308@gmail.com')->send(new ContactMail($data));
        return back()->with('success', 'Xabaringiz Yuborildi');
    }
}
