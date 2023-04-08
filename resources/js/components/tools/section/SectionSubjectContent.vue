<template>
    <v-col cols="4" v-if="isLeftSubject">
        <v-card class="card-bg text" height="100%" width="100%" rounded="md">
            subject images
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
    <v-col cols="4" v-if="!isLeftSubject">
        <v-card class="card-bg text" height="100%" width="100%" rounded="md">
            subject images
        </v-card>
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
};
</script>
