<template>
    <div class="container">
        <div class="col-12">
            <div class="mb-5 mt-5 col-3">
                <label>Select public holiday year</label>
                <input type="date"
                       class="form-control"
                       @change="selectDate(dateInput)"
                       v-model="dateInput"
                />
            </div>
            <Table :dates="dates"></Table>
        </div>
    </div>
</template>


<script setup>
import {ref, onMounted} from 'vue';
import axios from 'axios';
import Table from "@/components/Table.vue";

let dateInput = ref('');
const holidays = ref({});

// Compute the date input
const selectDate = (date) => {
    // Only get the year from input string
    let getYear = date.split("-");
    ajaxRequest(getYear[0]);
}

// Reusable ajax function for getting api data
const ajaxRequest = (year = new Date().getFullYear()) => {
    axios
        .get('public-holidays', {
            params:{'year': year}
        })
        .then((response) => {
            // Update the holidays property with new data from the api
            holidays.value = response.data
        })
        .catch((error) => {
            // Log error
            console.log(error.response);
        });
}

onMounted(() => {
    // If holiday object is empty get current year holidays by default
    if(Object.keys(holidays.value).length === 0 &&
        holidays.value.constructor === Object)
    {
        ajaxRequest();
    }
})
</script>
