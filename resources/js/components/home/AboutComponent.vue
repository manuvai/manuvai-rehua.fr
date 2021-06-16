<template>
    <div class="custom-wrapper" id="about">
        <div class="row">
            <div class="col-md-10 offset-md-2 mt-2">
                <h2 class="display-4">&Agrave; propos</h2>
                <p class="lead">
                    &Agrave; l'issue de ma formation en informatique &agrave; l'Universit&eacute; de la Polyn&eacute;sie fran&ccedil;aise, j'ai eu la chance d'exp&eacute;rimenter le monde du web tant d'un point de vue logique que pratique.
                </p>
                <p class="lead">
                    Je compte reprendre mes &eacute;tudes &agrave; Bordeaux dans une <a href="https://www.u-bordeaux.fr/formation/2016/PRMA_64/methodes-informatiques-appliquees-a-la-gestion-des-entreprises-miage" target="_blank" rel="noopener noreferrer">formation MIAGE en alternance</a>.<br>
                    L'alternance c'est : <b class="font-weight-bold">3 mois en entreprise</b> et <b class="font-weight-bold">3 mois &agrave; l'universit&eacute;</b>
                    <br>
                    Si ce rythme vous convient, n'h&eacute;sitez pas &agrave; <a :href="'mailto:' + config.mail">me contacter.</a> Je serai ravi d'entreprendre des &eacute;changes avec vous dans le sujet d'int&eacute;grer votre entreprise
                </p>
                <p class="lead">
                    &Agrave; pr&eacute;sent <b class="font-weight-bold">d&eacute;veloppeur web Junior</b> chez Vodafone Polyn&eacute;sie,
                    je me perfectionne sur le d&eacute;veloppement web &agrave; travers le d&eacute;veloppement de jeux et de formulaires pour les campagnes publicitaires et &eacute;v&eacute;nements de <span class="vf">Vodafone</span>.
                </p>

            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        config: {}
    }
}
</script>
