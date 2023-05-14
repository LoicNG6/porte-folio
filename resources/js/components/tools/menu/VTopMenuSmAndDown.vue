<template>
    <v-app-bar
        :elevation="0"
        color="#270a04"
        class="py-1"
        :class="$vuetify.display.smAndDown ? 'px-6' : 'px-14'"
        style="font-family: Gill Sans, sans-serif; color: #fceee5"
    >
        <v-row align="center" justify="space-between">
            <v-col cols="1">
                <img
                    width="30"
                    height="30"
                    :src="computedDrawerImage"
                    @click="activeMenu()"
                    style="cursor: pointer"
                />
            </v-col>
            <v-col cols="auto" class="py-0">
                <img
                    class="my-3"
                    src="/storage/images/logo.png"
                    width="60"
                    height="20"
                    @click="$router.push({ name: 'home' })"
                    style="cursor: pointer"
                />
            </v-col>
            <v-col cols="auto">
                <v-row justify="space-between">
                    <v-col class="pa-0" cols="auto">
                        <img
                            class="my-3"
                            :src="imageSrc"
                            @click="setLanguage()"
                            style="cursor: pointer"
                        />
                    </v-col>
                </v-row>
            </v-col>
        </v-row>
    </v-app-bar>
    <v-navigation-drawer
        color="#270a04"
        v-model="drawer"
        class="text pt-2 pb-14"
        :width="$vuetify.display.xs ? '600' : '250'"
    >
        <v-list
            class="my-4"
            :style="$vuetify.display.xs ? 'text-align: center;' : ''"
        >
            <v-list-item
                class="menuSmAndDown my-2 px-6 text"
                v-for="menu in menu_items"
                :key="menu.positon"
                :title="menu.title[$i18n.locale]"
                :to="'/NGUESSIE-Loic/' + menu.to"
            ></v-list-item>
        </v-list>
        <template v-slot:append>
            <v-divider color="#ffffff25" class="my-4"></v-divider>
            <v-row class="mb-4 mt-4" justify="center">
                <v-col cols="auto">
                    <v-btn
                        height="60"
                        width="150"
                        rounded="pill"
                        class="menu-btn"
                        prepend-icon="mdi-account-circle-outline"
                        @click="$router.push({ name: 'admin' })"
                    >
                        admin
                    </v-btn>
                </v-col>
            </v-row>
        </template>
    </v-navigation-drawer>
</template>
<style lang="scss" scoped>
@import url("../../../../css/app.scss");
</style>
<script>
export default {
    name: "v-top-menu-smAndDown",
    data: () => {
        return {
            image_trad_path: "",
            count: 0,
            drawer: false,
            drawerImage: "/storage/images/drawer-icon.svg",
            selectedItem: 0,
            menu_items: [
                {
                    positon: 0,
                    title: { en: "home", fr: "acceuil" },
                    icon: "mdi-home",
                    to: "home",
                },
                {
                    positon: 1,
                    title: { en: "contact me", fr: "me contacter" },
                    icon: "mdi-message-text",
                    to: "contact-me",
                },
                {
                    positon: 2,
                    title: { en: "about", fr: "à propos" },
                    icon: "mdi-information-outline",
                    to: "about",
                },
            ],
        };
    },
    mounted() {
        this.image_trad_path =
            this.$i18n.locale == "fr"
                ? "/storage/images/en.svg"
                : "/storage/images/fr.svg";
    },
    computed: {
        imageSrc() {
            return this.image_trad_path;
        },
        computedDrawerImage: {
            get() {
                return this.drawerImage;
            },
            set(value) {
                this.drawerImage = value;
            },
        },
    },
    methods: {
        activeMenu() {
            this.drawer = !this.drawer;
            if (this.drawer == false)
                this.drawerImage = "/storage/images/drawer-icon.svg";
            else this.drawerImage = "/storage/images/drawer-icon-close.svg";
        },
        changeMenu(route) {
            this.$router.push({ name: route });
        },
        setLanguage() {
            if (this.$i18n.locale === "en") this.$i18n.locale = "fr";
            else this.$i18n.locale = "en";

            localStorage.setItem("curr_language", this.$i18n.locale);

            this.image_trad_path =
                this.$i18n.locale == "fr"
                    ? "/storage/images/en.svg"
                    : "/storage/images/fr.svg";
            this.$forceUpdate();
        },
    },
    watch: {
        drawer: function () {
            if (this.drawer == false)
                this.drawerImage = "/storage/images/drawer-icon.svg";
        },
    },
};
</script>
