<template>
    <v-row
        justify="start"
        class="my-12 py-4"
        v-for="(locale_subject, index) in locale_subjects"
        :key="index"
    >
        <section-subject-content
            v-if="index % 2 == 0"
            :locale_subject="locale_subject"
            :isLeftSubject="false"
        >
        </section-subject-content>
        <section-subject-content
            v-else
            :locale_subject="locale_subject"
            :isLeftSubject="true"
        >
        </section-subject-content>
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
    },
    data: () => {
        return {
            subjects2: {},
            locale_subjects: [],
            subject_content: "",
        };
    },
    getLocalSubjects: {
        get() {
            return this.locale_subjects;
        },
        set(newVal) {
            console.log("test = ", this.subjects);
            this.locale_subjects = newVal;
            // this.locale_subjects = this.filterSubjects(this.subjects);
        },
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
        getImageURl(image_path) {
            return new URL(
                "../../../../sass/assets/".concat(
                    ...[this.subjects.content.image, "/", image_path]
                ),
                import.meta.url
            ).href;
        },
    },
    watch: {
        subjects() {
            this.getLocalSubjects = this.filterSubjects(this.subjects);
        },

        "$i18n.locale"() {
            console.log("subjects component test : ", this.$i18n.locale);
            this.getLocalSubjects = this.filterSubjects(this.subjects);
            console.log(this.locale_subjects);
        },
    },
};
</script>
