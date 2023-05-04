<template>
    <v-app-bar
        :elevation="0"
        color="#270a04"
        class="px-8 py-1"
        style="font-family: Gill Sans, sans-serif; color: #fceee5"
    >
        <v-row align="center" justify="space-between">
            <v-col cols="auto">
                <img
                    class="my-3"
                    src="/storage/images/logo.png"
                    width="60"
                    height="20"
                    @click="$router.push({ name: 'home' })"
                    style="cursor: pointer"
                />
            </v-col>
            <v-col cols="7">
                <v-tabs
                    height="40"
                    style="text-align: center"
                    align-tabs="title"
                >
                    <v-row>
                        <v-col>
                            <v-tab
                                v-for="menu in menu_items"
                                :key="menu"
                                hide-slider
                                class="mx-4"
                                @click="changeMenu(menu.to)"
                                rounded="0"
                                :style="
                                    menu.title.en == $route.name
                                        ? 'color: #ada8a8be; pointer-events:none; border-bottom:solid'
                                        : ''
                                "
                            >
                                <span class="menu">{{
                                    menu.title[$i18n.locale]
                                }}</span>
                            </v-tab>
                        </v-col>
                    </v-row>
                </v-tabs>
            </v-col>
            <v-col :cols="$vuetify.display.md ? 'auto' : '1'">
                <v-row justify="space-between">
                    <v-col class="pa-0" cols="auto">
                        <img
                            class="my-3"
                            :src="imageSrc"
                            @click="setLanguage()"
                            style="cursor: pointer"
                        />
                    </v-col>
                    <v-col cols="auto">
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
            links: ["Dashboard", "Messages", "Profile", "Updates"],
            count: 0,
            drawer: false,
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
                    to: "contact me",
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
    },
    methods: {
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
};
</script>
