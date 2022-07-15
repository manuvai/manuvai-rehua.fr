<?php

use App\Entity\Skill;

$skillsData = [
    [
        'key' => 'php',
        'categ' => 'web',
        'title' => 'PHP',
        'text' => '',
        'style' => [
            'filter' => 'invert(47%) sepia(38%) saturate(412%) hue-rotate(198deg) brightness(97%) contrast(93%)',
        ],
        'imgSrc' => 'public/images/php-icon.svg',
    ],
    [
        'key' => 'vue',
        'categ' => 'web',
        'title' => 'VueJS',
        'text' => '',
        'style' => [],
        'imgSrc' => 'public/images/vue-icon.svg',
    ],
    [
        'key' => 'html',
        'categ' => 'web',
        'title' => 'HTML',
        'text' => '',
        'style' => [
            'filter' => 'invert(56%) sepia(81%) saturate(3784%) hue-rotate(345deg) brightness(98%) contrast(93%)',
        ],
        'imgSrc' => 'public/images/html-icon.svg',
    ],
    [
        'key' => 'js',
        'categ' => 'web',
        'title' => 'Javascript',
        'text' => '',
        'style' => [
            'filter' => 'invert(83%) sepia(77%) saturate(530%) hue-rotate(343deg) brightness(96%) contrast(103%)',
        ],
        'imgSrc' => 'public/images/js-icon.svg',
    ],
    [
        'key' => 'mysql',
        'categ' => 'db',
        'title' => 'MySQL',
        'text' => '',
        'style' => [],
        'imgSrc' => 'public/images/mysql-icon.svg',
    ],
    [
        'key' => 'pgsql',
        'categ' => 'db',
        'title' => 'PostgreSQL',
        'text' => '',
        'style' => [],
        'imgSrc' => 'public/images/postgresql-icon.svg',
    ],
    [
        'key' => 'oracle',
        'categ' => 'db',
        'title' => 'Oracle',
        'text' => '',
        'style' => [],
        'imgSrc' => 'public/images/oracle-icon.svg',
    ],
    [
        'key' => 'github',
        'categ' => 'other',
        'title' => 'Github',
        'text' => '',
        'style' => [],
        'imgSrc' => 'public/images/github-icon.svg',
    ],
    [
        'key' => 'java',
        'categ' => 'other',
        'title' => 'Java',
        'text' => '',
        'style' => [],
        'imgSrc' => 'public/images/java-icon.svg',
    ],
    [
        'key' => 'composer',
        'categ' => 'web',
        'title' => 'Composer',
        'text' => '',
        'style' => [],
        'imgSrc' => 'public/images/composer-icon.svg',
    ],
];
$skills = [];
foreach ($skillsData as $index => $data) {
    $skills[] = new Skill(
        $data['title'],
        $data['categ'],
        $data['text'],
        $data['style'],
        $data['imgSrc'],
        $data['key']
    );
}
?>

<h2>Mes comp&eacute;tences</h2>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 py-5">
    <?php foreach ($skills as $skill) : ?>
        <?php
            $style = implode(";", 
                array_map(
                    function($key) use ($skill) {
                        return sprintf('%s:%s', $key, $skill->style[$key]);
                    }, 
                    array_keys($skill->style)
                )
            );
        ?>
        <div class="col d-flex align-items-start">

            <img class="card-img-top" src="<?= $skill->imgSrc ?>" style="<?= $style ?>;width:65px !important;" alt="<?= $skill->key ?? '' ?> + '-icon'" />
            <div>
                <h4 class="fw-bold mb-0"><?= $skill->name ?></h4>
                <p><?= $skill->text ?></p>
            </div>
        </div>
    <?php endforeach ?>
</div>