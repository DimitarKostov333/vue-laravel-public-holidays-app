<template>
    <div class="mb-5 mt-5 col-3">
        <Datepicker v-model="date"></Datepicker>
    </div>
</template>

<script>
import { ref } from 'vue';
import Datepicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'

export default {
    components: { Datepicker },
    props: {
        date:{
            type: Date,
            default: "2022"
        }
    },
    setup() {
        const date = ref();

        return {
            date
        }
    }
};
</script>
