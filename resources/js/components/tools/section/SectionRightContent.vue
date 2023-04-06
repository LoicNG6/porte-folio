<template>
    <v-row justify="start" class="my-12 py-4">
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
                        {{ info.started_at[$i18n.locale] }}
                    </div>
                    <div>
                        {{ $t("section.information.to") }} :
                        {{ info.ended_at[$i18n.locale] }}
                    </div>
                    <div>
                        {{ $t("section.information.location") }} :
                        {{ info.location }}
                    </div>
                    <div>
                        {{ $t("section.information.team") }} :
                        {{ info.team[$i18n.locale] }}
                    </div>
                </v-list-item>
            </v-list>
            <v-col class="mt-2" style="text-align: justify">
                <div>{{ subject_content }}</div>
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
        info: {
            type: Object,
            required: true,
        },
        contents: {
            type: Object,
            require: true,
        },
    },
    data: () => {
        return {
            subject_content: "",
        };
    },
    computed: {
        getContent() {},
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
        contents() {
            if (this.contents.description != "-")
                this.subject_content = this.contents.description;
        },
    },
};
</script>
