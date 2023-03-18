<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $subject = DB::table("subjects")->where("id", $id)->get();

        foreach ($subject as $subject_field) {
            $subject_field->started_at = json_decode($subject_field->started_at);
            $subject_field->ended_at = json_decode($subject_field->ended_at);
            $subject_field->team = json_decode($subject_field->team);
        }

        return [
            "status" => 200,
            "data" => $subject
        ];
    }
}
