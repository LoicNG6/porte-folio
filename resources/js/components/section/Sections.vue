<template>
    <v-btn
        class="previous-secion"
        variant="outlined"
        rounded="circle"
        height="60"
        width="10"
        @click="changeSection('previous')"
        v-if="1 < id"
    >
        <v-icon
            class="btn-text"
            :size="$vuetify.display.smAndDonw ? '25' : '28'"
        >
            mdi-arrow-left
        </v-icon>
    </v-btn>

    <v-container class="text my-6 px-8">
        <v-row justify="center">
            <v-col cols="11">
                <span style="font-size: 1.5em">{{
                    topic.title[$i18n.locale]
                }}</span>
            </v-col>
        </v-row>
        <v-row justify="center">
            <v-col cols="11">
                <v-card
                    class="section-card-bg text"
                    :class="topic.image.length == 4 ? 'pt-8 pb-4 px-8' : 'pa-8'"
                    rounded="lg"
                >
                    <section-description
                        :topic="topic"
                        :section="locale_sections"
                    ></section-description>
                </v-card>
            </v-col>
        </v-row>
        <section-subjects
            :subjects="subjects"
            :topic="topic.title.en"
        ></section-subjects>
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
        <v-icon
            class="btn-text"
            :size="$vuetify.display.smAndDonw ? '25' : '28'"
        >
            mdi-arrow-right
        </v-icon>
    </v-btn>
</template>

<style scoped>
.previous-secion {
    border: none;
    position: fixed;
    top: 50%;
    left: 1%;
    float: left;
}
.next-section {
    border: none;
    position: fixed;
    top: 50%;
    float: right;
    right: 1%;
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
                location: "",
            },
            section: [
                {
                    section_id: -1,
                    language: "",
                    description: "",
                    what_i_learned: "",
                },
            ],
            locale_sections: {},
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
                        image_path: "",
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
                this.locale_sections = this.section.filter(
                    (section) => section.language == this.$i18n.locale
                );
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
    watch: {
        "$i18n.locale"() {
            this.locale_sections = this.section.filter(
                (section) => section.language == this.$i18n.locale
            );
        },
    },
};
</script>
