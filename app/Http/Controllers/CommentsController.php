<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CommentsController extends Controller
{
    public function post(Request $request)
    {
        $now = Carbon::now();
        $param = [
            "share_id" => $request->share_id,
            "user_id" => $request->user_id,
            "content" => $request->content,
            "created_at" => $now,
            "updated_at" => $now
        ];
        DB::table('comments')->insert($param);
        return response()->json([
            'message' => 'Comment created successfully',
            'data' => $param
        ], 200);
    }
    public function get(Request $request) {
        $items = DB::table('comments')->get();
        return response()->json([
            'message' => 'CommnetGet!',
            'data' => $items
        ],200);
    }
    public function delete(Request $request) {
        $items = DB::table('comments')->where('id',$request->id)->delete();
        return response()->json([
            'message' => 'commentDelete!',
            'data' => $items
        ],200);
    }
}
