<template>
  <v-container fluid v-if="$route.name == 'home'">
    <v-row justify="center">
      <v-col cols="auto">
        <v-card
          rounded="xl"
          height="250"
          class="pa-2"
          variant="outlined"
          style="width: 320px; border: solid 0.3em; border-color: #52362a"
        >
          <v-container>
            <v-row class="text">
              {{ intro }}
            </v-row>
          </v-container>
        </v-card>
      </v-col>
      <v-col cols="auto">
        <v-card
          rounded="xl"
          height="250"
          class="pa-2"
          variant="outlined"
          style="width: 320px; border: solid 0.3em; border-color: #52362a"
        >
          <v-container>
            <v-row class="text">
              {{ tips }}
            </v-row>
          </v-container>
        </v-card>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="3" v-for="(topic, index) in topics" :key="index">
        <v-card color="#392820" elevation="5" rounded="lg" height="350">
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
                <v-btn @click="goToSection(topic)" width="130" color="#4e382f">
                  <v-icon light> mdi-eye-outline </v-icon>
                </v-btn>
              </v-col>
            </v-row>
          </v-container>
        </v-card>
      </v-col>
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

    this.intro =
      this.curr_language === "fr"
        ? presentation.fr.introduction
        : presentation.en.introduction;

    this.tips =
      this.curr_language === "fr" ? presentation.fr.tips : presentation.en.tips;
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
    curr_language() {
      console.log("in home curr_language = ", this.curr_language);
      this.$forceUpdate();
    },
  },
};
</script>
