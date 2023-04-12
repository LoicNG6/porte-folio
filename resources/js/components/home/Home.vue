<template>
    <v-container fluid v-if="$route.name == 'home'" class="pa-0">
        <v-row justify="center" class="my-4">
            <information-card-tool style="color: whitesmoke">
                <template v-slot:card-content>
                    <v-card-title>{{
                        $t("home.introduction_title")
                    }}</v-card-title>
                    <v-divider color="#c8b4b4"></v-divider>
                    <v-card-text>
                        <v-container>
                            <v-row class="text" style="text-align: justify">{{
                                $t("home.introduction")
                            }}</v-row>
                        </v-container>
                    </v-card-text>
                </template>
            </information-card-tool>
            <information-card-tool>
                <template v-slot:card-content>
                    <v-card-title>
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
                            <v-row class="text" style="text-align: justify">{{
                                $t("home.tips")
                            }}</v-row>
                        </v-container>
                    </v-card-text>
                </template>
            </information-card-tool>
        </v-row>
        <v-row align-content="center" justify="center" class="text my-8">
            <v-sheet class="mx-auto" max-width="1100" color="#ffffff00">
                <v-slide-group
                    style="color: white"
                    v-model="model"
                    class="pa-4"
                    prev-icon="mdi-arrow-left-bold"
                    next-icon="mdi-arrow-right-bold"
                    show-arrows
                >
                    <v-slide-group-item
                        v-for="(topic, index) in topics"
                        :key="index"
                    >
                        <v-card
                            class="mx-6 text card-bg"
                            width="270"
                            rounded="xl"
                            height="250"
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
                                    class="my-4"
                                >
                                    <v-col cols="12">
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
