<template>
  <div>
    <v-autocomplete
      v-model="result"
      :search-input.sync="search"
      :items="info"
      item-text="value"
      item-value="data"
      hide-no-data
    />

    <v-row justify="space-around">
      <v-btn class="my-3"
      :disabled="isFullAddress"
      @click="checkAddress"
      >Наличие адреса в базе</v-btn>

      <v-btn class="my-3"
      :disabled="isFullAddress"
      @click="addAddress"
      >Добавить адрес в базу (для тестирования)</v-btn>
    </v-row>

   <v-row justify="space-around">
      <v-card
      class="my-3"
      width="200"
      height="60"      
      >
        <v-col
        class="py-auto"
        >
          <h3>            
            <span class="green--text"
            v-if="resultMatch>0">
              Адрес найден
            </span>
            <span class="red--text"
            v-if="resultMatch==0">
              Адрес не найден
          </span>
          </h3>
        </v-col>
      </v-card>
    </v-row>
  </div>
</template>

<script lang="ts">
import { Component, Vue, Watch } from "vue-property-decorator";
import { Address, Suggestion } from "../types";
import axios from "axios";

@Component
export default class Home extends Vue {
  private token = "92486c8b633054b6895cd00c52e80efd6f6c7970";
  search = "";  
  info: Suggestion[] = [];
  result: Address | null = null;
  resultMatch: number | null = null;

  @Watch("search")
  async getAddress() {    
    await axios
      .get(
        "https://suggestions.dadata.ru/suggestions/api/4_1/rs/suggest/address",
        {
          params: {
            query: this.search,
          },
          headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
            Authorization: "Token " + this.token,
          },
        }
      )
      .then((response) => {        
        this.info = response.data.suggestions
      });
  }

  get isFullAddress() {
    if (this.result && this.result.house) {
      return false
    } else {
      return true
    }
  }

  async checkAddress() {
    this.resultMatch = null
    await axios
    .post('/valid-address',
      {
        ...this.result
      }
    )
    .then((response) => {
      this.resultMatch = response.data
    });
  } 

  async addAddress() {
    await axios
    .post('/add-address',
      {
        ...this.result
      }
    )
  } 
}
</script>
