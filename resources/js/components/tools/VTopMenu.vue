<template>
  <v-app-bar
    :elevation="0"
    color="#270a04"
    class="px-6"
    height="75"
    style="font-family: Gill Sans, sans-serif; color: #fceee5"
  >
    <v-toolbar-title
      style="cursor: pointer"
      class="logo"
      @click="$router.push({ name: 'home' })"
      >NGUESSIE Loïc</v-toolbar-title
    >

    <v-spacer
      :style="$vuetify.display.smAndDown ? 'width: 30%' : 'width: 10%'"
    ></v-spacer>

    <v-row style="width: 10%" justify="space-around">
      <v-col
        @click="changeMenu(menu.to)"
        v-for="(menu, m) in menus"
        :key="m"
        cols="auto"
        class="mr-4"
      >
        <span
          :style="
            menu.title == $route.name
              ? 'font-weight:bold; pointer-events: none;'
              : ''
          "
          class="menu"
          >{{ menu.title }}</span
        >
      </v-col>
      <v-col class="pa-0 ml-4" cols="auto">
        <img
          class="my-3"
          :src="imageSrc"
          @click="setLanguage()"
          style="cursor: pointer"
        />
      </v-col>
      <v-col cols="auto" class="px-0">
        <v-icon
          dark
          xx-large
          class="admin-icon"
          @click="$router.push({ name: 'admin' })"
          style="font-size: 1.9em"
          >mdi-account-circle-outline</v-icon
        >
      </v-col>
    </v-row>
  </v-app-bar>
</template>
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
    };
  },
  mounted() {
    this.image_trad_path =
      this.$i18n.locale == "fr"
        ? "../../../sass/assets/en.svg"
        : "../../../sass/assets/fr.svg";
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
        this.$i18n.locale == "fr"
          ? "../../../sass/assets/en.svg"
          : "../../../sass/assets/fr.svg";
      this.$forceUpdate();
    },
  },
};
</script>