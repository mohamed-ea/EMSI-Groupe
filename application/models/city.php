<?php

class City extends Eloquent {

	public function members()
    {
        return $this->has_many('Member');
    }

    public function country()
	{
	    return $this->belongs_to('Country','country_id');
	}
}