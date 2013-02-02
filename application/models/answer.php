<?php

class Answer extends Eloquent {

	public function comments()
    {
        return $this->has_many('Comment');
    }

	public function question()
	{
	    return $this->belongs_to('Question','question_id');
	}
	
	public function member()
	{
	    return $this->belongs_to('Member','member_id');
	}
}