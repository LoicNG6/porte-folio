<template>
  <v-app-bar
    color="#6f4b3e"
    style="font-family: Gill Sans, sans-serif; color: rgb(240, 234, 234)"
  >
    <v-app-bar-nav-icon
      variant="text"
      @click="drawer = !drawer"
    ></v-app-bar-nav-icon>
    <v-toolbar-title style="font-size: 1.5em"> NGUESSIE Loïc </v-toolbar-title>

    <v-spacer style="width: 60%"></v-spacer>

    <v-img
      :src="imageSrc"
      height="40px"
      width="10px"
      class="img_tra"
      @click="setLanguage()"
      style="cursor: pointer"
    ></v-img>
  </v-app-bar>
  <v-navigation-drawer width="230" color="#6f4b3e" v-model="drawer" temporary>
    <v-list dense nav class="pa-0">
      <v-list-item-group v-model="selectedMenu">
        <v-list-item
          link
          v-for="(menu, m) in menus"
          :key="m"
          @click="changeMenu(menu.to)"
          :disabled="m == selectedMenu"
          class="px-5 test"
          style="height: 70px"
        >
          <v-list-item-icon style="position: relative; top: 20%">
            <v-icon color="white"> {{ menu.icon }}</v-icon>
          </v-list-item-icon>
          <v-list-item-content class="mx-4">
            <span
              :style="
                m == selectedMenu
                  ? 'font-weight:bold; pointer-events: none'
                  : ''
              "
              class="text"
              >{{ menu.title }}</span
            >
          </v-list-item-content>
        </v-list-item>
      </v-list-item-group>
    </v-list>

    <v-divider style="position: relative; top: 50%"></v-divider>

    <v-btn
      to="admin"
      color="#80594a"
      rounded
      height="80"
      x-large
      elevation="4"
      style="position: relative; top: 53%; left: 15%"
    >
      <v-row align="center" class="text" justify="space-around">
        <v-col cols="auto">
          <v-icon dark x-large>mdi-account-circle</v-icon>
        </v-col>
        <v-col cols="auto"> Admin </v-col>
      </v-row>
    </v-btn>
  </v-navigation-drawer>
</template>
<style lang="scss" scoped>
.test:hover {
  background-color: rgba(240, 248, 255, 0.1);
}

</style>
<script>
export default {
  name: "v-top-menu",
  inject:["curr_language"],
  data: () => {
    return {
      image_trad_path: "",
      count: 0,
      drawer: false,
      menus: [
        {
          positon: 0,
          title: "Home",
          icon: "mdi-home",
          to: "home",
        },
        {
          positon: 1,
          title: "Contact me",
          icon: "mdi-message-text",
          to: "contact-me",
        },
        {
          positon: 2,
          title: "About",
          icon: "mdi-information-outline",
          to: "about",
        },
      ],
      selectedMenu: null,
    };
  },
  mounted() {
    this.image_trad_path = "../../../sass/assets/" + this.curr_language + ".svg";
  },
  computed: {
    imageSrc() {
      return new URL(this.image_trad_path, import.meta.url).href;
    },
  },
  methods: {
    changeMenu(route) {
      console.log(route);
      this.drawer = !this.drawer;
      this.$router.push({ name: route });
    },
    setLanguage() {
      console.log("begining =   ", this.curr_language);

      if (this.curr_language === "english") this.curr_language = "french";
      else this.curr_language = "english";

      this.image_trad_path = "../../../sass/assets/" + this.curr_language + ".svg";
      this.$forceUpdate();
      console.log(this.curr_language);
      //Si je ne trouve pas le moyen d'appeler le composant "Home",
      //je vais devoir faire les appelles api d'ici malheureusement.
    }
  },
};
</script>
