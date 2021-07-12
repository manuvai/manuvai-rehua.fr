<template>
  <div class="custom-wrapper" id="skills">
    
    <div class="row">
        <div class="col-md-10 offset-md-1 mt-2">
          <h2 class="display-4">Comp&eacute;tences</h2>
          <h3 class="display-5">Web</h3>
        </div>
    </div>
    <div class="row m-4 text-center justify-content-center">
      <div class="col-sm-2" v-for="skill in skills.filter(e => e.categ == 'web')" :key="skill.key">
        <div class="card">
          <img
            class="card-img-top"
            :src="skill.imgSrc"
            :style="skill.style"
            :alt="skill.key + '-icon'"
          />
          <div class="card-body">
            <h4 class="card-title">{{skill.title}}</h4>
            <p class="card-text">
              {{skill.text}}
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-md-10 offset-md-1 mt-2">
          <h3 class="display-5">Base de donn&eacute;es</h3>
        </div>
    </div>
    <div class="row m-4 text-center justify-content-center">
      <div class="col-sm-2" v-for="skill in skills.filter(e => e.categ == 'db')" :key="skill.key">
        <div class="card">
          <img
            class="card-img-top"
            :src="skill.imgSrc"
            :style="skill.style"
            :alt="skill.key + '-icon'"
          />
          <div class="card-body">
            <h4 class="card-title">{{skill.title}}</h4>
            <p class="card-text">
              {{skill.text}}
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-md-10 offset-md-1 mt-2">
          <h3 class="display-5">Autres</h3>
        </div>
    </div>
    <div class="row m-4 text-center justify-content-center">
      <div class="col-sm-2" v-for="skill in skills.filter(e => e.categ == 'other')" :key="skill.key">
        <div class="card">
          <img
            class="card-img-top"
            :src="skill.imgSrc"
            :style="skill.style"
            :alt="skill.key + '-icon'"
          />
          <div class="card-body">
            <h4 class="card-title">{{skill.title}}</h4>
            <p class="card-text">
              {{skill.text}}
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Progress from "easy-circular-progress";
export default {
  data() {
    return {
      style: {
        border: '1px solid red',
      },
      skills: [
        {
          key: 'php',
          categ: 'web',
          title: 'PHP',
          text: '',
          style: {
            filter: 'invert(47%) sepia(38%) saturate(412%) hue-rotate(198deg) brightness(97%) contrast(93%)',
          },
          imgSrc: '/images/php-icon.svg',
        },
        {
          key: 'vue',
          categ: 'web',
          title: 'VueJS',
          text: '',
          style: {},
          imgSrc: '/images/vue-icon.svg',
        },
        {
          key: 'html',
          categ: 'web',
          title: 'HTML',
          text: '',
          style: {
            filter: 'invert(56%) sepia(81%) saturate(3784%) hue-rotate(345deg) brightness(98%) contrast(93%)',
          },
          imgSrc: '/images/html-icon.svg',
        },
        {
          key: 'js',
          categ: 'web',
          title: 'Javascript',
          text: '',
          style: {
            filter: 'invert(83%) sepia(77%) saturate(530%) hue-rotate(343deg) brightness(96%) contrast(103%)',
          },
          imgSrc: '/images/js-icon.svg',
        },
        {
          key: 'mysql',
          categ: 'db',
          title: 'MySQL',
          text: '',
          style: {},
          imgSrc: '/images/mysql-icon.svg',
        },
        {
          key: 'pgsql',
          categ: 'db',
          title: 'PostgreSQL',
          text: '',
          style: {},
          imgSrc: '/images/postgresql-icon.svg',
        },
        {
          key: 'oracle',
          categ: 'db',
          title: 'Oracle',
          text: '',
          style: {},
          imgSrc: '/images/oracle-icon.svg',
        },
        {
          key: 'github',
          categ: 'other',
          title: 'Github',
          text: '',
          style: {},
          imgSrc: '/images/github-icon.svg',
        },
        {
          key: 'java',
          categ: 'other',
          title: 'Java',
          text: '',
          style: {},
          imgSrc: '/images/java-icon.svg',
        },
        {
          key: 'composer',
          categ: 'web',
          title: 'Composer',
          text: '',
          style: {},
          imgSrc: '/images/composer-icon.svg',
        },
      ]
    }
  },
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
.image-flip:hover .backside,
.image-flip.hover .backside {
  -webkit-transform: rotateY(0deg);
  -moz-transform: rotateY(0deg);
  -o-transform: rotateY(0deg);
  -ms-transform: rotateY(0deg);
  transform: rotateY(0deg);
}

.image-flip:hover .frontside,
.image-flip.hover .frontside {
  -webkit-transform: rotateY(180deg);
  -moz-transform: rotateY(180deg);
  -o-transform: rotateY(180deg);
  transform: rotateY(180deg);
}

.image-flip {
  margin-bottom: 200px;
  width: 300px;
  height: 250px;
}

.mainflip {
  -webkit-transition: 1s;
  -webkit-transform-style: preserve-3d;
  -ms-transition: 1s;
  -moz-transition: 1s;
  -moz-transform: perspective(1000px);
  -moz-transform-style: preserve-3d;
  -ms-transform-style: preserve-3d;
  transition: 1s;
  transform-style: preserve-3d;
  position: relative;
}

.frontside,
.backside {
  -webkit-backface-visibility: hidden;
  -moz-backface-visibility: hidden;
  -ms-backface-visibility: hidden;
  backface-visibility: hidden;
  -webkit-transition: 1s;
  -webkit-transform-style: preserve-3d;
  -moz-transition: 1s;
  -moz-transform-style: preserve-3d;
  -o-transition: 1s;
  -o-transform-style: preserve-3d;
  -ms-transition: 1s;
  -ms-transform-style: preserve-3d;
  transition: 1s;
  transform-style: preserve-3d;
  position: absolute;
  top: 0;
  left: 0;
}

.frontside {
  -webkit-transform: rotateY(0deg);
  -ms-transform: rotateY(0deg);
  z-index: 2;
}

.backside {
  background: white;
  -webkit-transform: rotateY(-180deg);
  -moz-transform: rotateY(-180deg);
  -o-transform: rotateY(-180deg);
  -ms-transform: rotateY(-180deg);
  transform: rotateY(-180deg);
}

.card,
.card-img-top {
  border-radius: 0;
}
</style>
