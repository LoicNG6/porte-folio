<template>
  <v-container fluid v-if="$route.name == 'home'">
    <v-row justify="center" class="my-8">
      <v-col cols="auto">
        <v-card
          rounded="xl"
          height="280"
          variant="outlined"
          style="width: 320px; border: solid 0.3em; border-color: #52362a"
        >
          <v-card-title>{{ $t("introduction_title") }} </v-card-title>
          <v-divider color="#c8b4b4"></v-divider>
          <v-card-text>
            <v-container>
              <v-row class="text" style="text-align: justify">{{
                $t("introduction")
              }}</v-row>
            </v-container>
          </v-card-text>
        </v-card>
      </v-col>
      <v-col cols="auto">
        <v-card
          rounded="xl"
          height="280"
          variant="outlined"
          style="width: 320px; border: solid 0.3em; border-color: #52362a"
        >
          <v-card-title>
            <v-row justify="space-between">
              <v-col cols="auto">
                {{ $t("tips_title") }}
              </v-col>
              <v-col cols="auto">
                <v-icon light color="yellow"> mdi-lightbulb-on </v-icon>
              </v-col>
            </v-row>
          </v-card-title>

          <v-divider color="#c8b4b4"></v-divider>
          <v-card-text>
            <v-container>
              <v-row class="text" style="text-align: justify">{{
                $t("tips")
              }}</v-row>
            </v-container>
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
    <v-row align-content="center" justify="center" class="text my-8">
      <v-sheet class="mx-auto" max-width="970" color="#ffffff00">
        <v-slide-group
          style="color: white"
          v-model="model"
          class="pa-4"
          prev-icon="mdi-arrow-left-bold"
          next-icon="mdi-arrow-right-bold"
          show-arrows
        >
          <v-slide-group-item v-for="(topic, index) in topics" :key="index">
            <v-card
              class="mx-4 text"
              width="250"
              color="#6f4b3e80"
              elevation="8"
              rounded="lg"
              height="250"
              style="color: rgb(240, 234, 234)"
            >
              <v-container fluid>
                <v-row justify="center">
                  <v-col cols="auto" class="text">
                    {{ topic.title[$i18n.locale] }}
                  </v-col>
                </v-row>
                <v-row><v-divider color="white"></v-divider></v-row>
                <v-row justify="center" style="height: 100px" class="my-4">
                  <v-col cols="12">
                    {{ topic.description[$i18n.locale] }}
                  </v-col>
                </v-row>
                <v-row justify="center">
                  <v-col cols="8" justify-center style="text-align: center">
                    <v-btn
                      @click="goToSection(topic.id, topic.title[$i18n.locale])"
                      width="130"
                      color="#6f4b3ecd"
                    >
                      <v-icon light> mdi-eye-outline </v-icon>
                    </v-btn>
                  </v-col>
                </v-row>
              </v-container>
            </v-card>
          </v-slide-group-item>
        </v-slide-group>
      </v-sheet>
    </v-row>
  </v-container>
  <router-view v-else />
</template>
<script>
export default {
  data: () => {
    return {
      topics: null,
      model: null,
      intro: null,
      tips: null,
    };
  },
  mounted() {
    this.getTopics();
    // console.log(this.$vuetify.display.sm);
  },
  computed: {
    imageSrc() {
      const image_paths = [];
      this.topics.map((t) => {
        image_paths.push({
          section: t.title["fr"],
          path: new URL(t.image, import.meta.url).href,
        });
      });
      return image_paths;
    },
  },
  methods: {
    getTopics() {
      axios
        .get("/api/topics")
        .then((res) => {
          this.topics = res.data.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    goToSection(topic_id, topic_name) {
      this.$router.push({
        name: "section",
        params: {id: topic_id,},
        query:{
          topic_title: topic_name,
        }
      });
    },
  },
  watch: {
    "$i18n.locale": function () {
      console.log("in home this.$i18n.locale = ", this.$i18n.locale);
      this.$forceUpdate();
    },
  },
};
</script>
