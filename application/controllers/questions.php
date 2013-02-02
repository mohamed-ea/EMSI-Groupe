<?php

class Questions_Controller extends Base_Controller
{
	public $restful = true;

	public function __construct(){
		$this->filter('before', 'auth')->only(array('create', 'my_questions', 'edit'));
	}

	public function get_index()
	{
		return View::make('questions.list')
		-> with('title', 'Questions ouvertes')
		->with('questions', Question::opens());
	}	

	public function get_ask()
	{
		return View::make('questions.index')
		-> with('title', 'Publier une nouvelle question ');
	}

	public function post_create(){
		$validation = Question::validate(Input::all());

		if($validation->passes()){
			Question::create(array(
				'title'=>Input::get('question'),
				'description'=>Input::get('details'),
				'member_id'=>Auth::user()->id
				));
			return Redirect::to_route('home')
				->with('message', 'Votre question à été publiée.');
		}else{
			return Redirect::to_route('ask')
				->with_errors($validation)->with_input();
		}
	}

	public function get_view($id = null)
	{
		return View::make('questions.view')
		-> with('title', '')
		-> with('question', Question::find($id));
	}

	public function get_my_questions()
	{
		return View::make('questions.myquestions')
		-> with('title', 'Mes questions')
		-> with('questions', Question::my_questions());
	}

	public function question_of_user($id)
	{
		$questions = Question::find($id);

		if($questions->member_id == Auth::user()->id){
			return true;
		}else{
			return false;
		}
	}
	public function get_edit($id = NULL)
	{
		if(!$this->question_of_user($id)){
			return Redirect::to_route('my-questions')
				->with('message', 'Question invalide.');
		}
		return View::make('questions.edit')
		-> with('title', '')
		-> with('question', Question::find($id));
	}

	public function put_update(){
		$id = Input::get('question_id');

		if(!$this->question_of_user($id)){
			return Redirect::to_route('my_questions')
				->with('message', 'Question invalide.');
		}

		$validation = Question::validate(Input::all());

		if($validation->passes()) {
			Question::update($id, array(
				'question'=>Input::get(question),
				'description'=>Input::get('details')
				));
		}
	}
} 