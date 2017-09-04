<?php
class Weight {

    protected $weight;

    public function __construct($weight)
    {
        $this->weight = $weight;
    }

    public function gain($pounds)
    {
        return new static($this->weight + $pounds);
    }

    public function lose($pounds)
    {
        return new static($this->weight - $pounds);
    }

}

class WorkoutPlaceMember {

    protected $name;

    public function __construct($name, Weight $weight)
    {
        $this->name = $name;
    }

    public function workoutFor(TimeLength $length)
    {
        return $this->name." Проработал ". $length->inHours();
    }
}

class TimeLength {

    protected $seconds;

    private function __construct($seconds)
    {
        $this->seconds = $seconds;
    }

    public static function fromMinutes($minutes)
    {
        return new static($minutes * 60);
    }

    public static function fromHours($hourse)
    {
        return new static($hourse * 60 * 60);
    }

    public function inSeconds()
    {
        return $this->seconds;
    }
    public function inHours()
    {
        return $this->seconds / 60 / 60;
    }
}



$john = new WorkoutPlaceMember('John', new Weight(160));
echo $john->workoutFor(TimeLength::fromHours(3));
