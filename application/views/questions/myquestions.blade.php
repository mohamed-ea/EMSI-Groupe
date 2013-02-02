@layout('layouts.default')

@section('content')

          <!--h2 class="title-line title" style="margin-bottom: 20px;"><span>Mes questions</span></h2-->
          
          @if(!$questions->results)
            <p>Vous n'avez publié aucune question.</p>
          @else
            <div class="toggle-style-2">

              @foreach($questions->results as $question)
                <div class="toggle-item">
                <a href="#" class="toggle-trigger"><i class="icon-question-sign"></i>
                  {{ e($question->title) }}
                </a>
                  <div style="display: none;" class="toggle-container">
                    <p>{{ e(Str::limit($question->description, 120)) }}</p>
                    <p>{{ HTML::link_to_route('question', 'Afficher la suite', $question->id) }} | {{ HTML::link_to_route('edit_question', 'Modifier', $question->id) }}</p>
                  </div>
                </div>
              @endforeach
            
            </div>

            <div class="pagination">
              {{ $questions->links() }}
            </div>

          @endif          

@endsection