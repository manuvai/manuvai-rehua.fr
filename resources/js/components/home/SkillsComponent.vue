<template>
  <div class="custom-wrapper" id="skills">
    <div class="row">
      <div class="col-md-12 offset-md-2 mt-2">
        <h2 class="display-4">Comp&eacute;tences</h2>
        <h3 class="display-5">Web</h3>
        <div class="align-items-center">
          <div class="col-sm-4">
            <div class="card card-flip h-100">
              <div class="card-front text-white bg-dark">
                <div class="card-body">
                  <i class="fa fa-search fa-5x float-right"></i>
                  <h3 class="card-title">Front</h3>
                  <p class="card-text">
                    With supporting text below as a natural lead-in to
                    additional content.
                  </p>
                </div>
              </div>
              <div class="card-back bg-white">
                <div class="card-body">
                  <h3 class="card-title">Back</h3>
                  <p class="card-text">
                    Suprise this one has more more more more content on the
                    back!
                  </p>
                  <a href="#" class="btn btn-outline-secondary">Action</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card card-flip h-100">
              <div class="card-front text-white bg-warning">
                <div class="card-body">
                  <i class="fa fa-search-plus fa-5x float-right"></i>
                  <h3 class="card-title">Front</h3>
                  <p class="card-text">
                    With supporting text below as a natural lead-in to
                    additional content.
                  </p>
                </div>
              </div>
              <div class="card-back bg-dark text-white">
                <div class="card-body">
                  <h3 class="card-title">Back #2</h3>
                  <p class="card-text">
                    Suprise this one has content on the back!
                  </p>
                  <a href="#" class="btn btn-outline-secondary">Action</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card card-flip h-100">
              <div class="card-front text-white bg-primary">
                <div class="card-body">
                  <i class="fa fa-arrow-circle-right fa-5x float-right"></i>
                  <h3 class="card-title">Front</h3>
                  <p class="card-text">
                    With supporting text below as a natural lead-in to
                    additional content. This one is a little because it has more
                    text!
                  </p>
                </div>
              </div>
              <div class="card-back bg-white">
                <div class="card-body text-primary">
                  <h3 class="card-title">Wow! #3</h3>
                  <p class="card-text">
                    Suprise this one has content on the back!
                  </p>
                  <a href="#" class="btn btn-outline-primary">Action</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4 my-3">
            <div class="card card-flip h-100">
              <div class="card-front text-white bg-dark">
                <div class="card-body">
                  <i class="fa fa-search fa-5x float-right"></i>
                  <h3 class="card-title">Front</h3>
                  <p class="card-text">
                    With supporting text below as a natural lead-in to
                    additional content.
                  </p>
                </div>
              </div>
              <div class="card-back bg-white">
                <div class="card-body">
                  <h3 class="card-title">Back</h3>
                  <p class="card-text">
                    Suprise this one has more more more more content on the
                    back!
                  </p>
                  <a href="#" class="btn btn-outline-secondary">Action</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4 my-3">
            <div class="card card-flip h-100">
              <div class="card-front text-white bg-danger">
                <div class="card-body">
                  <i class="fa fa-search fa-5x float-right"></i>
                  <h3 class="card-title">Front</h3>
                  <p class="card-text">
                    With supporting text below as a natural lead-in to
                    additional content.
                  </p>
                </div>
              </div>
              <div class="card-back bg-white">
                <div class="card-body">
                  <h3 class="card-title">Back</h3>
                  <p class="card-text">
                    Suprise this one has more more more more content on the
                    back!
                  </p>
                  <a href="#" class="btn btn-outline-secondary">Action</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4 my-3">
            <div class="card card-flip h-100">
              <div class="card-front text-white bg-success">
                <div class="card-body">
                  <i class="fa fa-search fa-5x float-right"></i>
                  <h3 class="card-title">Front</h3>
                  <p class="card-text">
                    With supporting text below as a natural lead-in to
                    additional content.
                  </p>
                </div>
              </div>
              <div class="card-back bg-white">
                <div class="card-body">
                  <h3 class="card-title">Back</h3>
                  <p class="card-text">
                    Suprise this one has more more more more content on the
                    back!
                  </p>
                  <a href="#" class="btn btn-outline-secondary">Action</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Progress from "easy-circular-progress";
export default {
  components: {
    Progress,
  },
};
</script>
<style lang="scss" scoped>
.custom-wrapper {
  background-color: white;
  .skill-item {
    border: 1px solid #5d5de7;
  }
}
</style>
