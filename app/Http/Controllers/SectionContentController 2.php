<?php

namespace App\Http\Controllers;

use App\Models\Section_content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SectionContentController extends Controller
{
    public function index()
    {
        $contents = Section_content::all();

        return [
            'status' => 200,
            'data' => $contents
        ];
    }

    public function show(int $section_id, String $language)
    {
        $content = DB::table("section_contents")
            ->where("section_id", $section_id)
            ->where("language", $language)
            ->get();
        return [
            'status' => 200,
            'data' => $content
        ];
    }

    public function store(Request $content)
    {
        $content->validate([
            "section_id" => "required|int|exists:sections",
            "langage" => "required|string|exists:[\"fr\",\"en\"]"
        ]);

        $new_section_content = DB::table("section_contents")
        ->create([
            "section_id" => $content->get("section_id"),
            "language" => $content->get("language"),
            "description" => $content->get("description"),
            "what_i_learned" => $content->get("what_i_learned")
        ]);

        return [
            "status" => 200,
            "data" => $new_section_content,
            "message" => "Section_content stored."
        ];
    }
}
