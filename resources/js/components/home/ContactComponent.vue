<template>
  <div class="custom-wrapper" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-md-10 offset-md-1 mt-2">
          <h2 class="display-4">Contact</h2>
        </div>
      </div>
      <div class="row">
        <div class="columns col-sm-4 col-xs-6">
          <div class="row text-center align-items-center">
            <div class="col-sm-12">
              <a :href="'tel:' + config.tel">
                <span class="h1">
                  <b-icon
                    icon="telephone"
                    width="50px"
                    style="color: #161b22"
                  ></b-icon> </span
                ><br />
                {{ config.tel }}
              </a>
            </div>
            <div class="col-sm-12">
              <a :href="'mailto:' + config.mail">
                <span class="h1">
                  <b-icon
                    icon="envelope"
                    width="50px"
                    style="color: #161b22"
                  ></b-icon> </span
                ><br />
                {{ config.mail }}
              </a>
            </div>
            <div class="col-sm-12">
              <div
                class="LI-profile-badge"
                data-version="v1"
                data-size="medium"
                data-locale="fr_FR"
                data-type="horizontal"
                data-theme="light"
                data-vanity="manuvai-rehua"
              >
                <a
                  class="LI-simple-link"
                  href="https://pf.linkedin.com/in/manuvai-rehua?trk=profile-badge"
                  >Manuvai REHUA</a
                >
              </div>
            </div>
          </div>
        </div>
        <div class="columns col-sm-8 col-xs-6">
          <l-map
            :zoom="zoom"
            :center="center"
            :options="mapOptions"
            style="height: 60vh"
            @update:center="centerUpdate"
            @update:zoom="zoomUpdate"
          >
            <l-tile-layer :url="url" :attribution="attribution" />
            <l-marker :lat-lng="markerCoords"> </l-marker>
          </l-map>
        </div>
      </div>
    </div>
    <script type="application/javascript" async=false defer=false src="https://platform.linkedin.com/badges/js/profile.js"></script>

  </div>
</template>
<script>
import "leaflet/dist/leaflet.css";
import { latLng } from "leaflet";
import { LMap, LTileLayer, LMarker, LPopup, LTooltip } from "vue2-leaflet";

export default {
  data() {
    return {
      zoom: 13,
      center: latLng(-17.5923, -149.6086),
      url: "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
      attribution:
        '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
      markerCoords: latLng(-17.5923, -149.6086),
      currentZoom: 11.5,
      currentCenter: latLng(-17.5923, -149.6086),
      mapOptions: {
        zoomSnap: 0.5,
      },
    };
  },
  components: {
    LMap,
    LTileLayer,
    LMarker,
  },
  props: {
    config: {},
  },
  methods: {
    zoomUpdate(zoom) {
      this.currentZoom = zoom;
    },
    centerUpdate(center) {
      this.currentCenter = center;
    },
  },
};
</script>
<style lang="scss" scoped>
.custom-wrapper {
  background-color: white;
}
</style>
