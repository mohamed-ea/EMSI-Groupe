<?php

class Category extends Eloquent {

	public function questions()
    {
        return $this->has_many('Question');
    }


}