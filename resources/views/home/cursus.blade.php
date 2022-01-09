<div class="container mt-4">
    <h2>Parcours</h2>
    <div class="row">
        <div id="accordion">
            @foreach ($cursus as $index => $item)
                <?php $isFirst = $index === 0 ?>
                @include('components.accordion')
            @endforeach
        </div>

    </div>
</div>
