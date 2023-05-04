<template>
    <v-row justify="start">
        <v-col v-if="$vuetify.display.xs" cols="auto">
            <v-list class="pa-0" bg-color="transparent">
                <v-list-item
                    style="border: solid 0.01em #ffffff35; border-radius: 3px"
                    min-height="30px"
                    :max-width="$vuetify.display.smAndDown ? '' : '65%'"
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
        </v-col>
        <v-col
            :cols="$vuetify.display.sm ? '6' : $vuetify.display.xs ? '10' : '4'"
        >
            <v-card
                class="card-bg text"
                :height="$vuetify.display.smAndDown ? '100%' : '80%'"
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
                        style="filter: brightness(90%); border-radius: 0px"
                        :class="
                            topic.image.length == 4 &&
                            (index == 1 || index == 3)
                                ? 'pl-2'
                                : ''
                        "
                    />
                </template>
            </v-card>
        </v-col>
        <v-col
            v-if="$vuetify.display.smAndUp"
            :cols="$vuetify.display.sm ? '6' : $vuetify.display.xs ? '12' : '8'"
        >
            <v-list class="pa-0" bg-color="transparent">
                <v-list-item
                    style="
                        border-top: solid 0.01em #ffffff35;
                        border-left: solid 0.01em #ffffff35;
                        border-top-left-radius: 3px;
                    "
                    min-height="30px"
                    :max-width="$vuetify.display.smAndDown ? '' : '65%'"
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
            <v-col
                v-if="$vuetify.display.mdAndUp"
                style="text-align: justify"
                class="mt-2"
            >
                <div>{{ localeSection.description }}</div>
            </v-col>
        </v-col>
        <v-col
            v-if="$vuetify.display.smAndDown"
            :cols="$vuetify.display.smAndDown ? '12' : 'auto'"
            style="text-align: justify"
            :class="$vuetify.display.smAndDown ? '' : ''"
        >
            <div>{{ localeSection.description }}</div>
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
            if (this.topic.title.en != undefined) {
                return (
                    "/storage/images/" + this.topic.title.en + "/" + image_path
                );
            }
        },
    },
    watch: {
        section() {
            this.localeSection = Object.assign({}, this.section[0]);
        },
    },
};
</script>
