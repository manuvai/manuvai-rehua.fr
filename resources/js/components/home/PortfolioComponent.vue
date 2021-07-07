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
            <div class="col-12 col-md-6 col-lg-4 mb-4" v-for="el in data" :key="el.id">
                <div class="card text-white bg-dark"> 
                    <img :src="el.imagePath" class="card-img">
                    <div class="card-img-overlay opacity-cover">
                        <h5 class="card-title">{{ el.name }} </h5>
                        <p class="card-text">
                            <span v-html="el.desc"></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        data: {},
    }
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
.custom-wrapper {
    background-color: white;
}
</style>
