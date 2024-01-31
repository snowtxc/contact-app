<script setup>
import { toRef } from "vue";
import { useField } from "vee-validate";
const props = defineProps({
  name: {
    type: String,
    required: true,
  },
  type: { type: String, required: true },
  value: { type: String, required: true , default: ""},
  classes: { type: String, required: true },
  placeholder: { type: String, required: false },
});

const name = toRef(props,'name');

const {
  value: inputValue,
  errorMessage,
  handleBlur,
  handleChange,
  meta,
} = useField(name, undefined, {
  initialValue: props.value,
});


</script>

<template>
  <input
    :class="{ 'has-error': !!errorMessage, 'success': meta.valid }"
    :value="inputValue"
    :type="props.type"
    class="bg-[#FBEEFF] border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 outline-none"
    :placeholder="props.placeholder ? props.placeholder : ''"
    @input="handleChange"
    @blur="handleBlur"
  />

  <p class="text-red-600	" v-show="errorMessage || meta.valid">
      {{ errorMessage || successMessage }}
   </p>

</template>
