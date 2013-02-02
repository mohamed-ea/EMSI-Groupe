<?php

class Comment extends Eloquent {
	
	public function member()
	{
	    return $this->belongs_to('Member','member_id');
	}

	public function question()
	{
	    return $this->belongs_to('Question','question_id');
	}
}