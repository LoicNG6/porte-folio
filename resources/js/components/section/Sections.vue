<template>
    <v-btn
        class="previous-secion"
        variant="outlined"
        rounded="circle"
        height="63"
        width="30"
        @click="changeSection('previous')"
        v-if="1 < id"
    >
        <v-icon class="btn-text" size="28"> mdi-arrow-left </v-icon>
    </v-btn>
    <v-container class="text">
        <v-row>
            <v-col cols="auto">
                <span style="font-size: 1.5em">{{
                    topic.title[$i18n.locale]
                }}</span>
            </v-col>
        </v-row>
        <v-row justify="start">
            <v-col cols="auto">
                <v-card
                    class="card-bg text"
                    height="400"
                    width="500"
                    rounded="md"
                    elevation="5"
                >
                    <template
                        v-for="(image_path, index) in topic.image"
                        :key="index"
                    >
                        <img
                            :style="
                                topic.image.length == 4
                                    ? 'height: 50%; width: 50%'
                                    : 'height: 100%; width: 100%'
                            "
                            :src="getImageURl(image_path)"
                        />
                    </template>
                </v-card>
            </v-col>
            <v-col>
                <v-list class="pa-0" bg-color="transparent">
                    <v-list-item
                        style="border-left: solid 0.01em #ffffff85"
                        min-height="30px"
                    >
                        <div>
                            {{ $t("section.information.from") }} :
                            {{ topic.started_at[$i18n.locale] }}
                        </div>
                        <div>
                            {{ $t("section.information.to") }} :
                            {{ topic.ended_at[$i18n.locale] }}
                        </div>
                        <div>
                            {{ $t("section.information.location") }} : In the
                            subject table
                        </div>
                    </v-list-item>
                </v-list>
            </v-col>
        </v-row>
        <v-row justify="center">
            <v-col cols="12" style="text-align: justify">
                <div>{{ topic_description }}</div>
            </v-col>
            <v-col cols="12" style="text-align: justify">
                <div>{{ topic_what_i_learned }}</div>
            </v-col>
        </v-row>
    </v-container>
    <v-btn
        class="next-section"
        variant="outlined"
        rounded="circle"
        height="63"
        width="30"
        @click="changeSection()"
        v-if="id < 4"
    >
        <v-icon class="btn-text" size="28"> mdi-arrow-right </v-icon>
    </v-btn>
</template>
<style scoped>
.previous-secion {
    border: none;
    position: absolute;
    top: 40%;
    left: 2%;
    float: left;
}
.next-section {
    border: none;
    position: absolute;
    top: 40%;
    float: right;
    right: 2%;
}
</style>
<script>
export default {
    props: {
        id: [Number, String],
    },
    data: () => {
        return {
            topic: {
                title: -1,
                image: [-1],
                started_at: [-1],
                ended_at: [-1],
            },
            topic_description: " ",
            topic_what_i_learned: " ",
        };
    },
    mounted() {
        this.getSections();
        this.getSectionContents();
    },
    methods: {
        getSections() {
            axios
                .get("/api/sections/" + this.id)
                .then((res) => {
                    this.topic = res.data.topic;
                    this.topic.image = Object.values(this.topic.image);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        getSectionContents() {
            axios
                .get(
                    "/api/section-content/" + this.id + "/" + this.$i18n.locale
                )
                .then((res) => {
                    this.topic_description =
                        res.data.description != "-"
                            ? res.data.description
                            : this.topic_description;
                    this.topic_what_i_learned =
                        res.data.what_i_learned != "-"
                            ? res.data.what_i_learned
                            : this.topic_what_i_learned;
                });
        },
        changeSection(direction) {
            if (1 < this.id < 4) {
                var new_topic_id =
                    direction == "previous"
                        ? parseInt(this.id) - 1
                        : parseInt(this.id) + 1;

                this.$router.push({
                    name: "section",
                    params: { id: new_topic_id },
                });
                setTimeout(() => {
                    document.location.reload();
                }, 30);
            }
        },
        getImageURl(image_path) {
            return new URL(
                "../../../sass/assets/".concat(
                    ...[this.topic.title.en, "/", image_path]
                ),
                import.meta.url
            ).href;
        },
    },
};
</script>
