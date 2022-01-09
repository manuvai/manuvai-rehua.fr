<div class="container mt-4">
    <h2 id="projects">Projets r&eacute;alis&eacute;s</h2>
    <div class="row">
        @foreach ($projects as $element)
            @include('components.card-md')
            
        @endforeach
    </div>
</div>
