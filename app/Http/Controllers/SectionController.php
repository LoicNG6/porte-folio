<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Topic;
use Attribute;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::all();

        foreach ($sections as $section) {
            $section->title = json_decode($section->title);
        }

        return [
            'status' => 200,
            'data' => $sections
        ];
    }

    public function show(int $id)
    {
        $section = Section::where("topic_id", $id)->get("title");
        $topic = Topic::where("id", $id)->get(["title", "image", "started_at", "ended_at"]);

        foreach ($section as $section_field) {
            $section_field->title = json_decode($section_field->title);
        }
        foreach ($topic as $field) {
            $field->title = json_decode($field->title);
            $field->image = json_decode($field->image);
            $field->started_at = json_decode($field->started_at);
            $field->ended_at = json_decode($field->ended_at);
        }

        return [
            'topic' => $topic[0]
        ];
    }
}
