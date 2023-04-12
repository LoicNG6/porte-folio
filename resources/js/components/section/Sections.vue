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
    <v-row justify="start">
      <v-col cols="auto">
        <v-card
          class="card-bg"
          height="400"
          width="500"
          rounded="md"
          elevation="5"
        >
          <img style="height: 50%; width: 50%" src="images/me/2001.jpg" />
          <img style="height: 50%; width: 50%" src="images/me/java_code.png" />
          <img style="height: 50%; width: 50%" src="images/me/lecture.jpg" />
          <img style="height: 50%; width: 50%" src="images/me/travel.jpeg" />
        </v-card>
      </v-col>
      <v-col cols="2">
        <v-list class="pa-0" bg-color="transparent">
          <v-list-item
            v-for="information in sections_information"
            :key="information.title"
            style="border-left: solid 0.01em #ffffff85"
            min-height="40px"
          >
            {{ information.title }} : {{ information.value }}
          </v-list-item>
        </v-list>
      </v-col>
    </v-row>

    <v-row justify="center" >
      <v-col cols="7">
        <div style="text-align: justify">
          Section description (to delete after) Passé par le collège Paul Eluard
          à Nanterre (ville du département des Hauts-de-Seine), je découvre
          assez rapidement mon appétence pour les mathématiques. J’en ai fait
          par la suite une priorité dans mon parcours scolaire. En parallèle
          avec les cours, ma passion prenait une place importante dans ma jeune
          vie d’adolescent. Elle régulait et rythmait mes journées, mon emploi
          du temps ainsi que mes centres d’intérêts. Malheureusement, tout le
          monde n’a pas la chance d’en faire son “gagne-pain”, qui-plus-est
          lorsqu’il s’agit du football, en région parisienne. Ayant rapidement
          pris conscience de cette situation, j’ai décidé de concentrer
          l’entièreté de mon temps à mes études. Ajouté à cela, mon
          organisation, ma volonté d’atteindre mes objectifs ainsi que mon
          audace, j’ai aujourd’hui l’ambition d’être à la tête d’une direction
          de service de système d’information au sein ma propre structure.
        </div>
      </v-col>
      <v-col cols="5" style="text-align: justify">
        <div>
          Comme précisé en page d’accueil, je vous détaillerai mon parcours. Ça
          risque peut-être d’être long mais j’espère que ça vous plaira, alors
          avant de commencer madame, monsieur, je vous souhaite une belle
          expérience ! ✌🏿
        </div>
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