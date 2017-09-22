<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class LessonsController extends Controller
{
    public function index()
    {
        $lessns = Lesson::all();

        return Response::json([
            'data' => $lessns->toArray()
        ], 404);
    }

    public function show($id)
    {
        $lesson = Lesson::find($id);

        if( ! $lesson)
        {
            return Response::json([
                'error' => [
                    'message' => 'This lesson was not found'
                ]
            ], 404);
        }

        return Response::json([
            'data' => $lesson->toArray()
        ]);

    }
}
