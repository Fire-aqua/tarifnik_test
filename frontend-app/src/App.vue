<template>
  <v-app>    
    <v-navigation-drawer app
      expand-on-hover
      permanent
    >
      <nav-menu/>
    </v-navigation-drawer>
    <v-main>
      <v-container fluid>
        <copyright/>
        <router-view></router-view>
      </v-container>
    </v-main>
  </v-app>
</template>

<script lang="ts">
import Vue from 'vue';
import NavMenu from './components/NavMenu.vue';
import Copyright from './components/Copyright.vue'
import { Component } from 'vue-property-decorator';

@Component(
  {
    components: {
      NavMenu,
      Copyright
    }
  }
)
export default class App extends Vue {
  text: string | null = '0';
}
</script>

<style lang="scss">
@import "./styles/app.scss";
</style>
