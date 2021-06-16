<template>
    <div class="custom-wrapper" id="portfolio">
        <div class="row">
            <div class="col-md-10 offset-md-2 mt-2">
                <h2 class="display-4">Portfolio</h2>
                <p class="lead">
                    Quelques exemples des projets men&eacute;s durant mes stages et mon poste de d&eacute;veloppeur Junior
                </p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card text-white bg-dark"> 
                    <img src="/images/laroue8ans.png" class="card-img">
                    <div class="card-img-overlay opacity-cover">
                        <h5 class="card-title">La roue des KDO's</h5>
                        <p class="card-text">
                            <ul>
                                <li>Gestion de formulaire</li>
                                <li>Gestion de base de donn&eacute;es</li>
                                <li>Envoi de SMS &agrave; travers une API</li>
                            </ul>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card text-white bg-dark"> 
                    <img src="/images/formulaire-vcrt.png" class="card-img">
                    <div class="card-img-overlay opacity-cover">
                        <h5 class="card-title">Formulaire d'inscription &agrave; une course</h5>
                        <p class="card-text">
                            <ul>
                                <li>Gestion de formulaire</li>
                                <li>Gestion de base de donn&eacute;es</li>
                                <li>Envoi de SMS &agrave; travers une API</li>
                                <li>Envoi de mail gr&acirc;ce &agrave; Sendgrid</li>
                            </ul>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card text-white bg-dark"> 
                    <img src="/images/jeux-vodafone-pf.png" class="card-img">
                    <div class="card-img-overlay opacity-cover">
                        <h5 class="card-title">Plateforme de jeux</h5>
                        <p class="card-text">
                            <ul>
                                <li>Google tag Analytics</li>
                                <li>Envoi de SMS et de mail</li>
                                <li>Affichage d'un score g&eacute;n&eacute;ral</li>
                            </ul>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card text-white bg-dark"> 
                    <img src="/images/morpion.png" class="card-img">
                    <div class="card-img-overlay opacity-cover">
                        <h5 class="card-title">Morpion multijoueur</h5>
                        <p class="card-text">
                            <ul>
                                <li>Gestion base de donn&eacute;es</li>
                                <li>Ajax</li>
                            </ul>
                        </p>
                        <p class="card-text">
                            Le jeu du morpion a &eacute;t&eacute; adapt&eacute; pour permettre aux utilisateurs de jouer entre eux
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card text-white bg-dark"> 
                    <img src="/images/vodafone-word-race.png" class="card-img">
                    <div class="card-img-overlay opacity-cover">
                        <h5 class="card-title">Morpion multijoueur</h5>
                        <p class="card-text">
                            <ul>
                                <li>Gestion base de donn&eacute;es</li>
                                <li>Ajax</li>
                            </ul>
                        </p>
                        <p class="card-text">
                            Le jeu du morpion a &eacute;t&eacute; adapt&eacute; pour permettre aux utilisateurs de jouer entre eux
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    
}
</script>
<style lang="scss">
.opacity-cover {
    background: #333333ce;
    opacity: 0;
    transition: opacity 0.5s;
    &:hover {
        opacity: 1;
    }
}
</style>
