<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\SubjectContentController;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = DB::table("subjects")->get();

        foreach ($subjects as $subject) {
            $subject->started_at = json_decode($subject->started_at);
            $subject->ended_at = json_decode($subject->ended_at);
            $subject->team = json_decode($subject->team);
        }

        return [
            "status" => 200,
            "data" => $subjects
        ];
    }

    public function show(int $id)
    {
        $subject = DB::table("subjects")->where("section_id", $id)->get();
        $subject_ids = [];

        foreach ($subject as $subject_field) {
            $subject_field->team = json_decode($subject_field->team);
            $subject_field->started_at = json_decode($subject_field->started_at);
            $subject_field->ended_at = json_decode($subject_field->ended_at);
            array_push($subject_ids, $subject_field->id);
        }

        $subject_contents = (new SubjectContentController)->show($subject_ids);
        
        return [
            "status" => 200,
            "data" => [
                "content" => $subject_contents["data"],
                "info" => $subject[0],
            ]
        ];
    }
}
