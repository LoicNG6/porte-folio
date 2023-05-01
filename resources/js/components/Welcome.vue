<template>
    <v-main
        :style="$route.name == 'Loco' ? 'align-items: center' : ''"
        class="app bs"
    >
<<<<<<< HEAD
        <v-top-menu-sm-and-down
            v-if="$vuetify.display.smAndDown"
        ></v-top-menu-sm-and-down>
        <v-top-menu v-else></v-top-menu>
=======
        <v-top-menu
            v-if="!['Loco', 'admin'].includes($route.name)"
        ></v-top-menu>

>>>>>>> 0519ff3 (welcome responsive : done)
        <v-container v-if="$route.name == 'Loco'" class="text">
            <v-row justify="center" align-content="center">
                <v-col
                    align-self="center"
                    :cols="$vuetify.display.xs ? '12' : '7'"
                    class="title"
                >
                    <v-sheet
                        color="#fef0d8"
                        :height="$vuetify.display.smAndDown ? '50' : '70'"
                        rounded="xl"
                        :style="endTyping ? 'text-align:center' : ''"
                        style="
                            display: flex;
                            justify-content: center;
                            align-items: center;
                        "
                    >
                        <v-row
                            style="width: 80px"
                            justify="center"
                            align-content="center"
<<<<<<< HEAD
                            :class="$vuetify.display.xs ? 'px-2':'bs'"
=======
>>>>>>> 0519ff3 (welcome responsive : done)
                        >
                            <v-col
                                justify-center
                                align-self="center"
                                cols="auto"
                            >
                                <v-sheet
                                    v-if="!$vuetify.display.smAndDown"
                                    color="#48140b"
                                    height="15"
                                    width="15"
                                    rounded="circle"
                                >
                                </v-sheet>
                            </v-col>
                            <v-col
                                class="py-0"
<<<<<<< HEAD
                                :class="endTyping ? '' : ''"
                                align-self="center"
                                :cols="$vuetify.display.smAndDown ? '12' : '9'"
=======
                                :class="endTyping ? '' : 'pb-3'"
                                align-self="center"
                                :cols="$vuetify.display.smAndDown ? '12' : '10'"
>>>>>>> 0519ff3 (welcome responsive : done)
                                :style="
                                    $vuetify.display.xs
                                        ? 'font-size: 0.49em;'
                                        : $vuetify.display.sm
                                        ? 'font-size: 0.50em;'
<<<<<<< HEAD
                                        : 'font-size: 0.75em'
=======
                                        : 'font-size: 0.74em'
>>>>>>> 0519ff3 (welcome responsive : done)
                                "
                                justify-center
                            >
<<<<<<< HEAD
                                <span>
                                    {{ typeValue }}
                                </span>
                                <span
                                    style="border-left: solid 0.12em"
                                    v-show="setTypeStatus"
                                    class="blinking-cursor ml-1"
                                ></span>
=======
                                {{ typeValue }}
                                <span
                                    :style="
                                        $vuetify.display.smAndDown
                                            ? 'font-size: 1.4em;'
                                            : 'font-size: 1.4em'
                                    "
                                    v-show="setTypeStatus"
                                    class="blinking-cursor"
                                >
                                    |
                                </span>
>>>>>>> 0519ff3 (welcome responsive : done)
                            </v-col>
                            <v-col
                                justify-center
                                align-self="center"
                                cols="auto"
                            >
                                <v-sheet
                                    v-if="!$vuetify.display.smAndDown"
                                    color="#48140b"
                                    height="15"
                                    width="15"
                                    rounded="circle"
                                >
                                </v-sheet>
                            </v-col>
                        </v-row>
                    </v-sheet>
                </v-col>
<<<<<<< HEAD
                <v-col
                    :cols="$vuetify.display.xs ? 'auto' : '1'"
                    class="px-0 title"
                    align-self="center"
                >
=======
                <v-col cols="auto" class="px-0 title" align-self="center">
>>>>>>> 0519ff3 (welcome responsive : done)
                    <v-btn
                        class="mx-4 btn-hover"
                        :to="{ name: 'home' }"
                        icon
                        v-show="endTyping"
                        transition="slide-x-transition"
                    >
                        <v-icon size="x-large" color="48140b">
                            mdi-arrow-right
                        </v-icon>
                    </v-btn>
                </v-col>
            </v-row>
        </v-container>
<<<<<<< HEAD
        <v-container v-else></v-container>
        <!-- <router-view v-else /> -->
=======
        <router-view v-else />
>>>>>>> 0519ff3 (welcome responsive : done)
    </v-main>
</template>

<style scoped>
.blinking-cursor {
    -webkit-animation: 1.1s blink step-end infinite;
    color: #48140b;
}
@keyframes blink {
    from,
    to {
        color: transparent;
    }
    50% {
        color: #48140b;
    }
}
.btn-hover:hover {
    width: 53px;
    height: 53px;
    color: #fef0d8;
    background-color: #48140b;
}
.btn-hover {
    width: 50px;
    height: 50px;
    color: #48140b;
    background-color: #fef0d8;
}
</style>

<script>
import VTopMenu from "./tools/menu/VTopMenu.vue";
import i18n from "../i18n.js";
import VTopMenuSmAndDown from "./tools/menu/VTopMenuSmAndDown.vue";

export default {
    components: {
        VTopMenu,
        VTopMenuSmAndDown,
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
        if (!["Loco", "admin"].includes(this.$route.name)) {
            console.log("not in the welcome page");
            // localStorage.setItem("curr_language", this.$i18n.locale);
        } else {
            setTimeout(this.typeText, this.newTextDelay + 200);
            localStorage.setItem("curr_language", "en");
        }
    },
    methods: {
        typeText() {
            if (
                this.charIndex <
                this.displayTextArray[this.$i18n.locale][
                    this.displayTextArrayIndex
                ].length
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
