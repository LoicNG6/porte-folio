<template>
    <v-row
        justify="start"
        class="my-12 py-4"
        v-for="(locale_subject, index) in locale_subjects"
        :key="index"
    >
        <v-col>
            <v-list
                class="pa-0"
                bg-color="transparent"
                style="display: flex; justify-content: end"
            >
                <v-list-item
                    style="
                        border-top: solid 0.01em #ffffff35;
                        border-right: solid 0.01em #ffffff35;
                        border-top-right-radius: 3px;
                        justify-content: end;
                    "
                    min-height="30px"
                    max-width="75%"
                    class="pl-1"
                >
                    <div>
                        {{ $t("section.information.from") }} :
                        {{ locale_subject.info.started_at[$i18n.locale] }}
                    </div>
                    <div>
                        {{ $t("section.information.to") }} :
                        {{ locale_subject.info.ended_at[$i18n.locale] }}
                    </div>
                    <div>
                        {{ $t("section.information.location") }} :
                        {{ locale_subject.info.location }}
                    </div>
                    <div>
                        {{ $t("section.information.team") }} :
                        {{ locale_subject.info.team[$i18n.locale] }}
                    </div>
                </v-list-item>
            </v-list>
            <v-col class="mt-2" style="text-align: justify">
                <div>{{ locale_subject.locale_content.description }}</div>
            </v-col>
        </v-col>
        <v-col cols="4">
            <v-card
                class="card-bg text bs"
                height="100%"
                width="100%"
                rounded="md"
            >
                subject images
            </v-card>
        </v-col>
    </v-row>
</template>

<script>
export default {
    name: "section-right-content",
    props: {
        // info: {
        //     type: Object,
        //     required: true,
        // },
        // contents: {
        //     type: Object,
        //     require: true,
        // },
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
