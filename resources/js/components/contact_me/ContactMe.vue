<template>
    <v-container
        class="text"
        style="align-items: center; justify-content: center; display: flex"
    >
        <v-row style="text-align: center" justify="center">
            <v-col cols="12">
                <span>{{ $t("contact-me.first") }}</span>
                <br />
                <span>{{ $t("contact-me.second") }}</span>
            </v-col>
            <v-col cols="12">
                <span>{{ $t("contact-me.third") }}</span>
                <br />
                <span>{{ $t("contact-me.mail") }}</span>
                <br />
                <span>{{ $t("contact-me.phone") }}</span>
                <br />
                <span>{{ $t("contact-me.github") }}</span>
                <br />
                <span>{{ $t("contact-me.linkedIn") }}</span>
                <br />
            </v-col>
        </v-row>
    </v-container>
</template>
<script>
export default {
    name: "v-contact-me",
};
</script>
