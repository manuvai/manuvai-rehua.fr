<?php

use App\Entity\Experience;

$experiencesData = [
    0 => [
        'name' => 'Technicien d\'études et de développement',
        'start_date' => '2021-11-01',
        'end_date' => '2022-05-31',
        'employer' => 'Vodafone Polynésie',
        'description' => 'Tout ça Tout ça',
        'type' => 'job',
    ],
    1 => [
        'name' => 'Analyste développeur junior',
        'start_date' => '2020-11-01',
        'end_date' => '2022-10-31',
        'employer' => 'Vodafone Polynésie',
        'description' => 'Tout ça Tout ça',
        'type' => 'job',
    ],
    2 => [
        'name' => 'Stagiaire analyste développeur',
        'start_date' => '2020-07-01',
        'end_date' => '2022-08-31',
        'employer' => 'Vodafone Polynésie',
        'description' => 'Mise en place de quelque chose',
        'type' => 'job',
    ],
    3 => [
        'name' => 'Stagiaire analyste développeur',
        'start_date' => '2020-11-01',
        'end_date' => '2022-10-31',
        'employer' => 'Vodafone Polynésie',
        'description' => 'Tout ça Tout ça',
        'type' => 'job',
    ],
];
$experiences = [];
foreach ($experiencesData as $exp) {
    $experiences[] = new Experience($exp['name'], $exp['start_date'], $exp['end_date'], $exp['employer'], $exp['description'], $exp['type']);
}

?>

<div class="container">
    <h2>Mes exp&eacute;riences</h2>
    <div class="accordion row g-4 py-5" id="accordionExample">
        <?php foreach (array_slice($experiences, 0, 3) as $index => $experience): ?>
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading<?= $index ?>">
                <button class="accordion-button <?= $index != 0 ? 'collapsed' : '' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $index ?>" aria-expanded="<?= $index == 0 ? 'true' : 'false' ?>" aria-controls="collapse<?= $index ?>">
                    <span class="bi bi-<?= ($experience->type == 'job' ? 'briefcase' : ($experience->type == 'school' ? 'book' : 'clipboard')) ?>">
                    <?= $experience->getDateLabel() ?>&nbsp;-&nbsp;<?= $experience->name ?>
                </button>
            </h2>
            <div id="collapse<?= $index ?>" class="accordion-collapse collapse <?= $index == 0 ? 'show' : '' ?>" aria-labelledby="heading<?= $index ?>" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <?= $experience->description ?>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>

</div>