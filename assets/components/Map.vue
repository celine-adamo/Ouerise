<template>
  <div class="col-sm-5 offset-1 mt-5">
    <div  id="mapping" class="map mt-5"></div>
  </div>
</template>

<!-- TODO: Faire apparaître la carte avec les bonnes coordonées -->
<script>
export default {
  name: "Map",
  props: ["idLocation", "latitude", "longitude"],
  data() {
    return {
      map: null,
      tileLayer: null,
      layers: [],
      marker: null,
    };
  },

  mounted() {
    console.log("Depuis map : " + this.latitude + this.longitude, console.log(this.idLocation));
    this.initMap();
  },

    methods: {
        initMap() {
          this.map = L.map("mapping").setView([this.latitude, this.longitude], 13);
          this.marker = L.marker([this.latitude, this.longitude]).addTo(this.map);
          this.tileLayer = L.tileLayer(
            "https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}",
            {
              attribution:
                'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © ' +
                  '<a href="https://www.mapbox.com/">Mapbox</a>',
              maxZoom: 18,
              id: "mapbox/streets-v11",
              tileSize: 512,
              zoomOffset: -1,
              accessToken:
                "pk.eyJ1IjoibmF0aC1wdnIiLCJhIjoiY2tsYXZ0MTluMDExaTJxbTExaWFseDJxZSJ9.uUwMTQtztuZ1617qnM_Xzw",
            }
          ).addTo(this.map);
        },
    },
};
</script>

<style></style>
