<template>
    <div class="custom-wrapper" id="skills">
        
        <div class="row">
            <div class="col-md-10 offset-md-2 mt-2">
                <h2 class="display-4">Comp&eacute;tences</h2>
                <Progress :radius="60" :strokeWidth="16" :strokeColor="'#7377ad'" value="86">
                    <div class="content">PhP</div>
                    <template v-slot:footer>
                    </template>
                </Progress>

                <Progress
                    :transitionDuration="5000"
                    :radius="60"
                    :strokeWidth="16"
                    :strokeColor="'#5281a0'"
                    value="86.12">
                    <div class="content">Java</div>
                    <template v-slot:footer>
                    </template>
                </Progress>
                <Progress
                    :transitionDuration="5000"
                    :radius="60"
                    :strokeWidth="16"
                    :strokeColor="'#5281a0'"
                    value="86.12">
                    <div class="content">Java</div>
                    <template v-slot:footer>
                    </template>
                </Progress>
            </div>
        </div>

    </div>
</template>
<script>
import Progress from "easy-circular-progress";
export default {
    
  components: {
    Progress,
  }
}
</script>
