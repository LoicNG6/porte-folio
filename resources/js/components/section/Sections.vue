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
                <section-description
                    :topic="topic"
                    :section="getLocaleSectionDescription()"
                ></section-description>
            </v-card>
        </v-row>

        <section-subjects :subjects="subjects"></section-subjects>

        <v-row justify="center" class="my-8">
            <v-col cols="12" style="text-align: justify">
                <!-- <div>{{ topic_what_i_learned }}</div> -->
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
import SectionDescription from "../tools/section/SectionDescription.vue";
import SectionSubjects from "../tools/section/SectionSubjects.vue";

export default {
    components: {
        SectionDescription,
        SectionSubjects,
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
            section: [
                {
                    section_id: -1,
                    language: "",
                    description: "",
                    what_i_learned: "",
                },
            ],
            subjects: [
                {
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
                    contents: [
                        {
                            subject_id: -1,
                            language: "",
                            description: "",
                            image: "",
                        },
                    ],
                },
            ],
        };
    },
    mounted() {
        this.getSections();
        this.getSectionContents();
        this.getSectionSubjects();
    },
    methods: {
        getLocaleSectionDescription() {
            return this.section.filter(
                (section) => section.language == this.$i18n.locale
            );
        },
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
            axios.get("/api/section-contents/" + this.id).then((res) => {
                this.section = res.data;
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
