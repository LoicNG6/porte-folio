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

    public function show($subject_ids)
    {
        $contents = DB::table("subject_contents")
            ->whereIn("subject_id", $subject_ids)
            ->get();

        return [
            "status" => 200,
            "data" => $contents
        ];
    }
}
