<template>
  <v-navigation-drawer class="text" color="#392820" dark permanent app>
    <v-list-item style="height: 63px; text-align: center">
      <v-list-item-content>
        <v-list-item-title class="text-h6"><h3>Loco</h3></v-list-item-title>
      </v-list-item-content>
    </v-list-item>

    <v-divider></v-divider>

    <v-list dense nav class="pa-0">
      <v-list-item-group v-model="selectedMenu">
        <v-list-item
          link
          v-for="(menu, m) in menus"
          :key="m"
          @click="changeMenu(menu.to)"
          :disabled="m == selectedMenu"
          class="px-4"
          style="height: 70px"
        >
          <v-list-item-icon style="position: relative; top: 20%">
            <v-icon> {{ menu.icon }}</v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title>
              <span
                :style="
                  m == selectedMenu
                    ? 'font-weight:bold; pointer-events: none'
                    : ''
                "
                class="text"
                >{{ menu.title }}</span
              >
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list-item-group>
    </v-list>

    <v-divider style="position: relative; top: 50%"></v-divider>

    <v-btn
      to="admin"
      color="#4e382f"
      rounded
      height="80"
      x-large
      elevation="4"
      style="position: relative; top: 55%; left: 12%"
    >
      <v-row align="center">
        <v-col cols="auto">
          <v-icon dark x-large>mdi-account-circle</v-icon>
        </v-col>
        <v-col cols="6"> Admin </v-col>
      </v-row>
    </v-btn>
  </v-navigation-drawer>
</template>
<script>
  export default {
    name: "v-left-menu",
    data: () => {
      return {
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
      this.menus.map((m) => {
        if (this.$route.name == m.to) this.selectedMenu = m.positon;
      });
    },
    methods: {
      changeMenu(route_name) {
        return this.$router.push({ name: route_name });
      },
    }
  };
</script>
