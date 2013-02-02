@layout('layouts.default')

@section('content')

<!--h2 class="title title-line" style="margin-bottom: 20px;"><span>Connexion </span></h2>

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
@endif-->

<div class="form-wrapper in-touch">
	
	<!--div id="form-message"></div>

	<form method="post" action="doc.php" name="contactform" id="contactform"->
	{{ Form::open('login', 'POST') }}
		{{ Form::token() }}

		<div class="row">
			<label class="control-label" for="email">Email :</label>
			<div class="controls">
				<input  class="input-xlarge" type="email" name="email" value="{{ Input::old('email') }}" />
			</div>
		</div>

		<div class="row">
			<label class="control-label" for="psw">Mot de passe :</label>
			<div class="controls">
				<input  class="input-xlarge" type="password" name="psw" id="form-psw" />
			</div>

		</div>

		<input type="submit" name="Valider" value="Valider" id="submit" class="btn blue" />

		<div class="clear"></div>

	</form-->

    <div class="container">
	    <div class="row">
		    <div class="span4 offset2 well">
			    <legend>Connexion</legend>
			    @if($errors->has())
			    <div class="alert alert-error">
			    	<a class="close" data-dismiss="alert" href="#">×</a>
					<ul>
						{{ $errors->first('name', '<li>Veuillez saisir votre nom.</li>') }}
						{{ $errors->first('password', '<li>Veuillez saisir votre mot de passe.</li>') }}
						{{ $errors->first('password_confirmation', '<li>Confirmez correctement votre mot de passe.</li>') }}
					</ul>
			    </div>
				@endif
			    {{ Form::open('login', 'POST') }}
					{{ Form::token() }}
				    <input type="text" id="email" class="span4" name="email" placeholder="Email">
				    <input type="password" id="psw" class="span4" name="psw" placeholder="Mot de passe">

					<input type="submit" name="Valider" value="Se connecter" id="submit" class="btn blue" />
			    </form>
		    </div>
	    </div>
    </div>

</div>


@endsection