<script setup>
</script>

<template>
    <HeaderComponent></HeaderComponent>
    <BannerComponent></BannerComponent>
    <UserAvatar classes="mx-auto relative -mt-56 md:-mt-40"></UserAvatar>
    <div class="flex flex-col items-center justify-center mt-20 md:mt-10 flex-wrap gap-10">
       <div class="flex flex-col gap-10">
        <div class="flex flex-col md:flex-row gap-10">
            <div>
            <h2 class="font-semibold text-xl">Addres</h2>
            <p class="text-gray-500">717 S 34th St Mattoon, IL 61938</p>
        </div>
        <div>
            <h2 class="font-semibold text-xl">Email</h2>
            <p class="text-gray-500">ryan@rowandtable.com</p>
        </div>
        </div>
        <div >
            <h2 class="font-semibold text-xl">Phone</h2>
            <p class="text-gray-500">61938</p>
        </div>
       </div>
    </div>
</template>
