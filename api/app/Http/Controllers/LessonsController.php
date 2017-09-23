<?php

namespace App\Http\Controllers;



use App\Acme\Transformers\LessonTransformer;
use App\Lesson;
use Illuminate\Http\Request;

class LessonsController extends ApiController
{

    protected $lessonTransformer;

    /**
     * LessonsController constructor.
     * @param LessonTransformer $lessonTransformer
     */
    public function __construct(LessonTransformer $lessonTransformer)
    {
        $this->lessonTransformer = $lessonTransformer;
        $this->middleware('auth.basic')->except(['index', 'show']);
    }

    /**
     * @return mixed
     */
    public function index()
    {
        // $lessons = Lesson::all(); it's bad idea

        $limit = request()->input('limit') ?? 5;
        $lessons = Lesson::paginate($limit);

        return $this->respond([
            'data' => $this->lessonTransformer->transformCollection($lessons->all()),
            'paginator' => [
                'total_count' => $lessons->total(),
                'current_page' => $lessons->currentPage(),
                'total_pages' => ceil($lessons->total() / $lessons->perPage()),
                'limit' => $lessons->perPage()
            ]

        ]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $lesson = Lesson::find($id);

        if( ! $lesson)
        {
            return $this->respondNotFound('This lesson was not found');
        }

       return $this->respondWithPagination($lesson, [
            'data' => $this->lessonTransformer->transform($lesson)

        ]);

    }

    public function store(Request $request)
    {
        if( ! $request->input('title') or ! $request->input('body'))
        {
            return $this->setStatusCode(422)->respondWithError('Parameters failed validation');
        }

        Lesson::create($request->all());

       return $this->respondCreated('The lesson was created!');
    }

}
