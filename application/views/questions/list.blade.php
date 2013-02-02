@layout('layouts.default')

@section('content')

          <!-- #blog -->
          <div id="blog" class="blog-style-1">
            
            @if(!$questions->results)
              <p>Aucune question en attente de meilleur réponse.</p>
            @else
              @foreach($questions->results as $question)
              <!-- Article post -->
              <article class="post">
                
                <div class="post-meta">

                  <!-- Meta date -->
                  <div class="meta-date">
                    <span class="day">{{ strftime('%d', strtotime($question->created_at)) }}</span>
                    <span class="month">{{ strftime('%b', strtotime($question->created_at)) }}</span>
                    <span class="year">{{ strftime('%Y', strtotime($question->created_at)) }}</span>
                  </div>

                  <div class="meta-title">
                    <h2 class="title">
                      {{ HTML::link_to_route('question', e($question->title), $question->id) }}
                    </h2>
                    <!--p class="meta-details">Publié par {{ HTML::link_to_route('member', e($question->member->name), $question->member->id) }} dans ""</p-->
                  </div>
                  
                </div>

                <div class="post-content">
                  <p>{{ e(Str::limit($question->description, 120)) }}</p>

                  <p class="meta-more">
                    <!--Tags:<a href="#"><span class="label label-info">Snipp</span></a><a href="#"><span class="label label-info">Bootstrap</span></a>| -->
                    <i class="icon-user"></i><a href="/{{ $question->member->id }}">{{ e($question->member->name) }}</a>
                    | <i class="icon-folder-open"></i>{{ HTML::link_to_route('questions', e($question->category->name), $question->category->id) }}
                    | <i class="icon-calendar"></i>{{ strftime('%d %b %Y %H:%m', strtotime($question->created_at)) }}
                    | <i class="icon-comment"></i><a href="/question/{{$question->id}}#reponses">{{ e($question->answers()->count()) }} réponse(s)</a>
                    | <i class="icon-share"></i><a href="/question/{{$question->id}}">Lire la suite</a>
                    <!-- {{ HTML::link_to_route('question', 'Lire la suite', $question->id) }}-->
                  </p>
                </div>

              </article>
              @endforeach
            @endif

          </div>

          <!-- Pagination -->

          <div class="pagination">
           {{ $questions->links() }}
          </div>

@endsection