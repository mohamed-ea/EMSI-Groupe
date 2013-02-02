<?php

class Question extends Basemodel {

	public static $rules = array(
		'question'=>'required|min:10',
		'solved'=>'in:0,1'
		);

	public function member()
	{
	    return $this->belongs_to('Member','member_id');
	}

	public function category()
	{
	    return $this->belongs_to('Category','category_id');
	}

	public function answers()
    {
        return $this->has_many('Answer');
    }

	public static function opens()
    {
        return static::where('status', '>=', 0)->order_by('id', 'DESC')->paginate(3);
    }

	public static function my_questions()
    {
        return static::where('member_id', '=', Auth::user()->id)->order_by('id', 'DESC')->paginate(8);
    }
}