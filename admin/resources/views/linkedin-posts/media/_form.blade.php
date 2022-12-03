
<form class="collapse" action="{{route('linkedin-posts.media.store')}}" id="collapseExample" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="post_id" value="{{$linkedinPost->id}}">
    <div class="form-group mb-4">
        <label for="title">Titre</label>
        <input type="text" value="" class="form-control" name="title" id="linkedin_badge" placeholder="Titre">
    </div>
    <div class="form-group mb-4">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" id="description" placeholder="Description"></textarea>
    </div>
    <div class="input-group mb-3">
        <label class="input-group-text" for="media_file">Upload</label>
        <input type="file" name="media_file" class="form-control" id="media_file">
    </div>
    <button type="submit" class="btn btn-primary">Ajouter un media</button>
</form>
