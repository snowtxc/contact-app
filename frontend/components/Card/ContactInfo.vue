<script setup>
    const router = useRouter();
    const { contactInfo } = defineProps({
        contactInfo : { type: Object, required: true}
    });
    const utils = useUtils();

    const description = computed(()=>{
        return utils.shortText("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s",30);
    })
    
</script>

<template>
    
    <div class="w-full  bg-white rounded-lg flex items-center gap-2 md:max-w-[326px] sm:w-full p-5">
        <UserAvatar   :urlImg="contactInfo.profilePicture" classes="w-16 h-16 md:w-20 md:h-20 flex-none border-none" imgClasses="w-16 h-16 md:h-20 md:w-20"></UserAvatar>
        
        <div class="flex flex-col ">
            <span class="text-black">{{ contactInfo.name }}</span>
            <p class="text-[#99879D]">{{ description }}</p>
        </div>
        <div>
            <NuxtLink :to="`/contacts/${contactInfo.id}/detail`">
                <Icon name="material-symbols:arrow-forward-ios-rounded" color="black" class="hover:cursor-pointer" />
            </NuxtLink>


        </div>
    </div>
</template>