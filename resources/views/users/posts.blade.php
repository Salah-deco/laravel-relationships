<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               @foreach($users as $user)
                    <h2>{{ $user->name }}</h2>
                    <ul>
                       @foreach($user->posts as $post)
                            <li>{{ $post->title }}</li>
                       @endforeach
                    </ul>
               @endforeach
            </div>
        </div>
    </div>
</div>