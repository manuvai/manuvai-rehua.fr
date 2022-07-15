<?php

use App\Entity\Project;

$projectsData = [
    [
        'name' => 'MyAnimeList',
        'text' => '',
        'imgSrc' => '/public/images/anime-list.gif',
    ],
    [
        'name' => 'Formulaire VCRT',
        'text' => '',
        'imgSrc' => '/public/images/formulaire-vcrt.png',
    ],
    [
        'name' => 'La Roue des KDOs',
        'text' => '',
        'imgSrc' => '/public/images/laroue8ans.png',
    ],
    [
        'name' => 'Le jeu du pendu',
        'text' => '',
        'imgSrc' => '/public/images/laroue8ans.png',
    ],
    [
        'name' => 'Le jeu du morpion',
        'text' => '',
        'imgSrc' => '/public/images/morpion.png',
    ],
];
$projects = [];

foreach ($projectsData as $data) {
    $projects[] = new Project($data['name'], $data['text'], $data['imgSrc']);
}

?>
<h2>Mes projets</h2>
<div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
    <?php foreach ($projects as $project) : ?>
        <div class="col">
            <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?= $project->imgSrc ?>');background-position: center top;-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">
                <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                    <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold"><?= $project->name ?></h3>
                    <ul class="d-flex list-unstyled mt-auto">
                        
                    </ul>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>