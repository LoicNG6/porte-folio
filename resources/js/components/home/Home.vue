<template>
  <v-container fluid v-if="$route.name == 'home'">
    <v-row justify="center">
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

    <v-row align-content="center" justify="center">
      <v-sheet class="mx-auto" max-width="970" color="#ffffff00">
        <v-slide-group
          style="color:white;"
          v-model="model"
          class="pa-4"
          prev-icon="mdi-arrow-left-bold"
          next-icon="mdi-arrow-right-bold"
          show-arrows
        >
          <v-slide-group-item v-for="(topic, index) in topics" :key="index">
            <v-card
              class="mx-4"
              width="250"
              color="#392820"
              elevation="8"
              rounded="lg"
              height="300"
            >
              <v-container>
                <v-row justify="center">
                  <v-col cols="auto">
                    {{ topic.img }}
                  </v-col>
                </v-row>
                <v-row justify="center">
                  <v-col cols="auto">
                    {{ topic.title }}
                  </v-col>
                </v-row>
                <v-row><v-divider dark></v-divider></v-row>
                <v-row justify="center">
                  <v-col cols="12">
                    {{ topic.description }}
                  </v-col>
                </v-row>
                <v-row justify="center">
                  <v-col cols="8" justify-center style="text-align: center">
                    <v-btn
                      @click="goToSection(topic)"
                      width="130"
                      color="#4e382f"
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
import presentation from "./presentation.js";
export default {
  inject: ["curr_language"],
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
    goToSection(topic) {
      this.$router.push({
        name: "section",
        params: {
          id: topic.id,
          topic_title: topic.title,
        },
      });
    },
  },
  watch: {
    "$i18n.locale": function () {
      console.log("in home curr_language = ", this.curr_language);
      this.$forceUpdate();
    },
  },
};
</script>
