<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Topic;
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
        $section = Section::where("topic_id", $id)->get();
        $topicName = Topic::where("id", $id)->get("title");

        foreach ($section as $section_field) {
            $section_field->title = json_decode($section_field->title);
        }

        return [
            'status' => 200,
            'data' => $section,
            'topic_name' => $topicName
        ];
    }
}
