<template>
    <v-container
        class="text"
        style="align-items: center; justify-content: center; display: flex"
    >
        <v-row style="text-align: center" justify="center">
            <v-col cols="12">
                <span>{{ $t("about.first") }}</span>
            </v-col>
            <v-col cols="12">
                <span>{{ $t("about.second") }}</span>
            </v-col>
            <v-col cols="12">
                <span>{{ $t("about.third") }}</span>
            </v-col>
        </v-row>
    </v-container>
</template>
<script>
export default {
    name: "v-about",
};
</script>
