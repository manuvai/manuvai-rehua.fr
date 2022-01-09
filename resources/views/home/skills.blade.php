<div class="container mt-4">
    <h2>Comp&eacute;tences</h2>
    <div class="row">
        @foreach ($skills as $element)
            @include('components.card')
            
        @endforeach
    </div>
</div>