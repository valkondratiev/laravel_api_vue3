<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentResourse;
use App\Models\Comment;
use App\Models\Image;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Request $request, Image $image) {

        $request->validate([
            'page' => 'required|integer'
        ]);


        $comments = $image->comments()->paginate();

        return CommentResourse::collection($comments);

    }

    public function store(Request $request, Image $image)
    {
        $request->validate([
            'text' => 'required|string'
        ]);

        if (auth('sanctum')->user()->id != $image->user_id) {
            return response()->json([
                'message' => 'Permission denied'
            ], 403);
        }

        $comment = Comment::create([
            'text' => $request->text,
            'user_id' => auth('sanctum')->user()->id,
            'image_id' => $image->id
        ]);

        return response()->json([
            'id' => $comment->id,
            'date' => $comment->created_at->timestamp,
            'text' => $comment->text
        ]);
    }

    public function destroy(Image $image, Comment $comment) {

        if($comment->image_id != $image->id) {
            return response()->json([
                'message' => 'No comment for image with received comment id'
            ], 404);
        }

        if (auth('sanctum')->user()->id != $comment->user_id) {
            return response()->json([
                'message' => 'Permission denied'
            ], 403);
        }

        $comment->delete();
        return response()->noContent();
    }

}
