<?php

class Member extends Basemodel {
	
    public static $rules = array(
        'name' => 'required|between:4,24' ,
        'email' => 'required|email',
        'psw' => 'required|between:4,24|confirmed',
        'psw_confirmation' => 'required|between:4,24',
     );

	public function questions()
    {
        return $this->has_many('Question');
    }

	public function answers()
    {
        return $this->has_many('Answer');
    }

	public function comments()
    {
        return $this->has_many('Comment');
    }

    public function city()
	{
	    return $this->belongs_to('City','cityid');
	}

}