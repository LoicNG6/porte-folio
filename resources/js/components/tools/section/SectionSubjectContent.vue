<template>
    <v-col cols="4" v-if="isLeftSubject">
        <v-card class="card-bg text" height="100%" width="100%" rounded="md">
        </v-card>
    </v-col>
    <v-col>
        <v-list
            class="pa-0"
            bg-color="transparent"
            style="display: flex"
            :style="!isLeftSubject ? 'justify-content: end' : ''"
        >
            <v-list-item
                style="border-top: solid 0.01em #ffffff35"
                min-height="30px"
                max-width="75%"
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
        <v-col class="mt-2" style="text-align: justify">
            <div v-if="locale_subject.locale_content.description != null">
                {{ locale_subject.locale_content.description }}
            </div>
        </v-col>
    </v-col>
    <v-col cols="4" v-if="!isLeftSubject">
        <template v-if="(locale_subject.info.id = 13)">
            <v-card
                v-for="(skillType, index) in skills"
                :key="index"
                class="card-test-bg text mb-4"
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
                class="card-bg text"
                height="100%"
                width="100%"
                rounded="md"
            >
                <template> locale_subject.info.image </template>
            </v-card>
        </template>
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
        };
    },
    computed: {
        iconPath() {
            return new URL(
                "../../../../sass/assets/checked-icon.svg",
                import.meta.url
            ).href;
        },
    },
};
</script>
