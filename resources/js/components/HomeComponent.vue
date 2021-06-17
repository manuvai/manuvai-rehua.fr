<template>
    <div class="container">
        <Intro :config="config" />
        <About :config="config" />
        <Skills :config="config" />
        <Portfolio :config="config" :data="portfolioData" />
        <Experiences :config="config" />
        <Contact :config="config" />
    </div>
</template>

<script>
    import Intro from './home/IntroComponent.vue';
    import About from './home/AboutComponent.vue';
    import Skills from './home/SkillsComponent.vue';
    import Portfolio from './home/PortfolioComponent.vue';
    import Experiences from './home/ExperiencesComponent.vue';
    import Contact from './home/ContactComponent.vue';

    export default {
        data() {
            return {
                config: {
                   tel: '+68989732227',
                   mail: 'manuvai.rehua@vodafone.pf',
                   links: {
                       github: 'https://github.com/manuvai/',
                       linkedin: 'https://www.linkedin.com/in/manuvai-rehua',
                       twitter: 'https://twitter.com/ManuvaiRehua'
                   }
                },
                portfolioData: [
                    {
                        id: 1,
                        imagePath: "/images/laroue8ans.png",
                        name: "La roue des KDO's",
                        desc: `
                            <ul>
                                <li>Gestion de formulaire</li>
                                <li>Gestion de base de donn&eacute;es</li>
                                <li>Envoi de SMS &agrave; travers une API</li>
                            </ul>`,
                    },
                    {
                        id: 2,
                        imagePath: "/images/formulaire-vcrt.png",
                        name: "Formulaire d'inscription &agrave; une course",
                        desc: `<ul>
                                <li>Gestion de formulaire</li>
                                <li>Gestion de base de donn&eacute;es</li>
                                <li>Envoi de SMS &agrave; travers une API</li>
                                <li>Envoi de mail gr&acirc;ce &agrave; Sendgrid</li>
                            </ul>`,
                    },
                    {
                        id: 3,
                        imagePath: "/images/jeux-vodafone-pf.png",
                        name: "Plateforme de jeux",
                        desc: `
                            <ul>
                                <li>Google tag Analytics</li>
                                <li>Envoi de SMS et de mail</li>
                                <li>Affichage d'un score g&eacute;n&eacute;ral</li>
                            </ul>`,
                    },
                    {
                        id: 4,
                        imagePath: "/images/morpion.png",
                        name: "Morpion multijoueur",
                        desc: `
                            <ul>
                                <li>Gestion base de donn&eacute;es</li>
                                <li>Ajax</li>
                            </ul>
                            <p>
                                Le jeu du morpion a &eacute;t&eacute; adapt&eacute; pour permettre aux utilisateurs de jouer entre eux
                            </p>`,
                    },
                    {
                        id: 5,
                        imagePath: "/images/vodafone-word-race.png",
                        name: "Le jeu du pendu",
                        desc: `
                            <ul>
                                <li>Gestion de formulaire</li>
                                <li>Gestion base de donn&eacute;es</li>
                                <li>Ajax</li>
                            </ul>`,
                    },
                ]
            }
        },
        components: {
            Intro,
            About,
            Skills,
            Portfolio,
            Experiences,
            Contact,
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style lang="scss" scoped>

</style>