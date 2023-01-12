<template>
  <v-container class="text">
    <!-- title of the page -->
    <v-row>
      <v-col cols="auto">
        <span style="font-size: 1.5em"> {{ $route.query.topic_title }}</span>
        <!-- for the traduction -->
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

    <!-- Contain of the page -->
    <v-row>
      <v-col cols="auto">
        <v-card
          color="transparent"
          height="400"
          width="500"
          rounded="sm"
          class="px-4 paragraph"
          elevation="5"
        >
          <v-card-title class="text">
            Section image (to delete after)
            <v-img
              lazy-src="https://picsum.photos/id/11/10/6"
              max-height="150"
              max-width="250"
              src="https://picsum.photos/id/11/500/300"
            ></v-img>
            <v-img
              
              max-height="150"
              max-width="250"
              src="images/school.jpg"
            ></v-img>
          </v-card-title>
        </v-card>
      </v-col>
      <v-col cols="6">
        section main information (to delete after)
        <v-list
          bg-color="transparent"
          active-color="blue"
          style="border-left: solid"
        >
          <v-list-item
            v-for="information in sections_information"
            :key="information.title"
          >
            {{ information.title }} : {{ information.value }}
          </v-list-item>
        </v-list>
      </v-col>
    </v-row>
    <v-row justify="space-around">
      <v-col cols="auto" style="border: solid">
        <div>Section description (to delete after)</div>
      </v-col>
      <v-col cols="auto">
        What I learned during this section (to delete)
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
export default {
  props: {
    id: [Number, String],
    dialog: Boolean,
  },
  data: () => {
    return {
      sections: null,
      sections_information: [
        { title: "Date", value: null },
        { title: "Location", value: null },
        { title: "Context", value: null },
        { title: "Team", value: null },
      ],
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