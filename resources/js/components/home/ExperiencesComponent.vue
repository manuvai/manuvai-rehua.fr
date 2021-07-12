<template>
  <div class="custom-wrapper" id="experiences">
    <div class="row">
      <div class="col-md-10 offset-md-1 mt-2">
        <h2 class="display-4">Parcours</h2>
        <h3 class="text-1 font-weight-bold">
          <b-icon
            icon="journal-plus"
            width="50px"
            class="font-weight: bold"
          ></b-icon
          >Exp&eacute;riences
        </h3>
      </div>
    </div>
    <div class="container timeline-container-1">
      <div class="main-timeline">
        <!-- start experience section-->
        <div
          class="timeline"
          v-for="(exp, index) in job_experiences"
          :key="index"
        >
          <div class="icon"></div>
          <div class="date-content">
            <div class="date-outer">
              <span class="date">
                <span class="month">{{ "" }}</span>
                <span class="year">{{ dateFormat(exp.date_start) }}</span>
              </span>
            </div>
          </div>
          <div class="timeline-content">
            <h5 class="title">{{ exp.name }} - {{ exp.company }}</h5>
            <p class="description" v-html="exp.desc"></p>
          </div>
        </div>
        <!-- end experience section-->
      </div>
    </div>

    <div class="row">
      <div class="col-md-10 offset-md-1 mt-2">
        <h3 class="text-2 font-weight-bold">
          <b-icon
            icon="journal-plus"
            width="50px"
            class="font-weight: bold"
          ></b-icon
          >Stages
        </h3>
      </div>
    </div>
    <div class="container timeline-container-2">
      <div class="main-timeline">
        <!-- start experience section-->
        <div class="timeline" v-for="(exp, index) in internships" :key="index">
          <div class="icon"></div>
          <div class="date-content">
            <div class="date-outer">
              <span class="date">
                <span class="month">{{ "" }}</span>
                <span class="year">{{ dateFormat(exp.date_start) }}</span>
              </span>
            </div>
          </div>
          <div class="timeline-content">
            <h5 class="title">{{ exp.name }} - {{ exp.company }}</h5>
            <p class="description" v-html="exp.desc"></p>
          </div>
        </div>
        <!-- end experience section-->
      </div>
    </div>

    <div class="row">
      <div class="col-md-10 offset-md-1 mt-2">
        <h3 class="text-3 font-weight-bold">
          <b-icon icon="award" width="50px" class="font-weight: bold"></b-icon
          >Formation
        </h3>
      </div>
    </div>
    <div class="container timeline-container-3">
      <div class="main-timeline">
        <!-- start experience section-->
        <div class="timeline" v-for="(exp, index) in formations" :key="index">
          <div class="icon third-part"></div>
          <div class="date-content">
            <div class="date-outer">
              <span class="date">
                <span class="month">{{ "" }}</span>
                <span class="year">{{ dateFormat(exp.date_start) }}</span>
              </span>
            </div>
          </div>
          <div class="timeline-content">
            <h5 class="title">{{ exp.name }} - {{ exp.company }}</h5>
            <p class="description" v-html="exp.desc"></p>
          </div>
        </div>
        <!-- end experience section-->
      </div>
    </div>
  </div>
</template>
<script>
import moment from "moment";

export default {
  props: ["experiences"],
  methods: {
    dateFormat(date, format = "YYYY") {
      return moment(date, "YYYY-MM-DD").format(format);
    },
  },
  computed: {
    job_experiences() {
      return this.experiences.filter((exp) => exp.type == "job");
    },
    internships() {
      return this.experiences.filter((exp) => exp.type == "internship");
    },
    formations() {
      return this.experiences.filter((exp) => exp.type == "cursus");
    },
  },
  mounted() {},
};
</script>
<style lang="scss" scoped>
$color1: #5f8be4;
$color2: #5849a0;
$color3: #42a078;
body {
  background-color: #f7f7f7;
  margin-top: 20px;
}

.main-timeline {
  position: relative;
}

.main-timeline:before {
  content: "";
  display: block;
  width: 2px;
  height: 100%;
  background: #c6c6c6;
  margin: 0 auto;
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
}

.main-timeline .timeline {
  margin-bottom: 40px;
  position: relative;
}

.main-timeline .timeline:after {
  content: "";
  display: block;
  clear: both;
}

.main-timeline .icon {
  width: 18px;
  height: 18px;
  line-height: 18px;
  margin: auto;
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
}

.main-timeline .icon:before,
.main-timeline .icon:after {
  content: "";
  width: 100%;
  height: 100%;
  border-radius: 50%;
  position: absolute;
  top: 0;
  left: 0;
  transition: all 0.33s ease-out 0s;
}

.main-timeline .icon:before {
  background: #fff;
  border: 2px solid #232323;
  left: -3px;
}

.main-timeline .icon:after {
  border: 2px solid #c6c6c6;
  left: 3px;
}
.timeline-container-1 .main-timeline .icon:after {
  border: 2px solid $color1;
}
.timeline-container-2 .main-timeline .icon:after {
  border: 2px solid $color2;
}
.timeline-container-3 .main-timeline .icon:after {
  border: 2px solid $color3;
}

.main-timeline .timeline:hover .icon:before {
  left: 3px;
}

.main-timeline .timeline:hover .icon:after {
  left: -3px;
}

.main-timeline .date-content {
  width: 50%;
  float: left;
  margin-top: 22px;
  position: relative;
}

.main-timeline .date-content:before {
  content: "";
  width: 36.5%;
  height: 2px;
  background: #c6c6c6;
  margin: auto 0;
  position: absolute;
  top: 0;
  right: 10px;
  bottom: 0;
}

.timeline-container-1 .main-timeline .date-content:before {
  background: $color1;
}

.timeline-container-2 .main-timeline .date-content:before {
  background: $color2;
}

.timeline-container-3 .main-timeline .date-content:before {
  background: $color3;
}

.main-timeline .date-outer {
  width: 125px;
  height: 125px;
  font-size: 16px;
  text-align: center;
  margin: auto;
  z-index: 1;
}

.main-timeline .date-outer:before,
.main-timeline .date-outer:after {
  content: "";
  width: 125px;
  height: 125px;
  margin: 0 auto;
  border-radius: 50%;
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  transition: all 0.33s ease-out 0s;
}

.main-timeline .date-outer:before {
  background: #fff;
  border: 2px solid #232323;
  left: -6px;
}

.main-timeline .date-outer:after {
  border: 2px solid #c6c6c6;
  left: 6px;
}

.timeline-container-1 .main-timeline .date-outer:after {
  border: 2px solid $color1;
}

.timeline-container-2 .main-timeline .date-outer:after {
  border: 2px solid $color2;
}
.timeline-container-3 .main-timeline .date-outer:after {
  border: 2px solid $color3;
}

.main-timeline .timeline:hover .date-outer:before {
  left: 6px;
}

.main-timeline .timeline:hover .date-outer:after {
  left: -6px;
}

.main-timeline .date {
  width: 100%;
  margin: auto;
  position: absolute;
  top: 27%;
  left: 0;
}

.main-timeline .month {
  font-size: 18px;
  font-weight: 700;
}

.main-timeline .year {
  display: block;
  font-size: 30px;
  font-weight: 700;
  color: #232323;
  line-height: 36px;
}

.main-timeline .timeline-content {
  width: 50%;
  padding: 20px 0 20px 50px;
  float: right;
}

.main-timeline .title {
  font-size: 19px;
  font-weight: 700;
  line-height: 24px;
  margin: 0 0 15px 0;
}

.main-timeline .description {
  margin-bottom: 0;
}

.main-timeline .timeline:nth-child(2n) .date-content {
  float: right;
}

.main-timeline .timeline:nth-child(2n) .date-content:before {
  left: 10px;
}

.main-timeline .timeline:nth-child(2n) .timeline-content {
  padding: 20px 50px 20px 0;
  text-align: right;
}

.text-1 {
  color: $color1;
}
.text-2 {
  color: $color2;
}
.text-3 {
  color: $color3;
}

@media only screen and (max-width: 991px) {
  .main-timeline .date-content {
    margin-top: 35px;
  }
  .main-timeline .date-content:before {
    width: 22.5%;
  }
  .main-timeline .timeline-content {
    padding: 10px 0 10px 30px;
  }
  .main-timeline .title {
    font-size: 17px;
  }
  .main-timeline .timeline:nth-child(2n) .timeline-content {
    padding: 10px 30px 10px 0;
  }
}

@media only screen and (max-width: 767px) {
  .main-timeline:before {
    margin: 0;
    left: 7px;
  }
  .main-timeline .timeline {
    margin-bottom: 20px;
  }
  .main-timeline .timeline:last-child {
    margin-bottom: 0;
  }
  .main-timeline .icon {
    margin: auto 0;
  }
  .main-timeline .date-content {
    width: 95%;
    float: right;
    margin-top: 0;
  }
  .main-timeline .date-content:before {
    display: none;
  }
  .main-timeline .date-outer {
    width: 110px;
    height: 110px;
  }
  .main-timeline .date-outer:before,
  .main-timeline .date-outer:after {
    width: 110px;
    height: 110px;
  }
  .main-timeline .date {
    top: 30%;
  }
  .main-timeline .year {
    font-size: 24px;
  }
  .main-timeline .timeline-content,
  .main-timeline .timeline:nth-child(2n) .timeline-content {
    width: 95%;
    text-align: center;
    padding: 10px 0;
  }
  .main-timeline .title {
    margin-bottom: 10px;
  }
}
</style>
