@layout('layouts.default')

@section('content')

<div class="blog-container" id="blog">
            
            <!-- Article post -->
            <article class="blog-post">
              
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
                  <p class="meta-details">Publié dans "{{ HTML::link_to_route('questions', e($question->category->name), $question->category->id) }}"</p>
                </div>
                
              </div>

              <div class="post-content">
                <p>{{ e($question->description) }}</p>
              </div>

            </article>

            <!-- Tags >
            <div class="tag-cloud">
              <a href="#">IT</a>
              <a href="#">Java</a>
              <a href="#">.Net</a>
            </div-->

            <div class="about-author-wrapper radius">
              
              <div class="about-author-avartar">
                <img alt="Author" src="https://graph.facebook.com/Mohamed.El.Allali/picture?width=80&height=100">
              </div>

              <div class="about-author-info">
                <h6>{{ HTML::link_to_route('member', e($question->member->name), $question->member->id) }}</h6>
                <p>{{ e($question->member->about) }}</p>
                Participation : 
                <span class=" badge badge-important">{{ e($question->member->questions()->count()) }} question<?php if($question->member->questions()->count()>1) echo's' ?></span> 
                <span class=" badge badge-info">{{ e($question->member->answers()->count()) }} réponse<?php if($question->member->answers()->count()>1) echo's' ?></span>
                <span class=" badge badge-success">{{ e($question->member->answers()->count()) }} bonne<?php if($question->member->answers()->count()>1) echo's' ?> réponse<?php if($question->member->answers()->count()>1) echo's' ?></span>
              </div>

              <div class="clear"></div>

            </div>

            <h6 class="comment-title title-line"><span>{{ e($question->answers()->count()) }} réponse(s)</span></h6>
            
            @if($question->answers()->count() == 0)
              <p>Soyez le 1er à répondre.</p>
            @else

              @foreach($question->answers as $answer)
                <ul id="comments">
                  <li class="comment">

                    <div class="comment-container">
                      <!--div class="avatar">
                        <img alt="User avatar" src="images/avatar.png">
                      </div-->
                      <div class="comment-post">
                        <h4 class="user"><a href="#">{{ e($answer->member->name) }}</a></h4>
                        <p class="comment-meta">{{  strftime('%a %d %b %Y à %H:%M', strtotime($answer->created_at)) }}</p>
                        <p class="comment-entry">{{ e($answer->description) }}</p>
                      </div>
                    </div>

                  </li>

                </ul>
              @endforeach

            @endif

            <div id="respond">

              <h6 class="comment-title title-line"><span>Votre réponse</span></h6>

              <form class="comments-form" method="post">

                <div class="textarea-block">
                  <textarea required="" rows="6" cols="40" id="comment-message" placeholder="Soyez le plus précis et détaillé possible." name="message"></textarea>
                </div>

                <input type="submit" value="Publier" class="button blue">

                <div class="clear"></div>

              </form>

            </div>

          </div>


@endsection