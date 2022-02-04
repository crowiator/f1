<link rel="stylesheet" href="{{ asset('css/comments/index.css') }}">

    <div class="row bootstrap snippets bootdeys">
        <div class="col-md-12 col-sm-12">
            <div class="comment-wrapper">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Comment panel
                    </div>
                    <div class="panel-body">
                        @auth
                        @include('comments.create')
                        @endauth
                        <div class="clearfix"></div>
                        <hr>
                        <ol class="media-list">
                            @foreach($post->comments as $comment)
                                <li class="media">
                                    @include('comments.show')
                                </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>

        </div>
    </div>

