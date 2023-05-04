<template>
    <v-col
        :style="
            $vuetify.display.sm ? 'display: flex; justify-content: center' : ''
        "
        :cols="$vuetify.display.sm ? '5' : 'auto'"
    >
        <v-card
            rounded="xl"
            class="card-bg text"
            :max-width="$vuetify.display.sm ? '300' : '300'"
            :height="$vuetify.display.sm ? '280' : '280'"
        >
            <slot name="card-content"></slot>
        </v-card>
    </v-col>
</template>
<style lang="scss" scoped>
@import url("../../../css/app.scss");
</style>
<script>
export default {
    name: "InformationCardTool",
};
</script>
