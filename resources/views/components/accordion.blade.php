<div class="card">
    <div class="card-header" id="headingOne">
        <h5 class="mb-0">
            <button class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapse{{$index}}" aria-expanded="{{ $isFirst ? 'true' : ''}}"
                aria-controls="collapse{{$index}}">
                {{$item['title']}}{{(' - ' . $item['school']) ?? ''}}{{(' - ' . $item['address']) ?? ''}}
            </button>
        </h5>
    </div>

    <div id="collapse{{$index}}" class="collapse {{ $isFirst ? 'show' : ''}}" aria-labelledby="headingOne" data-bs-parent="#accordion">
        <div class="card-body">
            {!!$item['description']!!}
        </div>
    </div>
</div>
