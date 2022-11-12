<template>
    <div class="container">
        <div class="col-12">
            <div class="mb-5 mt-5 col-3">
                <label>Select public holiday year</label>
                <input type="date"
                       class="form-control"
                       @change="selectDate(date)"
                       v-model="date"
                />
            </div>
            <table class="table table-striped table-dark table-responsive ">
                <thead>
                    <tr>
                        <th scope="col">
                            Date
                        </th>
                        <th scope="col">
                            Holiday Name
                        </th>
                        <th scope="col">
                            Holiday Type
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200" id="table-body">
                    <tr v-for="date in dates" :key="date.date.day">
                        <td class="whitespace-nowrap" >
                            {{ date.date.day }}-{{ date.date.month }}-{{ date.date.year }}
                        </td>
                        <td class="whitespace-nowrap">
                            {{ date.name[0].text }}
                        </td>
                        <td class="whitespace-nowrap">
                            {{ date.holidayType }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script setup>
import {ref, onMounted} from 'vue';
import axios from 'axios';

// Set empty reactive property for date input
let date = ref('');

// Set reactive property for dates collection
const dates = ref({});

// Create select date function
const selectDate = (date) => {
    // Only get the year from input
    let getYear = date.split("-");

    // fetch data from laravel api
    axios
        .get('public-holidays',{params:{'year':getYear[0]}})
        .then((response) => {
            // Update the dates property with new data received from the api
            dates.value = response.data
        })
        .catch((error) => {
            // Log error
            console.log(error.response);
        });
}

onMounted(() => {
    // If dates object is empty set default value from api
    if(Object.keys(dates.value).length === 0
        && dates.value.constructor === Object){
        axios
            .get('public-holidays')
            .then((response) => {
                // Update the dates property with new data received from the api
                dates.value = response.data
            })
            .catch((error) => {
                // Log error
                console.log(error.response);
            });
    }
})
</script>
