<template>
    <div class="mb-5 mt-5 col-3">
        <input type="date"
               class="form-control"
               v-on:change="getDates(holidayInput)"
               v-model="holidayInput"/>
    </div>
</template>

<script>

import {ref, reactive, toRefs} from "vue";

export default {
    name: 'DatePicker',
    props: {
      getDates:{
          type:Function
      }
    },
    data(){
        return {
            holidayInput: ""
        }
    }
};
</script>
