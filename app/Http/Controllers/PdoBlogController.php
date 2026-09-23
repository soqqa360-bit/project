<?php

namespace App\Http\Controllers;

use App\Services\PdoService;
use Illuminate\Http\Request;
use PDO;

class PdoBlogController extends Controller
{
    private PDO $pdo;

    public function __construct(PdoService $pdoservice) {
        $this->pdo = $pdoservice->getPdo();
    }

    public function index() {
        $sql = "SELECT blogs.id, blogs.title, blogs.views, blogs.created_at, blogs.image blogs.content, categories.name AS category_name FROM blogs LEFT JOIN categories ON blogs.category_id = categories.id, WHERE blogs.deleted_at IS NULL ORDER BY blogs.created_at DESC";

        $stat = $this->pdo->query($sql);
        $blogs = $stat->fetchAll(PDO::FETCH_ASSOC);
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create() {
        $stat = $this->pdo->query("SELECT id, name FROM categories ORDER BY name ASC");
        $categories = $stat->fetchAll(PDO::FETCH_ASSOC);
        return view('admin.blogs.create', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|min:10',
            'category_id' => 'required|exists:categories,id',
        ]);

        $sql = "INSERT INTO blogs (title, content, category_id, user_id, views, created_at, updated_at) VALUES (?, ?, ?, ? ,? NOW(), NOW())";
        $stat = $this->pdo->prepare($sql);

        $stat->execute([
            $request->title,
            $request->content,
            $request->category_id,
            auth()->id(),
        ]);

        $newId = $this->pdo->lastInsertId();

        return redirect()->route('blogs.index')->with("success', 'Post yaratildi {$newId}");
    }

    public function edit(int $id) {
        $stat = $this->pdo->prepare('SELECT * FROM blogs WHERE id = ? AND deleted_at IS NULL');
        $stat->execute([$id]);
        $blogs = $stat->fetch(PDO::FETCH_ASSOC);
        if(!$blogs) {
            abort(404, 'Blog Topilmadi');
        }

        $statTwo = $this->pdo->query("SELECT id, name FROM categories ORDER BY name");
        $categories = $statTwo->fetchAll(PDO::FETCH_ASSOC);
        return view('admin.blogs.edit', compact('blogs', 'categories'));
    }

    public function update(Request $request, int $id) {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|min:10',
            'category_id' => 'required|exists:categories,id',
        ]);

        $sql = "UPDATE blogs SET title = ?, content = ?, category_id = ?, updated_at = NOW() WHERE id = ? AND deleted_at IS NULL";
        $stat = $this->pdo->prepare($sql);
        $stat->execute([
            $request->title,
            $request->content,
            $request->category_id,
            $id
        ]);
        return redirect()->route('blogs.index')->with('success', 'Post Yangilandi');
    }

    public function destroy(int $id) {
        $stat = $this->pdo->prepare("DELETE FROM blogs WHERE id = ?");
        $stat->execute([$id]);
        return redirect()->route('blogs.index')->with('success', 'Post O\'chirildi');
    }
}
