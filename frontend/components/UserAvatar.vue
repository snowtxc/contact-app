<script setup>
    import defaultImg from "~/assets/img/default-img.png"; 

    const props = defineProps({
         classes : { type: String, required: false},
         urlImg : { type: String ,required : false},
         imgClasses: { type: String, required: false} 
    })
</script>

<template>
    <div
        class="border-2 border-black rounded-full overflow-hidden"
        :class="props.classes ? props.classes : ''"
      >
      <img
        class="object-cover object-center"
        :class="props.imgClasses ? props.imgClasses : ''"
        :src="props.urlImg ? props.urlImg : defaultImg"
    />
      </div>
</template>