<template>
  <v-main
    :style="$route.name == 'Loco' ? 'align-items: center' : ''"
    class="app"
  >
    <v-top-menu v-if="!['Loco', 'admin'].includes($route.name)"></v-top-menu>
    <v-container v-if="$route.name == 'Loco'" class="text">
      <v-row justify="center" align-content="center">
        <v-col :cols="$i18n.locale == 'fr' ? 7 : 6" class="title">
          <v-card
            color="#320F08"
            height="73"
            rounded="xl"
            class="pt-3 px-2"
            style="width: 100%; color: #f0eaea"
          >
            <v-sheet
              color="#BF8125"
              style="position: relative; float: left; top: 28%"
              height="20"
              width="20"
              rounded="circle"
            >
            </v-sheet>
            <v-sheet
              color="#BF8125"
              style="position: relative; float: right; top: 28%"
              height="20"
              width="20"
              rounded="circle"
            >
            </v-sheet>
            <div
              style="margin: auto; width: 90%"
              :style="endTyping == true ? 'text-align:center' : ''"
            >
              <span>
                {{ typeValue }}
              </span>
              <span v-show="setTypeStatus" class="blinking-cursor">|</span>
            </div>
          </v-card>
        </v-col>
        <v-col cols="auto" class="px-0 title">
          <v-btn
            class="mx-4 mt-3 btn-hover"
            :to="{ name: 'home' }"
            icon
            color="#320F08"
            v-show="endTyping"
            transition="slide-x-transition"
          >
            <v-icon size="x-large" color="white"> mdi-arrow-right </v-icon>
          </v-btn>
        </v-col>
      </v-row>
    </v-container>
    <router-view v-else />
  </v-main>
</template>

<style scoped>
.blinking-cursor {
  -webkit-animation: 1s blink step-end infinite;
}
@keyframes blink {
  from,
  to {
    color: transparent;
  }
  50% {
    color: white;
  }
}

.btn-hover:hover {
  width: 50px;
  height: 50px;
}
</style>

<script>
import VTopMenu from "./tools/VTopMenu.vue";
import i18n from "../i18n.js";

export default {
  components: {
    VTopMenu,
  },
  data: () => {
    return {
      typeValue: "",
      typeStatus: true,
      language: null,
      displayTextArray: {
        fr: ["Salut, ", "je suis Loïc, ", "bienvenue sur ma page !"],
        en: ["Hi, ", "I am Loïc, ", "welcome to my page !"],
      },
      displayTextArrayIndex: 0,
      current_language: i18n.global.locale,
      typingSpeed: 120,
      newTextDelay: 1700,
      // language: $i18n.locale,

      charIndex: 0,
      endTyping: false,
    };
  },
  computed: {
    setTypeStatus: {
      get: function () {
        return this.typeStatus;
      },
      set: function (val) {
        this.typeStatus = false;
      },
    },
  },
  created() {
    setTimeout(this.typeText, this.newTextDelay + 200);
    console.log(this.displayTextArray[this.$i18n.locale][0]);
  },
  methods: {
    typeText() {
      if (
        this.charIndex <
        this.displayTextArray[this.$i18n.locale][this.displayTextArrayIndex]
          .length
      ) {
        this.typeValue += this.displayTextArray[this.$i18n.locale][
          this.displayTextArrayIndex
        ].charAt(this.charIndex);
        this.charIndex += 1;

        setTimeout(this.typeText, this.typingSpeed);
      } else {
        this.charIndex = 0;
        this.displayTextArrayIndex += 1;

        if (
          this.displayTextArray[this.$i18n.locale].join("").length ==
          this.typeValue.length
        ) {
          setTimeout(this.modifyEndTyping, 3000);
          return;
        }
        setTimeout(this.typeText, this.typingSpeed + 1000);
      }
    },
    modifyEndTyping() {
      this.endTyping = true;
      this.setTypeStatus = !this.endTyping;
    },
  },
};
</script>
  