<template>
  <v-app-bar color="#392820" dark app class="py-4">
    <v-row align-content="center" justify="center">
      <v-col cols="5" class="px-0" style="display: inline-block">
        <v-text-field outlined dense></v-text-field>
      </v-col>
      <v-col cols="auto" class="pt-2 px-1">
        <v-btn icon>
          <v-icon>mdi-magnify</v-icon>
        </v-btn>
      </v-col>
    </v-row>
  </v-app-bar>
</template>
<script>
  export default {
    name: "v-top-menu",
    data: () => {
      return {};
    },
    methods: {},
  };
</script>
