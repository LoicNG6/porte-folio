<template>
  <v-col cols="4">
    <v-img
      style="position: relative; float: left; left: 13%; top: 5%; z-index: 1"
      min-height="35"
      min-width="35"
      src="images/icons/adhesive_right.png"
    ></v-img>
    <v-img
      style="position: relative; float: right; right: 13%; top: 5%; z-index: 1"
      min-height="35"
      min-width="35"
      src="images/icons/adhesive_left.png"
    ></v-img>
    <v-row justify="center" class="py-6">
      <v-col cols="auto">
        <v-card
          rounded="md"
          height="280"
          class="text"
          color="#320f08"
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
