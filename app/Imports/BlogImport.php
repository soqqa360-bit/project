<?php

namespace App\Imports;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BlogImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        if(!isset($row['sarlavha']) || empty($row['sarlavha'])) {
            return null;
        }

        return new Blog([
            'title' => $row['sarlavha'],
            'content' => $row['content'] ?? 'Bo\'sh Content',
            'category_id' => Category::firstOrCreate(['name' => $row['kategoriya']])->id ?? 1,
            'user_id' => isset($row['user_id']) ? $row['user_id'] : (auth()->id() ?? 1),
            'image' => $row['rasm'],
            'views' => 0
        ]);
    }
}
