<template>
    <div class="custom-wrapper" id="intro">
        <div class="container">
            <div class="row align-items-center mt-3">
                <div class="col-12 col-lg-6 col-md-6 col-sm-6">
                    <span class="align-middle">
                        <h2 class="display-4">Bonjour,<br/></h2> 
                        <h1 class=""> Je m'appelle Manuvai REHUA</h1>
                        <h2 class="">, développeur web</h2>
                    </span>
                    <a :href="config.links.github" target="_blank" rel="noopener noreferrer">
                        <span class="h1">
                            <b-icon icon="github" width="50px" style="color: #161b22;"></b-icon>
                        </span>
                    </a>
                    <a :href="config.links.linkedin" target="_blank" rel="noopener noreferrer">
                        <span class="h1">
                            <b-icon icon="linkedin" width="50px" style="color: #0a66c2;"></b-icon>
                        </span>
                    </a>
                    <a :href="config.links.twitter" target="_blank" rel="noopener noreferrer">
                        <span class="h1">
                            <b-icon icon="twitter" width="50px" style="color: rgb(29, 161, 242);"></b-icon>
                        </span>
                    </a>
                </div>
                <div class="col-12 col-lg-6 col-md-6 col-sm-6">
                    <div class="portrait"></div>

                </div>
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
<style lang="scss" scoped>
.portrait {
    width: 350px;
    height: 350px;
    margin: 20px auto;
    border-radius: 100%;
    background-image: url(/images/hero.jpg);
    background-size: cover;
    background-position: 80% 70%;
}

.custom-wrapper {
    background-color: white;
}
</style>
