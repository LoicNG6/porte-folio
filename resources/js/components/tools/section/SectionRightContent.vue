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
                    max-width="50%"
                >
                    <div>
                        {{ $t("section.information.from") }} :
                        {{ subjects.info.started_at[$i18n.locale] }}
                    </div>
                    <div>
                        {{ $t("section.information.to") }} :
                        {{ subjects.info.ended_at[$i18n.locale] }}
                    </div>
                    <div>
                        {{ $t("section.information.location") }} :
                        {{ subjects.info.location }}
                    </div>
                    <div>
                        {{ $t("section.information.team") }} :
                        {{ subjects.info.team[$i18n.locale] }}
                    </div>
                </v-list-item>
            </v-list>
            <v-col
                class="mt-2"
                style="text-align: justify"
                v-for="(content, index) in subjects.content"
                :key="index"
            >
                <div>{{ content.description }}</div>
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
        subjects: {
            type: Object,
            required: true,
        },
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
};
</script>
