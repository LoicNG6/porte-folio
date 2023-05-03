<template>
    <v-row
        justify="start"
        class="my-12"
        :class="$vuetify.display.smAndDown ? 'py-4 px-12' : 'pa-4'"
        v-for="(locale_subject, index) in locale_subjects"
        :key="index"
    >
        <template v-if="locale_subject.info.id == 1">
            <div style="text-align: justify">
                {{ locale_subject.locale_content.description }}
            </div>
        </template>
        <template v-else-if="$vuetify.display.xs">
            <section-subject-content
                :locale_subject="locale_subject"
                :isLeftSubject="true"
                :topic_name="topic"
            >
            </section-subject-content>
        </template>
        <template v-else>
            <section-subject-content
                v-if="index % 2 == 0"
                :locale_subject="locale_subject"
                :isLeftSubject="false"
                :topic_name="topic"
            >
            </section-subject-content>
            <section-subject-content
                v-else
                :locale_subject="locale_subject"
                :isLeftSubject="true"
                :topic_name="topic"
            >
            </section-subject-content>
        </template>
    </v-row>
</template>

<script>
import SectionSubjectContent from "./SectionSubjectContent.vue";
export default {
    name: "section-subject",
    components: {
        SectionSubjectContent,
    },
    props: {
        subjects: {
            type: Object,
            required: true,
        },
        topic: {
            type: String,
            required: true,
        },
    },
    data: () => {
        return {
            subjects2: {},
            locale_subjects: [],
            subject_content: "",
        };
    },

    methods: {
        filterSubjects(subjects) {
            let result = [];
            subjects.map((subject) => {
                let array_subject_locale_content = subject.contents.filter(
                    (content) => content.language == this.$i18n.locale
                );

                result.push({
                    info: subject.info,
                    locale_content: array_subject_locale_content[0],
                });
            });
            return result;
        },
    },
    watch: {
        subjects() {
            this.locale_subjects = this.filterSubjects(this.subjects);
        },

        "$i18n.locale"() {
            this.locale_subjects = this.filterSubjects(this.subjects);
        },
    },
};
</script>
