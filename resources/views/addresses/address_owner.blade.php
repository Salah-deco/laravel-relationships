<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               @foreach($addresses as $address)
                    <h2>{{ $address->country }}</h2>
                    <ul>
                        <li>{{ $address->owner->name }}
                        <li>{{ $address->owner->email }}
                    </ul>
               @endforeach
            </div>
        </div>
    </div>
</div>