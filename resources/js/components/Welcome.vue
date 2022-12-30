<template>
  <v-main
    :style="$route.name == 'Loco' ? 'align-items: center' : ''"
    class="app"
  >
    <v-top-menu v-if="!['Loco', 'admin'].includes($route.name)"></v-top-menu>
    <v-container v-if="$route.name == 'Loco'" class="text">
      <v-row justify="center" align-content="center">
        <v-col style="text-align: center" cols="auto" class="px-0 title">
          <span>
            {{ typeValue }}
          </span>
          <span v-show="setTypeStatus" class="blinking-cursor">|</span>
          <v-btn
            class="mx-4"
            variant="outlined"
            :to="{ name: 'home' }"
            icon
            color="white"
            v-show="endTyping"
            transition="slide-x-transition"
          >
            <v-icon size="x-large"> mdi-arrow-right </v-icon>
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
</style>

<script>
import VTopMenu from "./tools/VTopMenu.vue";
export default {
  components: {
    VTopMenu,
  },
  data: () => {
    return {
      typeValue: "",
      typeStatus: true,
      displayTextArray: ["Hi,", " I'm Loco,", " welcome to my page !"],
      typingSpeed: 120,
      newTextDelay: 1700,
      displayTextArrayIndex: 0,
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
  },
  methods: {
    typeText() {
      if (
        this.charIndex <
        this.displayTextArray[this.displayTextArrayIndex].length
      ) {
        this.typeValue += this.displayTextArray[
          this.displayTextArrayIndex
        ].charAt(this.charIndex);
        this.charIndex += 1;

        setTimeout(this.typeText, this.typingSpeed);
      } else {
        this.charIndex = 0;
        this.displayTextArrayIndex += 1;

        if (this.displayTextArray.join("").length == this.typeValue.length) {
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
  