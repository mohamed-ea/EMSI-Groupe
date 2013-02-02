@layout('layouts.default')

@section('content')

<h2 class="title title-line" style="margin-bottom: 20px;"><span>Formulaire d'inscription </span></h2>

@if($errors->has())
	<p>Error :</p>
	<pre>
		<?php print_r($errors);?>
	</pre>
	<ul>
		{{ $errors->first('name', '<li>Veuillez saisir votre nom.</li>') }}
		{{ $errors->first('password', '<li>Veuillez saisir votre mot de passe.</li>') }}
		{{ $errors->first('password_confirmation', '<li>Confirmez correctement votre mot de passe.</li>') }}
	</ul>
@endif

<div class="form-wrapper in-touch">
	
	<div id="form-message"></div>

	<!--form method="post" action="doc.php" name="contactform" id="contactform"-->
	{{ Form::open('register', 'POST') }}
		{{ Form::token() }}
		<div class="row">
			Nom :
			<input type="text" name="name" placeholder="Votre nom complet" id="form-name" value="{{ Input::old('name') }}" />
		</div>
		<div class="row">
			Email :
			<input type="email" name="email" placeholder="Email valide pour reçevoir la confirmation" id="form-email" value="{{ Input::old('email') }}" />
		</div>


		<div class="row">
			Mot de passe : 			
			<input type="password" name="psw" id="form-psw" />

		</div>
		<div class="row">
			Confirmation : 
			<input type="password" name="psw_confirmation" id="form-psw" />
		</div>

		<!--div class="row">
			Status :
			<input type="date" name="subject" placeholder="Date de naissance" id="form-subject" />
		</div>
		<div class="row">
			Date de naissance :
			<input type="date" name="ddn" placeholder="Date de naissance" id="form-ddn" />
		</div>

		<div class="row">
			Ville :
			<input type="text" name="ville" placeholder="Votre ville" id="form-ville" />
		</div>
		<div class="row">
			Présentation :
			<textarea placeholder="A propos de vous ..." name="about" id="form-about"> {{ Input::old('about') }}</textarea>
		</div>

		<div id="captcha" class="pull-left">
			<span>3+1=</span>
			<input type="text" name="verify" id="form-verify"/>
		</div-->

		<input type="submit" name="Valider" value="Valider" id="submit" class="blue pull-right" />

		<div class="clear"></div>

	</form>
</div>


@endsection