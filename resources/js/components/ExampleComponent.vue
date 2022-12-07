<template>
  <v-app>
    <v-container>
      <v-row style="border: solid">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">Example Component</div>
                <div class="card-body">I'm an example component.</div>
              </div>
            </div>
          </div>
        </div>
      </v-row>
    </v-container>
  </v-app>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
