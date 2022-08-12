<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               @foreach(array_keys($users) as $key)
                    <h2>{{ $key }}</h2>
                    <ul>
                        <li>{{ $users[$key]->name }}</li>
                        <li>{{ $users[$key]->email }}</li>
                    </ul>
               @endforeach
            </div>
        </div>
    </div>
</div>