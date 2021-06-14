<template>
    <div class="container">
        <Intro/>
        <About/>
        <Skills/>
        <Portfolio/>
        <Contact/>
    </div>
</template>

<script>
    import Intro from './home/IntroComponent.vue';
    import About from './home/AboutComponent.vue';
    import Skills from './home/SkillsComponent.vue';
    import Portfolio from './home/PortfolioComponent.vue';
    import Contact from './home/ContactComponent.vue';

    export default {
        components: {
            Intro,
            About,
            Skills,
            Portfolio,
            Contact,
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style lang="scss" scoped>

</style>