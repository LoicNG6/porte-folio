<template>
  <v-col cols="3" class="mt-4">
    <v-row justify="center">
      <v-col cols="auto">
        <v-card
          rounded="xl"
          height="280"
          class="card-bg text"
          style="width: 320px;"
        >
          <slot name="card-content"></slot>
        </v-card>
      </v-col>
    </v-row>
  </v-col>
</template>
<script>
export default {
  name: "InformationCardTool",
};
</script>
