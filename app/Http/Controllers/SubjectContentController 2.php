<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class SubjectContentController extends Controller
{
    public function index()
    {
        $content = DB::table("subject_contents")->get();

        return [
            "status" => 200,
            "data" => $content
        ];
    }

    public function show(int $subject_id, String $language)
    {
        $content = DB::table("subject_contents")
            ->where("subject_id", $subject_id)
            ->where("language", $language)
            ->get();

        return [
            "status" => 200,
            "data" => $content
        ];
    }
}
