<template>
    <v-row justify="start">
        <v-col cols="4">
            <v-card
                class="card-bg text"
                :height="topic.image.length == 4 ? '80%' : '100%'"
                width="100%"
                rounded="md"
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
                        style="filter: brightness(90%)"
                        :class="topic.image.length == 4 ? 'px-1' : ''"
                    />
                </template>
            </v-card>
        </v-col>
        <v-col>
            <v-list class="pa-0" bg-color="transparent">
                <v-list-item
                    style="
                        border-top: solid 0.01em #ffffff35;
                        border-left: solid 0.01em #ffffff35;
                        border-top-left-radius: 3px;
                    "
                    min-height="30px"
                    max-width="50%"
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
                        {{ $t("section.information.location") }} :
                        {{ topic.location }}
                    </div>
                </v-list-item>
            </v-list>
            <v-col style="text-align: justify" class="mt-2">
                <div>{{ localeSection.description }}</div>
            </v-col>
        </v-col>
    </v-row>
</template>

<script>
export default {
    name: "section-description",
    props: {
        topic: {
            type: Object,
            required: true,
        },
        section: {
            type: Object,
            required: true,
        },
    },
    data: () => {
        return {
            localeSection: {},
        };
    },
    methods: {
        getImageURl(image_path) {
            return new URL(
                "../../../../sass/assets/".concat(
                    ...[this.topic.title.en, "/", image_path]
                ),
                import.meta.url
            ).href;
        },
    },
    watch: {
        section() {
            this.localeSection = Object.assign({}, this.section[0]);
        },
    },
};
</script>
