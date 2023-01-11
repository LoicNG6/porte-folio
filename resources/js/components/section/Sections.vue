<template>
  <v-dialog v-model="active">
    <v-card>
      <v-container class="text" style="border: solid">
        <v-row class="my-8">
          <v-col style="text-align: center">
            <span style="font-size: 3em; font-weight: bold">
              {{ $route.query.topic_title }}</span
            >
            <!-- {{
            $t(
              "section.description." +
                $route.query.topic_title.substring(
                  0,
                  $route.query.topic_title.indexOf(".")
                )
            )
          }}
          élément 0 =
          {{
            $route.query.topic_title.substring(
              0,
              $route.query.topic_title.indexOf(".")
            )
          }} -->
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
                    :style="
                      hover ? 'background-color: rgba(64, 31, 19, 0.5)' : ''
                    "
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
        <!-- <Subjects></Subjects> -->
      </v-container>
    </v-card>
  </v-dialog>
</template>
<script>
import Subjects from "../subject/Subjects.vue";
export default {
  components: {
    Subjects,
  },
  props: {
    id: [Number, String],
    dialog: Boolean,
  },
  data: () => {
    return {
      sections: null,
    };
  },
  computed: {
    active: {
      get() {
        return this.dialog;
      },
    },
  },
  mounted() {
    this.getSections();
  },
  methods: {
    getSections() {
      axios
        .get("/api/sections/" + this.id)
        .then((res) => {
          this.sections = res.data.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>