
@foreach ($linkedinPost->medias as $media)
<div class="card" style="width: 18rem;">
    <img src="{{asset('storage/' . $media->path)}}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{$media->title}}</h5>
        <p class="card-text">{{$media->description}}</p>
        <form action="{{route('linkedin-posts.media.destroy', $media->id)}}" method="post">
            @csrf
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
    </div>
</div>
@endforeach
