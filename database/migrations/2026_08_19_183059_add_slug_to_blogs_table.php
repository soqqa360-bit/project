<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('title');
        });

        $blogs = DB::table('blogs')->whereNull('slug')->get();

        foreach ($blogs as $blog) {
            $slug = Str::slug($blog->title);
            $originalSlug = $slug;
            $counter = 1;
            while (DB::table('blogs')->where('slug', $slug)->where('id', '!=', $blog->id)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }
            ;

            DB::table('blogs')->where('id', $blog->id)->update(['slug' => $slug]);
        }

        Schema::table('blogs', function (Blueprint $table) {
            $table->unique('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn('slug');
            $table->dropUnique(['slug']);
        });
    }
};
