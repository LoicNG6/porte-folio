<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
{
    //get all sections
    public function index()
    {
        $sections = Section::all();

        return [
            'status' => 200,
            'data' => $sections,
        ];
    }

    //get one section
    public function show(int $id)
    {
        $section = Section::where("topic_id", $id)->get();
        
        return [
            'status' => 200,
            'data' => $section,
        ];
    }

    //Store section
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

    //update Section
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

    //delete section
    public function destroy(Section $section)
    {
        $section->deleteOrFail();

        return [
            'status' => 200,
            'message' => 'Section has been delete successfully',
        ];
    }
}
