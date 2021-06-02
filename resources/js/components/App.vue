<template>
   <v-app>
        <header style="margin: 0 auto">
            <div class="logo-container"><img :src="'/asset/chucknorris.png'" alt="logo-img" width="100px"></div>
        </header>
        <v-main>
            <router-view> </router-view>
        </v-main>
  </v-app>
</template>
 
<script>
    export default {};
</script>