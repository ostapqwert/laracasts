<?php


namespace App\Acme\Transformers;


class LessonTransformer extends Transformer
{

    /**
     * @param $lessons
     * @return array
     */
    public function transform($lesson)
    {
        return [
            'title' => $lesson['title'],
            'body' => $lesson['body'],
            'active' => (boolean) $lesson['some_bool']
        ];
    }
}