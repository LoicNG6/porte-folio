<template>
    <v-btn
        class="previous-secion"
        variant="outlined"
        rounded="circle"
        height="63"
        width="30"
        @click="changeSection('previous')"
        v-if="1 < id"
    >
        <v-icon class="btn-text" size="28"> mdi-arrow-left </v-icon>
    </v-btn>
    <v-container class="text">
        <v-row>
            <v-col cols="auto">
                <span style="font-size: 1.5em">{{
                    topic.title[$i18n.locale]
                }}</span>
            </v-col>
        </v-row>
        <v-row justify="start">
            <v-col cols="auto">
                <v-card
                    class="card-bg text"
                    height="400"
                    width="500"
                    rounded="md"
                    elevation="5"
                >
                    <template
                        v-for="(image_path, index) in topic.image"
                        :key="index"
                    >
                        <img
                            style="height: 50%; width: 50%"
                            :src="
                                './images/' + topic.title.en + '/' + image_path
                            "
                        />
                    </template>
                    <!-- <img
                        style="height: 50%; width: 50%"
                        src="./images/I. Me/2001.jpg"
                    />
                    <img
                        style="height: 50%; width: 50%"
                        src="public/images/I. Me/java_code.png"
                    />
                    <img
                        style="height: 50%; width: 50%"
                        src="public/images/I. Me/lecture.jpg"
                    />
                    <img
                        style="height: 50%; width: 50%"
                        src="public/images/I. Me/travel.jpeg"
                    /> -->
                </v-card>
            </v-col>
            <v-col cols="2">
                <v-list class="pa-0" bg-color="transparent">
                    <!-- <v-list-item
                        v-for="information in topic"
                        :key="information.title"
                        style="border-left: solid 0.01em #ffffff85"
                        min-height="30px"
                    >
                    
                    </v-list-item> -->
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
    </v-container>
    <v-btn
        class="next-section"
        variant="outlined"
        rounded="circle"
        height="63"
        width="30"
        @click="changeSection()"
        v-if="id < 4"
    >
        <v-icon class="btn-text" size="28"> mdi-arrow-right </v-icon>
    </v-btn>
</template>
<style scoped>
.previous-secion {
    border: none;
    position: absolute;
    top: 40%;
    left: 2%;
    float: left;
}
.next-section {
    border: none;
    position: absolute;
    top: 40%;
    float: right;
    right: 2%;
}
</style>
<script>
export default {
    props: {
        id: [Number, String],
    },
    data: () => {
        return {
            topic: {
                title: -1,
                image: [-1],
                started_at: -1,
                ended_at: -1,
            },
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
                    this.topic = res.data.topic;
                    this.topic.image = Object.values(this.topic.image);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        changeSection(direction) {
            if (1 < this.id < 4) {
                var new_topic_id =
                    direction == "previous"
                        ? parseInt(this.id) - 1
                        : parseInt(this.id) + 1;

                this.$router.push({
                    name: "section",
                    params: { id: new_topic_id },
                });
                setTimeout(() => {
                    document.location.reload();
                }, 30);
            }
        },
    },
};
</script>
