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
            locale_subjects: [],
            subject_content: "",
        };
    },
    methods: {
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
            this.subjects.map((subject) => {
                let array_subject_locale_content = subject.contents.filter(
                    (content) => content.language == this.$i18n.locale
                );

                this.locale_subjects.push({
                    info: subject.info,
                    locale_content: array_subject_locale_content[0],
                });
            });
        },
    },
};
</script>
