<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               @foreach($users as $user)
                    <h2>{{ $user->name }}</h2>
                    <ul>
                       @foreach($user->addresses as $address)
                            <li>{{ $address->country }}</li>
                       @endforeach
                    </ul>
               @endforeach
            </div>
        </div>
    </div>
</div>