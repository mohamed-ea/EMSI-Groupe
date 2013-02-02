@layout('layouts.default')

@section('content')

<!--h2 class="title title-line" style="margin-bottom: 20px;"><span>Publier une nouvelle question </span></h2-->

@if(Auth::check())
  @if($errors->has())
    <p>Error :</p>
    <ul>
      {{ $errors->first('question', '<li>Veuillez vérifiez votre question</li>') }}
    </ul>
  @endif

  <div class="form-wrapper in-touch">
    
    <div id="form-ask"></div>

    {{ Form::open('ask', 'POST') }}
      {{ Form::token() }}

      <div class="row">
        <input type="text" name="question" id="form-subject" class="span6" value="{{ Input::old('question') }}"  placeholder="Quelle est votre question ?"/>
      </div>

      <div class="row">
        <textarea name="details" id="form-comments" class="span6" placeholder="Détaillez votre question (Voulez-vous une bonne réponse ? Posez une question claire et précise.)">{{ Input::old('details') }}</textarea>      

      </div>

      <input type="submit" name="Valider" value="Valider" id="submit" class="blue pull-right" />

      <div class="clear"></div>

    </form>
  </div>
@else
  <p>Veuillez vous connecter d'abord.</p>
@endif

@endsection