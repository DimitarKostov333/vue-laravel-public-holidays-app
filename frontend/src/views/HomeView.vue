<template>
    <div class="container">
        <div class="col-12">
            <DatePicker :getDates="getDate" ></DatePicker>
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
                <tbody class="divide-y divide-gray-200">
                    <tr v-for="date in dates" :key="date.name.text">
                        <td class="whitespace-nowrap">
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
<script>
import {onMounted, ref} from 'vue';
import axios from 'axios';
import DatePicker from "@/components/DatePicker.vue";

export default {
    components:{DatePicker},
    methods: {
        getDate(date) {
            let dates = ref([]);

            // Only get the year from input
            let getYear = date.split("-");

            // fetch api from laravel backend
            axios
                .get('public-holidays',{params:{'year':getYear[0]}})
                .then((response) => {
                    dates.value = response.data;
                    console.log(dates.value)
                })
                .catch((error) => {
                    console.log(error.response);
                });


            return {
                dates
            };
        }
    },
    setup(props) {
        let dates = ref([]);

        onMounted(() => {
            // fetch api from laravel backend
            axios
                .get('public-holidays')
                .then((res) => {
                    dates.value = res.data;
                })
                .catch((error) => {
                    console.log(error.res.data);
                });
        });

        return {
            dates
        };
    }
};
</script>
