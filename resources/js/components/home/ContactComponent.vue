<template>
    <div class="custom-wrapper" id="contact">
        <div class="row">
            <div class="col-md-10 offset-md-2 mt-2">
                <h2 class="display-4">Contact</h2>
                <div class="container">
                    <div class="row text-center">
                        <div class="col-sm">
                            <a :href="'tel:' + config.tel">
                                <span class="h1">
                                    <b-icon icon="telephone" width="50px" style="color: #161b22;"></b-icon>
                                </span><br>
                                {{config.tel}}
                            </a>
                        </div>
                        <div class="col-sm">
                            <a :href="'mailto:' + config.mail">
                                <span class="h1">
                                    <b-icon icon="envelope" width="50px" style="color: #161b22;"></b-icon>
                                </span><br>
                                {{config.mail}}
                            </a>
                        </div>
                        <div class="col-sm">
                            One of three columns
                        </div>
                    </div>
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