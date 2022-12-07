<template>
    <v-container>
        <v-dialog v-model="openDialog">

        </v-dialog>
    </v-container>
</template>
<script>
export default {
    name: "Subjects",
    props:{
        dialog: Boolean,
    },
    data: () => {
        return {
            openDialog: dialog,
        };
    },
}
</script>