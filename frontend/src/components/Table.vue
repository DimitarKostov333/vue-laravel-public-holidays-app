<template>
    <table class="table table-striped table-responsive">
        <thead>
            <tr>
                <th class="p-2 text-center" scope="col">Date</th>
                <th class="p-2 text-center" scope="col">Holiday Name</th>
                <th class="p-2 text-center" scope="col">Holiday Type</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200" id="table-body">
            <tr v-if="dates.length > 0" v-for="(date, key) in dates" :key="key">
                <td class="whitespace-nowrap p-2 text-center" >
                    {{ date.date.day }}-{{ date.date.month }}-{{ date.date.year }}
                </td>
                <td class="whitespace-nowrap p-2 text-center">
                    {{ date.name[0].text }}
                </td>
                <td class="whitespace-nowrap p-2 text-center">
                    {{ date.holidayType }}
                </td>
            </tr>
            <tr v-else>
                <td class="p-2 text-center" colspan="3">Data pending...</td>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    name: "Table",
    props: {
        dates: {type: Array}
    }
}
</script>

<style scoped>
thead > tr > th{
    background-color: deepskyblue;
    color: white;
}
</style>

