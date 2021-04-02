<template>
  <div>
    <v-data-table
    :headers="quaryAddressesHeaders"
    :items="quaryAddresses"
    :items-per-page="5"
    :sort-by="['region']"
    class="elevation-1"
  ></v-data-table>
  </div>
</template>

<script lang="ts">
import axios from "axios";
import { Component, Vue } from "vue-property-decorator";
import { QuaryAddress } from "@/types";

@Component
export default class Addresses extends Vue {
    quaryAddresses: QuaryAddress | null = []
    quaryAddressesHeaders = [
      {text: 'Регион', value: 'region'},
      {text: '', value: 'region_type_full'},
      {text: 'Совпадений', value: 'match'},
      {text: 'Город', value: 'city'},
      {text: '', value: 'city_type_full'},
      {text: 'Район', value: 'area'},
      {text: '', value: 'area_type_full'},
      {text: 'Округ', value: 'federal_district'},
      {text: 'Поселение', value: 'settlement'},
      {text: '', value: 'settlement_type_full'},
      {text: 'Улица', value: 'street'},
      {text: '', value: 'street_type_full'},
      {text: 'Дом', value: 'house'},
      {text: '', value: 'house_type_full'},
      {text: 'Почтовый индекс', value: 'postal_code'},
      {text: 'Широта', value: 'geo_lat'},
      {text: 'Долгота', value: 'geo_lon'},
    ]

  mounted() {
    this.getQuaryAddresses()
  }

  getQuaryAddresses() {
    axios
    .get('/get-addresses')
    .then((response) => {
      this.quaryAddresses = response.data
    })
  }
  
}
</script>
