<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {
        $topics = DB::table("Topics")->get();

        //convert string object from db to object
        foreach ($topics as $topic) {
            $topic->title = json_decode($topic->title);
            $topic->teaser = json_decode($topic->teaser);
            $topic->image = json_decode($topic->image);
            $topic->started_at = json_decode($topic->started_at);
            $topic->ended_at = json_decode($topic->ended_at);
        }

        return [
            'status' => 200,
            'data' => $topics,
        ];
    }


    /**
     * Display the specified resource.
     *
     * @param  int $topic
     * @return array
     */
    public function show(Int $id)
    {
        $topic = Topic::findOrFail($id);

        $topic->title = json_decode($topic->title);
        $topic->teaser = json_decode($topic->teaser);
        $topic->image = json_decode($topic->image);
        $topic->started_at = json_decode($topic->started_at);
        $topic->ended_at = json_decode($topic->ended_at);

        return [
            'status' => 200,
            'data' => $topic,
        ];
    }
}
