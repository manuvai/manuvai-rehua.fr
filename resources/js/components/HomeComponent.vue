<template>
    <div class="container">
        <Intro :config="config" />
        <About :config="config" />
        <Skills :config="config" />
        <Portfolio :config="config" />
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
                }
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