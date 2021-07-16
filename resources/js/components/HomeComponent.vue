<template>
    <div class="container">
        <Intro :config="config" />
        <About :config="config" />
        <Skills :config="config" />
        <Portfolio :config="config" :data="portfolioData" />
        <Experiences :config="config" :experiences="experiences"/>
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
                    {
                        id: 6,
                        imagePath: "/images/anime-list.gif",
                        name: "MyAnime List",
                        desc: `
                            <ul>
                                <li>Gestion base de donn&eacute;es</li>
                                <li>Programmation orient&eacute;e objet</li>
                            </ul>`,
                    },
                ],
                experiences: [
                    {
                        name: 'Développeur web', 
                        company: 'Vodafone Polynésie', 
                        date_start: '2020-11-02', 
                        date_end: '2020-10-31', 
                        desc: 
                            `<ul>
                                <li>Correction et ajout de nouvelles fonctionnalités sur la plateforme de jeux de Vodafone.</li>
                                <li>Créations de divers formulaire de connexion</li>
                                <li>Utilisation d'APIs de l'entreprise</li>
                                <li>Utilisation des méthodes agiles / Gestion de projet</li>
                            </ul>`, 
                        type: 'job'
                    },
                    {
                        name: 'Stagiaire analyste développeur informatique', 
                        company: 'Vodafone Polynésie', 
                        date_start: '2020-07-01', 
                        date_end: '2020-08-31', 
                        desc: `Correction et intégration de trois jeux multijoueurs sur la plateforme de jeux de Vodafone.<br /> Développement de nouvelles fonctionnalités sur la plateforme de jeux.<br /> Méthodologie Agile Scrum.<br /> Environnement : <br /> - Git, GitHub, SonarQube.<br />  - Google Analytics, SendGrid.<br />`, 
                        type: 'internship'
                    },
                    {
                        name: 'Moniteur étudiant - DSI', 
                        company: 'Université de la Polynésie française, Punaauia', 
                        date_start: '2020-09-01', 
                        date_end: '2020-08-31', 
                        desc: `Assistance auprès des étudiants du campus pour l’utilisation des postes et imprimantes.<br /> Gestion de la maintenance et prêt d’ordinateurs portables (Kaspersky Endpoint Security).<br />`, 
                        type: 'job'
                    },
                    {
                        name: 'Stagiaire analyste développeur informatique', 
                        company: 'Vodafone Polynésie', 
                        date_start: '2020-04-01', 
                        date_end: '2020-05-22', 
                        desc: ` Adaptation d\'un jeu en multijoueur (application Web) <br /> - Backend: PHP7.0.33, 10.3.23-MariaDB, Apache2 <br /> - Frontend: HTML/CSS, JavaScript, EaselJS <br /> - Méthodologie Agile: Scrum`, 
                        type: 'internship'
                    },
                    {
                        name: 'Participation au FenuaH24 - DSI', 
                        company: 'Université de la Polynésie française, Punaauia', 
                        date_start: '2020-01-18', 
                        date_end: '2020-01-30', 
                        desc: ` Scénario de gestion de crise d\'une entreprise et pratique de la cyberdéfense.<br /> Environnement :<br /> - FortiClient, GLPI.<br />`, 
                        type: 'job'
                    },
                    {
                        name: 'Stagiaire informatique', 
                        company: 'Vini Vini Mareyage, Papeete - Port de pêche', 
                        date_start: '2019-12-15', 
                        date_end: '2020-01-11', 
                        desc: `Développement de nouveaux modules pour l’ERP de l’entreprise :<br/> - Ajout de filigrane pour les documents comptables.<br/> Environnement :<br/> - Odoo (OpenERP), VBA.<br />`, 
                        type: 'internship'
                    },
                    {
                        name: 'Stagiaire informatique', 
                        company: 'Vini Vini Mareyage, Papeete - Port de pêche', 
                        date_start: '2019-06-22', 
                        date_end: '2020-08-15', 
                        desc: ` Développement de nouveaux modules pour l’ERP de l’entreprise :<br /> - Ajout des conditions d’achats sur les factures et devis.<br /> Environnement :<br /> - Odoo (OpenERP), VBA.<br /> - PostgreSQL, CentOS server, PRTG network monitor.<br />`, 
                        type: 'internship'
                    },
                    {
                        name: 'Participation au CyberFenua', 
                        company: 'DGEN, Papeete', 
                        date_start: '2018-10-01', 
                        date_end: '2018-10-04', 
                        desc: `Scénario de gestion de crise de la Polynésie française en pleine intempérie mondiale.<br /> Prévention auprès des personnes sur les attaques de cybercriminels.<br />`, 
                        type: 'job'
                    },
                    {
                        name: 'Licence informatique', 
                        company: 'Université de la Polynésie française', 
                        date_start: '2017-09-01', 
                        date_end: '2020-08-31', 
                        desc: ` <ul>     <li>Langages :         <ul>             <li>Python, Java, PHP, C</li>         </ul>     </li>     <li>IDE :         <ul>             <li>Android studio, Eclipse</li>         </ul>     </li>     <li>SGBD :         <ul>             <li>MySQL, Oracle</li>         </ul>     </li> </ul>`, 
                        type: 'cursus'
                    },
                    {
                        name: 'Baccalauréat Général Scientifique', 
                        company: 'Lycée Polyvalent de Taaone', 
                        date_start: '2015-08-12', 
                        date_end: '2017-06-30', 
                        desc: ``, 
                        type: 'cursus'
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