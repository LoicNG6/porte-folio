<template>
    <v-container fluid v-if="$route.name == 'home'">
        <v-row justify="center" class="my-8">
            <information-card-tool style="color: whitesmoke">
                <template v-slot:card-content>
                    <v-card-title class="text">{{
                        $t("home.introduction_title")
                    }}</v-card-title>
                    <v-divider color="#c8b4b4"></v-divider>
                    <v-card-text>
                        <v-container>
                            <v-row style="text-align: justify">{{
                                $t("home.introduction")
                            }}</v-row>
                        </v-container>
                    </v-card-text>
                </template>
            </information-card-tool>
            <information-card-tool>
                <template v-slot:card-content>
                    <v-card-title class="text">
                        <v-row justify="space-between">
                            <v-col cols="auto">
                                {{ $t("home.tips_title") }}
                            </v-col>
                            <v-col cols="auto">
                                <v-icon light color="yellow">
                                    mdi-lightbulb-on
                                </v-icon>
                            </v-col>
                        </v-row>
                    </v-card-title>
                    <v-divider color="#c8b4b4"></v-divider>
                    <v-card-text>
                        <v-container>
                            <v-row style="text-align: justify">{{
                                $t("home.tips")
                            }}</v-row>
                        </v-container>
                    </v-card-text>
                </template>
            </information-card-tool>
        </v-row>
        <v-row align-content="center" justify="center" class="my-8">
            <v-sheet
                color="#ffffff00"
                :max-width="
                    $vuetify.display.md
                        ? '730'
                        : $vuetify.display.sm
                        ? '590'
                        : $vuetify.display.xs
                        ? '320'
                        : '1050'
                "
            >
                <v-slide-group
                    style="color: white"
                    v-model="model"
                    class="py-4"
                    prev-icon="mdi-arrow-left-bold"
                    next-icon="mdi-arrow-right-bold"
                    show-arrows
                >
                    <v-slide-group-item
                        v-for="(topic, index) in topics"
                        :key="index"
                        class="bs"
                    >
                        <v-card
                            class="text card-bg"
                            :class="
                                $vuetify.display.sm
                                    ? 'mx-3'
                                    : $vuetify.display.xs
                                    ? 'mx-2'
                                    : 'mx-6'
                            "
                            :max-width="
                                $vuetify.display.sm
                                    ? '220'
                                    : $vuetify.display.xs
                                    ? '200'
                                    : '260'
                            "
                            rounded="xl"
                            height="240"
                        >
                            <v-container fluid>
                                <v-row justify="center">
                                    <v-col cols="auto" class="text">
                                        {{ topic.title[$i18n.locale] }}
                                    </v-col>
                                </v-row>
                                <v-row
                                    ><v-divider color="white"></v-divider
                                ></v-row>
                                <v-row
                                    justify="center"
                                    style="height: 100px"
                                    :class="
                                        $vuetify.display.xs ? 'mt-3' : 'my-4'
                                    "
                                >
                                    <v-col cols="12" style="font-size: 0.9em">
                                        {{ topic.teaser[$i18n.locale] }}
                                    </v-col>
                                </v-row>
                                <v-row justify="center">
                                    <v-col
                                        cols="8"
                                        justify-center
                                        style="text-align: center"
                                    >
                                        <v-btn
                                            @click="
                                                goToSection(
                                                    topic.id,
                                                    topic.title[$i18n.locale]
                                                )
                                            "
                                            width="100"
                                            rounded="pill"
                                            class="btn-bg"
                                        >
                                            <v-icon
                                                class="btn-text"
                                                size="x-large"
                                            >
                                                mdi-eye-outline
                                            </v-icon>
                                        </v-btn>
                                    </v-col>
                                </v-row>
                            </v-container>
                        </v-card>
                    </v-slide-group-item>
                </v-slide-group>
            </v-sheet>
        </v-row>
    </v-container>
    <router-view v-else />
</template>
<style lang="scss" scoped>
@import url("../../../css/app.scss");
</style>
<script>
import InformationCardTool from "./InformationCardTool.vue";
export default {
    components: {
        InformationCardTool,
    },
    data: () => {
        return {
            topics: null,
            model: null,
            intro: null,
            tips: null,
        };
    },
    mounted() {
        this.getTopics();
    },
    methods: {
        getTopics() {
            axios
                .get("/api/topics")
                .then((res) => {
                    this.topics = res.data.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        goToSection(topic_id) {
            this.$router.push({
                name: "section",
                params: { id: topic_id },
            });
        },
    },
    watch: {
        "$i18n.locale": function () {
            this.$forceUpdate();
        },
    },
};
</script>
