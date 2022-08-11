<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               @foreach($posts as $post)
                    <h2>{{ $post->title }}</h2>
                    <p>created by <b>{{ $post->user->name }}</b></p>
                    
               @endforeach
            </div>
        </div>
    </div>
</div>