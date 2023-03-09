<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::all();

        foreach ($sections as $section) {
            $section->description = json_decode($section->description);
            $section->title = json_decode($section->title);
            $section->what_i_learned = json_decode($section->what_i_learned);
        }

        return [
            'status' => 200,
            'data' => $sections,
        ];
    }

    public function show(int $id)
    {
        $section = Section::where("topic_id", $id)->get();
        $topicName = Topic::where("id", $id)->get("title");

        foreach ($section as $section_field) {
            $section_field->title = json_decode($section_field->title);
            $section_field->what_i_learned = json_decode($section_field->what_i_learned);
        }

        return [
            'status' => 200,
            'data' => $section,
            'topic_name' => $topicName
        ];
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'contain' => 'required|string',
            'topic_id' => 'exists:topics,id|required|int',
        ]);

        $newSection = Section::create([
            'title' => $request->get('title'),
            'contain' => $request->get('contain'),
            'topic_id' => $request->get('topic_id'),
        ]);

        return [
            'status' => 200,
            'data' => $newSection,
            'message' => 'Seciton is store',
        ];
    }

    public function update(Request $request, Section $section)
    {
        $request->validate([
            'title' => 'string',
            'contain' => 'string',
            'topic_id' => 'exists:topics,id|int',
        ]);

        $section->update($request->all());

        return [
            'status' => 200,
            'message' => 'Section has been update successfully',
        ];
    }

    public function destroy(Section $section)
    {
        $section->deleteOrFail();

        return [
            'status' => 200,
            'message' => 'Section has been delete successfully',
        ];
    }
}
