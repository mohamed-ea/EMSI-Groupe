<?php

class Country extends Eloquent {

	public function cities()
    {
        return $this->has_many('City');
    }
}