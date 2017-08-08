<?php
/**
 * Created by PhpStorm.
 * User: Emperical
 */

namespace app\models\ratings;


class RatingTemplate
{
    /**
     * Class-Delegate
     */
    private $rating;

    public function __construct($rating)
    {
        $this->rating = $rating;
    }

    public function get()
    {
        return $this->rating->get();
    }
}