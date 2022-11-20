<template>
    <div class="container">
        <div class="col-12">
            <div class="row">
                <div class="mb-4 mt-4 col-3">
                    <label>Select public holiday</label>
                    <input type="date"
                           class="form-control"
                           @change="selectDateCountry(dateInput)"
                           v-model="dateInput"/>
                </div>
                <div class="mb-4 mt-4 col-3">
                    <label>Select country</label>
                    <select class="form-control" @change="selectDateCountry(dateInput, countryInput)" v-model="countryInput">
                        <option v-for="allCountries in allCountries"
                                :value="allCountries.cca3"
                                :key="allCountries.cca3">
                            {{ allCountries.name.common }}
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-12">
            <Table :dates="holidays"></Table>
        </div>
    </div>
</template>


<script setup>
import {ref, onMounted} from 'vue';
import axios from 'axios';
import Table from "@/components/Table.vue";

let dateInput = ref('');
let countryInput = ref('');
const holidays = ref([]);
const allCountries = ref({});

// Compute the date input
const selectDateCountry = (date, country = 'ZAF') => {
    // Only get the year from input string
    ajaxRequest(date.split("-")[0], country);
}

// Reusable ajax function for getting api data
const ajaxRequest = (year = new Date().getFullYear(), country = 'ZAF') => {
    axios
        .get('public-holidays', {
            params: {'year': year, 'country': country}
        }).then((response) => {
            // Update the holidays property with new data from the api
            holidays.value = response.data;
        })
}

const getAllCountries = () => {
    axios
        .get('all-countries').then((response) => {
        allCountries.value = response.data;
    })
}

onMounted(() => {
    // Get default data set
    getAllCountries();
    ajaxRequest();
})
</script>
