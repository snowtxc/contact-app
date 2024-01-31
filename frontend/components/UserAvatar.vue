<script setup>
    import defaultImg from "~/assets/img/default-img.png";

    const props = defineProps({
         classes : { type: String, required: false},
         urlImg : { type: String ,required : false}
    })

    const utils = useUtils();
</script>

<template>
    <div
        class="w-28 h-28 md:w-44 md:h-44  border-2 border-black rounded-full overflow-hidden"
        :class="props.classes ? props.classes : ''"
      >
      <img
        class="object-cover object-center h-28 md:h-44"
        :src="props.urlImg ? props.urlImg : defaultImg"
        alt="Woman looking front"
    />
      </div>
</template>