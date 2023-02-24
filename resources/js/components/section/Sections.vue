<template>
    <v-container class="text">
        <v-row>
            <v-col cols="auto">
                <span style="font-size: 1.5em">{{ topic_name[$i18n.locale] }}</span>
            </v-col>
        </v-row>
        <v-row justify="start">
            <v-col cols="auto">
                <v-card
                    class="card-bg"
                    height="400"
                    width="500"
                    rounded="md"
                    elevation="5"
                >
                    <img
                        style="height: 50%; width: 50%"
                        src="images/me/2001.jpg"
                    />
                    <img
                        style="height: 50%; width: 50%"
                        src="images/me/java_code.png"
                    />
                    <img
                        style="height: 50%; width: 50%"
                        src="images/me/lecture.jpg"
                    />
                    <img
                        style="height: 50%; width: 50%"
                        src="images/me/travel.jpeg"
                    />
                </v-card>
            </v-col>
            <v-col cols="2">
                <v-list class="pa-0" bg-color="transparent">
                    <v-list-item
                        v-for="information in sections_information"
                        :key="information.title"
                        style="border-left: solid 0.01em #ffffff85"
                        min-height="30px"
                    >
                        {{ information.title[$i18n.locale] }} :
                        {{ information.value }}
                    </v-list-item>
                </v-list>
            </v-col>
        </v-row>
        <v-row justify="center">
            <v-col cols="6" style="text-align: justify">
                <span>Title</span>
                <span>Contain</span>
            </v-col>
            <v-col cols="6" style="text-align: justify">
                <div>What I learned</div>
            </v-col>
        </v-row>
        <v-row
            justify="space-between"
            align-content="end"
            class="my-8"
            style="height: 20%"
        >
            <v-col cols="auto"
                ><v-btn variant="outlined">previous section</v-btn></v-col
            >
            <v-col cols="auto"
                ><v-btn variant="outlined">next section</v-btn></v-col
            >
        </v-row>
    </v-container>
</template>
<script>
export default {
    props: {
        id: [Number, String],
    },
    data: () => {
        return {
            sections: null,
            topic_name: {},
            sections_information: [
                {
                    title: {
                        en: "Date",
                        fr: "Date",
                    },
                    value: null,
                },
                {
                    title: {
                        en: "Location",
                        fr: "Lieux",
                    },
                    value: null,
                },
                {
                    title: {
                        en: "Context",
                        fr: "Contexte",
                    },
                    value: null,
                },
                {
                    title: {
                        en: "Team",
                        fr: "Equipe",
                    },
                    value: null,
                },
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
                    this.topic_name = JSON.parse(res.data.topic_name[0].title);
                    this.sections = res.data.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
};
</script>
