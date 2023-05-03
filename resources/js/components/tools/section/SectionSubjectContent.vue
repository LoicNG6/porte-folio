<template>
    <v-col
        :cols="$vuetify.display.xs ? '12' : '4'"
        v-if="isLeftSubject && locale_subject.locale_content.subject_id != 13"
    >
        <v-card
            class="section-subject-card-bg text"
            width="100%"
            rounded="md"
            elevation="0"
        >
            <img
                style="filter: brightness(90%); height: 100%; width: 100%"
                :src="getImageURl()"
            />
        </v-card>
    </v-col>
    <v-col :cols="$vuetify.display.xs ? '12':''">
        <v-list
            class="pa-0"
            bg-color="transparent"
            style="display: flex"
            :style="!isLeftSubject ? 'justify-content: end' : ''"
        >
            <v-list-item
                :style="
                    $vuetify.display.xs
                        ? 'border: solid 0.01em #ffffff35'
                        : 'border-top: solid 0.01em #ffffff35'
                "
                min-height="30px"
                :max-width="$vuetify.display.smAndDown ? '100%' : '75%'"
                class="pl-1"
                :class="isLeftSubject ? 'left-subject' : 'right-subject'"
            >
                <div v-if="locale_subject.info.started_at != null">
                    {{ $t("section.information.from") }} :
                    {{ locale_subject.info.started_at[$i18n.locale] }}
                </div>
                <div v-if="locale_subject.info.ended_at != null">
                    {{ $t("section.information.to") }} :
                    {{ locale_subject.info.ended_at[$i18n.locale] }}
                </div>
                <div v-if="locale_subject.info.location != null">
                    {{ $t("section.information.location") }} :
                    {{ locale_subject.info.location }}
                </div>
                <div v-if="locale_subject.info.team != null">
                    {{ $t("section.information.team") }} :
                    {{ locale_subject.info.team[$i18n.locale] }}
                </div>
            </v-list-item>
        </v-list>
        <v-col
            v-if="$vuetify.display.mdAndUp"
            class="mt-2"
            style="text-align: justify"
        >
            <div v-if="locale_subject.locale_content.description != null">
                {{ locale_subject.locale_content.description }}
            </div>
        </v-col>
    </v-col>
    <v-col
        :cols="
            locale_subject.locale_content.subject_id == 13 &&
            $vuetify.display.smAndDown
                ? '12'
                : '4'
        "
        v-if="!isLeftSubject || locale_subject.locale_content.subject_id == 13"
    >
        <template v-if="locale_subject.locale_content.subject_id == 13">
            <v-card
                v-for="(skillType, index) in skills"
                :key="index"
                class="section-card-bg text mb-4"
                width="100%"
                rounded="lg"
            >
                <v-card-title>{{ index }}</v-card-title>
                <v-divider color="#ffffff"></v-divider>
                <v-list bg-color="transparent" class="px-4">
                    <v-list-item
                        v-for="skill in skillType"
                        :key="skill"
                        :style="
                            skill != skillType.slice(-1)
                                ? 'border-bottom: solid 0.01em #ffffff35'
                                : ''
                        "
                        class="px-0"
                    >
                        <span>{{ skill }}</span>
                        <template v-slot:append>
                            <img :src="iconPath" />
                        </template>
                    </v-list-item>
                </v-list>
            </v-card>
        </template>
        <template v-else>
            <v-card
                class="section-subject-card-bg text"
                width="100%"
                rounded="mg"
                elevation="0"
            >
                <img
                    style="filter: brightness(90%); height: 100%; width: 100%"
                    :src="getImageURl()"
                />
            </v-card>
        </template>
    </v-col>
    <v-col
        cols="12"
        v-if="
            $vuetify.display.smAndDown ||
            (locale_subject.locale_content.subject_id == 13 &&
                $vuetify.display.xs)
        "
        class="mt-2"
        style="text-align: justify"
    >
        <div v-if="locale_subject.locale_content.description != null">
            {{ locale_subject.locale_content.description }}
        </div>
    </v-col>
</template>
<style scoped>
.left-subject {
    border-left: solid 0.01em #ffffff35;
    border-top-left-radius: 3px;
}

.right-subject {
    border-right: solid 0.01em #ffffff35;
    border-top-right-radius: 3px;
}
</style>

<script>
export default {
    name: "section-subject-content",
    props: {
        locale_subject: {
            type: Object,
            required: true,
        },
        isLeftSubject: {
            type: Boolean,
            required: true,
        },
        topic_name: {
            type: String,
            required: true,
        },
    },
    data: () => {
        return {
            skills: {
                "Soft skills": [
                    "Writing specification documents and documentations",
                    "Make presentations + Doing formations",
                    "Being efficient + Being disciplined",
                ],
                "Hard skills": [
                    "Front = Vuejs 3, Vuetify 3",
                    "Back = Php 8, Mysql 8",
                    "Using of Test domain driven",
                ],
            },
            topic_data_name: "",
        };
    },
    computed: {
        iconPath() {
            return "/storage/images/checked-icon.svg";
        },
    },
    methods: {
        getImageURl() {
            if (this.topic_name != undefined) {
                return (
                    "/storage/images/" +
                    this.topic_name +
                    "/subjects/" +
                    this.locale_subject.info.image_path
                );
            }
        },
    },
    watch: {
        topic_name() {
            this.topic_data_name = this.topic_name;
        },
    },
};
</script>
