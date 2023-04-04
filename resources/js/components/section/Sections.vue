<template>
    <v-btn
        class="previous-secion bs"
        variant="outlined"
        rounded="circle"
        height="63"
        width="30"
        @click="changeSection('previous')"
        v-if="1 < id"
    >
        <v-icon class="btn-text" size="28"> mdi-arrow-left </v-icon>
    </v-btn>
    <v-container class="text my-6">
        <v-row>
            <v-col cols="auto" class="px-0">
                <span style="font-size: 1.5em">{{
                    topic.title[$i18n.locale]
                }}</span>
            </v-col>
        </v-row>
        <v-row>
            <v-card
                class="card-test-bg text"
                :class="topic.image.length == 4 ? 'pt-8 pb-4 px-8' : 'pa-8'"
                rounded="lg"
            >
                <section-left-content
                    :topic="topic"
                    :topic_description="topic_description"
                ></section-left-content>
            </v-card>
        </v-row>
        <v-row>
            <!-- <v-col
                cols="12"
                style="text-align: justify"
                v-for="(content, index) in subjects.content"
                :key="index"
            >
                <div v-if="content.language == $i18n.locale">
                    {{ content.description }}
                </div>
            </v-col> -->
        </v-row>
        <section-right-content :subjects="subjects"></section-right-content>
        <v-row justify="center" class="my-8">
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
    position: fixed;
    top: 40%;
    left: 2%;
    float: left;
}
.next-section {
    border: none;
    position: fixed;
    top: 40%;
    float: right;
    right: 2%;
}
</style>

<script>
import SectionLeftContent from "../tools/section/SectionLeftContent.vue";
import SectionRightContent from "../tools/section/SectionRightContent.vue";
export default {
    components: {
        SectionLeftContent,
        SectionRightContent,
    },
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
            topic_description: "",
            topic_what_i_learned: "",
            subjects: {
                content: [
                    {
                        description: "",
                        image: "",
                        language: "",
                        subject_id: -1,
                    },
                ],
                info: {
                    ended_at: {
                        en: "",
                        fr: "",
                    },
                    id: -1,
                    location: "",
                    started_at: {
                        en: "",
                        fr: "",
                    },
                    team: "",
                },
            },
        };
    },
    mounted() {
        this.getSections();
        this.getSectionContents();
        this.getSectionSubjects();
    },
    methods: {
        getSectionSubjects() {
            axios
                .get("/api/subjects/" + this.id)
                .then((res) => {
                    this.subjects = res.data.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
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
    },
};
</script>
