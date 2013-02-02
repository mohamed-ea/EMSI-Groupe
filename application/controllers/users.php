<?php

class Users_Controller extends Base_Controller
{
	public $restful = true;

	public function get_new(){
		return View::make('users.new')->with('title','Inscription');
	}

	public function post_create(){
		$validations = Member::validate(Input::all());

		if ($validations->passes()){
			Member::create(array(
				'name'=>Input::get('name'),
				'psw'=>Hash::make(Input::get('')),
				'email'=>Input::get('email')
			));

			$user = User::where_email(Input::get('email'))->first();
			Auth::login($login);

			return Redirect::to_route('home')->with('message', 'Votre compte a été créé avec succès. Un mail contenant un lien d\'activation vous a été envoyé à votre email.');
		}else{
			return Redirect::to_route('register')->with_errors($validations)->with_input();
		}
	}

	public function get_login(){
		return View::make('users.login')->with('title','Identifiez-vous');
	}

	public function post_login(){
		$user = array(
			'username'=>Input::get('email'),
			'password'=>Input::get('psw')
		);

		if (Auth::attempt($user)){
			return Redirect::to_route('home')->with('message', 'Vous etes maintenant connectés.');
		}else{
			return Redirect::to_route('login')->with('message', 'Vérifiez vote email ou mot de passe.');
		}
	}

	public function get_logout(){
		if (Auth::check()){
			Auth::logout();
			return Redirect::to_route('login')->with('message', 'Vous etes maintenant déconnecté.');
		}else{
			return Redirect::to_route('home');
		}
	}
}