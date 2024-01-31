<script setup>
    const router = useRouter();
    const { contactInfo } = defineProps({
        contactInfo : { type: Object, required: true}
    });

   
</script>

<template>
   
    <div class="w-full  bg-white rounded-lg flex gap-2 md:max-w-[326px] sm:w-full p-5">
        <img class="w-20 h-20 rounded-full object-cover" :src="contactInfo.profilePicture" alt="Large avatar">
        <div class="flex flex-col ">
            <span class="text-black">{{ contactInfo.name }}</span>
            <p class="text-[#99879D]">Lorem Ipsum is simply dummy text of the printing and typesetting</p>
        </div>
        <div>
            <NuxtLink :to="`/contacts/${contactInfo.id}/detail`">
                <Icon name="material-symbols:arrow-forward-ios-rounded" color="black" class="hover:cursor-pointer" />
            </NuxtLink>


        </div>
    </div>
</template>