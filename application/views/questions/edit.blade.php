@layout('layouts.default')

@section('content')

<h2 class="title title-line" style="margin-bottom: 20px;"><span>Modifier votre question </span></h2>

@if(Auth::check())
  @if($errors->has())
    <p>Error :</p>
    <ul>
      {{ $errors->first('question', '<li>:message</li>') }}
    </ul>
  @endif

  <div class="form-wrapper in-touch">
    
    <div id="form-ask"></div>

    {{ Form::open('question/update', 'PUT') }}
      {{ Form::token() }}

      <div class="row">
        <label for="question">Titre <small>(Votre question)</small> :</label><br>
        <input type="text" name="question" id="form-question" class="input-xlarge" value="{{ e($question->title) }}" />
      </div>

      <div class="textarea-block">
        <textarea required="" rows="6" cols="40" id="form-details" name="details">{{ e($question->description) }}</textarea>
      </div>

      <input type="submit" name="Valider" value="Valider" id="submit" class="blue pull-right" />

      <div class="clear"></div>

    </form>
  </div>
@else
  <p>Veuillez vous connecter d'abord.</p>
@endif

@endsection