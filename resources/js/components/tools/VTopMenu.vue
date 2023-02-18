<template>
  <v-app-bar
    :elevation="0"
    color="#270a04"
    class="pl-4"
    height="70"
    style="font-family: Gill Sans, sans-serif; color: rgb(240, 234, 234)"
  >
    <v-toolbar-title class="logo"> NGUESSIE Loïc </v-toolbar-title>
    <v-spacer
      :style="$vuetify.display.smAndDown ? 'width: 30%' : 'width: 10%'"
    ></v-spacer>
    <v-row style="width: 3%" justify="space-around" class="ml-8">
      <v-col
        @click="changeMenu(menu.to)"
        v-for="(menu, m) in menus"
        :key="m"
        cols="auto"
      >
        <span
          :style="
            menu.title == $route.name
              ? 'font-weight:bold; pointer-events: none; text-decoration: underline'
              : ''
          "
          class="menu"
          >{{ menu.title }}</span
        >
      </v-col>
    </v-row>

    <img
      class="bs"
      :src="imageSrc"
      @click="setLanguage()"
      style="cursor: pointer"
    />

    <v-icon dark xx-large class="bs">mdi-account-circle</v-icon>
  </v-app-bar>
</template>
<style lang="scss" scoped>
.test:hover {
  background-color: rgba(240, 248, 255, 0.1);
}
</style>
<script>
export default {
  name: "v-top-menu",
  data: () => {
    return {
      image_trad_path: "",
      count: 0,
      drawer: false,
      menus: [
        {
          positon: 0,
          title: "home",
          icon: "mdi-home",
          to: "home",
        },
        {
          positon: 1,
          title: "contact me",
          icon: "mdi-message-text",
          to: "contact me",
        },
        {
          positon: 2,
          title: "about",
          icon: "mdi-information-outline",
          to: "about",
        },
      ],
      selectedMenu: null,
    };
  },
  mounted() {
    this.image_trad_path = "../../../sass/assets/" + this.$i18n.locale + ".svg";
  },
  computed: {
    imageSrc() {
      return new URL(this.image_trad_path, import.meta.url).href;
    },
  },
  methods: {
    changeMenu(route) {
      console.log(route);
      this.$router.push({ name: route });
    },
    setLanguage() {
      if (this.$i18n.locale === "en") this.$i18n.locale = "fr";
      else this.$i18n.locale = "en";

      this.image_trad_path =
        "../../../sass/assets/" + this.$i18n.locale + ".svg";
      this.$forceUpdate();
    },
  },
};
</script>