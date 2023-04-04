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
        $subject_info = DB::table("subjects")->where("section_id", $id)->get();
        $subject_ids = [];

        foreach ($subject_info as $info) {
            $info->team = json_decode($info->team);
            $info->started_at = json_decode($info->started_at);
            $info->ended_at = json_decode($info->ended_at);
            array_push($subject_ids, $info->id);
        }

        $subject_contents = (new SubjectContentController)->show($subject_ids)["data"]->all();
        $subject_info_contents = [];

        foreach ($subject_info as $info) {
            $temp = [];
            foreach ($subject_contents as $content) {
                if ($content->subject_id == $info->id) {
                    array_push($temp, $content);
                }
            }
            array_push($subject_info_contents, [
                "info" => $info,
                "contents" => $temp
            ]);
        }

        return [
            "status" => 200,
            "data" => $subject_info_contents
        ];
    }
}
