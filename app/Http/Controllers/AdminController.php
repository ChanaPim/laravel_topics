<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    function index()
    {
        $topics=DB::table('topics')
        ->leftJoin('topic_comments', 'topics.topic_id', '=', 'topic_comments.topic_id')
        ->select(
            'topics.topic_id',
            'topics.topic_title',
            'topics.created_at',
            DB::raw('COUNT(topic_comments.topic_id) as comment_count')
        )
        ->groupBy('topics.topic_id', 'topics.topic_title', 'topics.created_at')->get();
        return view('topiclist',compact('topics'));
    }
    function create()
    {
        return view('topicform');
    }

    function insert(Request $request)
    {
        $request->validate([
            'topic_title'=>'required|max:200',
            'topic_content'=>'required',
            'create_by'=>'required|max:20'
        ]);
        $data=[
            'topic_title'=>$request->topic_title,
            'content'=>$request->topic_content,
            'create_by'=>$request->create_by,
        ];
        // dd($data);
        DB::table('topics')->insert($data);
        // เขียน Log หลังบันทึก
        Log::channel('topiclog')->info('New topic created', [
            'topic_title' => $request->topic_title,
            'content' => $request->topic_content,
            'create_by' => $request->create_by
        ]);
        return redirect('/');
    }
    public function show($id)
    {
        $topics=DB::table('topics')->where('topic_id', $id)->get();
        $topic_comment=DB::table('topic_comments')->where('topic_id', $id)->get();
        //$comments
        // return view('topicinfo', compact('topic', 'comments', 'id'));
        return view('topicinfo', compact('topics','id','topic_comment'));
    }

    public function addComment(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required'
        ]);

        $data=[
            'topic_id'=>$id,
            'comment'=>$request->comment,
            'comment_by'=>'anonymous',
        ];
        //dd($data);
        DB::table('topic_comments')->insert($data);
        // เขียน Log หลังบันทึก
        Log::channel('topiclog')->info('Added Comment', [
            'topic_id' => $id,
            'comment' => $request->comment,
            'comment_by' => 'anonymous'
        ]);

        return back()->with('success', 'Comment saved.');
    }
}
