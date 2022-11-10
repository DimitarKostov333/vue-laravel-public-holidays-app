<template>
    <div class="container">
        <div class="row">
            <div class="mb-5 mt-5 col-3">
                <input type="date" class="form-control" name="year" min="1990" max="2030" step="1" value="{{ new Date().getFullYear() }}"/>
            </div>
            <table class="table table-responsive col-12">
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
                            {{ post.name.text }}
                        </td>
                        <td class="whitespace-nowrap">
                            {{ post.holidayType }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
import { onMounted, ref } from 'vue';

export default {
    setup() {
        let dates = ref([]);

        onMounted(() => {
            // fetch api from laravel backend
            axios
                .get('public-holidays')
                .then((res) => {
                    dates.value = res.data.data;
                })
                .catch((error) => {
                    console.log(error.res.data);
                });
        });

        return {
            dates
        };
    },
};
</script>
