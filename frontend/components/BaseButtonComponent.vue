<script setup >
    const props = defineProps({
        text: {
            type: Object,
            required: true,
        },
        classes: {
            type: String,
            required: false
        }
    });
    const alert = useAlert();


    const emit = defineEmits(['click'])
</script>

<template>
    <button class="bg-[#9378FF] text-white  py-3 px-8 rounded-full " @click="emit('click')" :class="props.classes ? props.classes: ''">
         {{ props.text }}
    </button>

</template>