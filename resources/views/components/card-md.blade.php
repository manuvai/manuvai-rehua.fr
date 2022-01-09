<div class="col-sm-4">
    <div class="card mb-2">
        @if (isset($element['imgSrc']))
            <img class="card-img-top" 
                src="{{$element['imgSrc'] ?? ''}}" 
                alt="{{$element['title'] ?? ''}}"
                style="{{$element['imgStyle'] ?? ''}}" />
        @endif
        <div class="card-body">
            <h5 class="card-title">{{$element['title'] ?? ''}}</h5>
            <p class="card-text">{{$element['text'] ?? ''}}</p>
        </div>
    </div>
</div>
