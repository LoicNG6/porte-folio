<template>
  <v-container class="text">
    <v-row class="my-8">
      <v-col style="text-align: center">
        <span style="font-size: 3em; font-weight: bold">Section title</span>
      </v-col>
    </v-row>
    <v-row justify="space-around">
      <v-col cols="auto">
        <v-card
          color="transparent"
          height="500"
          width="400"
          rounded="xl"
          class="px-4 paragraph"
          elevation="5"
        >
          <v-card-title class="text">Section description :</v-card-title>
        </v-card>
      </v-col>
      <v-col cols="5">
        <v-row justify="space-around">
          <v-col cols="auto">
            <v-hover v-slot="{ hover }">
              <v-card
                color="#401F13"
                :height="hover ? 210 : 200"
                rounded="xl"
                :width="hover ? 210 : 200"
                :elevation="hover ? 20 : 10"
                style="text-align: center; cursor: pointer"
                :style="hover ? 'background-color: rgba(64, 31, 19, 0.5)' : ''"
                to="subject"
              >
                <v-container class="text">
                  <v-row justify="center">
                    <v-col> subject log/img </v-col>
                  </v-row>
                </v-container>
              </v-card>
            </v-hover>
          </v-col>
        </v-row>
      </v-col>
    </v-row>
    <Subjects></Subjects>
  </v-container>
</template>
<script>
import Subjects from "./Subjects.vue";
export default {
  components: {
    Subjects,
  },
  props: {
    id: String,
    topic_title: String,
  },
  data: () => {
    return {
      sections: null,
    };
  },
  mounted() {
    console.log("on the section ", this.id);
    this.getSections();
  },
  methods: {
    getSections() {
      console.log("hello getSections");
      this.$axios
        .get("/api/sections/" + this.id)
        .then((res) => {
          this.sections = res.data.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  watch: {
    showSection: function () {
      this.dialog = this.showSection;
    },
  },
};
</script>