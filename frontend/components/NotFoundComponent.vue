
import type { BaseButtonComponent } from '#build/components';


<script setup>

</script>

<template>
    <div class="flex flex-col justify-center items-center">
        <div class="p-5 rounded-full bg-[#FBEEFF] border-2 w-40 h-40 flex items-center justify-center relative">
            <div class="w-full h-1 bg-gray-500 absolute top-1/2 left-0 transform -translate-y-1/2 rotate-45"></div>
            <img src="~/assets/img/notfound.png" class="object-fit" />
         </div>
        <p class="font-bold text-lg mt-5">
            Add contacts to your database
        </p>
       <NuxtLink to="/create">
        <BaseButtonComponent text="Add new contacts" class="mt-5"></BaseButtonComponent>

       </NuxtLink>
    </div>
      

</template>