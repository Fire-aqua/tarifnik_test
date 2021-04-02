<template>
  <div>
    <v-list
      dense
      rounded
    >
      <v-icon>mdi-format-list-bulleted</v-icon>
      <v-list-item
        v-for="item in items"
        :key="item.title"
        link
      >
        <v-list-item-content>
          <router-link :to="item.link">
            <v-list-item-title>
              {{ item.title }}
            </v-list-item-title>
          </router-link>
        </v-list-item-content>
      </v-list-item>
    </v-list>        
  </div>
</template>

<script lang="ts">
import Vue from 'vue'
export default Vue.extend({
  data () {
      return {
        items: [
          { title: 'Проверка адреса', link: '/' },
          { title: 'Набранные адреса', link: '/addresses' }
        ],
      }
    },
})
</script>