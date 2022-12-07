<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {
        $topics = Topic::all();

        return [
            'status' => 200,
            'data' => $topics,
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function store(Request $request)
    {
        // check variables with validate method from Request class:
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        //add the new topic if '$validate' is true:
        $topic = Topic::create([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
        ]);
        return [
            'status' => 200,
            'data' => $topic,
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $products
     * @return array
     */
    public function show(Int $id)
    {
        return [
            'status' => 200,
            'data' => Topic::findOrFail($id),
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function update(Request $request, Topic $topic)
    {
        //we need to validate the news args.
        $request->validate([
            'title' => 'string',
            'description' => 'string',
        ]);

        // now, we can update attributes in our db.
        $topic->update($request->all());

        return [
            'status' => 200,
            'message' => 'Topic updated successfully',
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product $products
     * @return array
     */
    public function destroy(Topic $topic)
    {
        $topic->deleteOrFail();

        return [
            'status' => 200,
            'data' => $topic,
            'message' => 'Topic deleted successfully',
        ];
    }
}
