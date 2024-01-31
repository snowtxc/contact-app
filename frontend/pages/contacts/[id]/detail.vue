<script setup>
definePageMeta({
  validate: async (route) => {
    if (!route.params) {
      return false;
    }
    if (!route.params.id) {
      return false;
    }
    const id = route.params.id;
    if(!new RegExp("^[0-9]*$").test(id)){
        return false;
    }
    return true;
  },
});
import { useContactStore } from "@/stores/contactStore";
const contactApi = useContactStore();
const id = useRoute().params.id;
const contact  = await contactApi.fetchById(id);

</script>

<template>
  <HeaderComponent class="flex justify-end items-end">
      <div class="px-2 pb-2">
        <NuxtLink :to="`/contacts/${id}/edit`">
          <BaseButtonComponent text="Edit"></BaseButtonComponent>
        </NuxtLink>
      </div>
    </HeaderComponent>
    <BannerComponent></BannerComponent>
    <div class="w-full" v-if="contact">
    <UserAvatar
      classes="mx-auto relative -mt-56 md:-mt-40"
      :urlImg="contact ? contact.profilePicture : ''"
    ></UserAvatar>
    <div
      class="flex flex-col items-center justify-center mt-20 md:mt-10 flex-wrap gap-10"
    >
      <div class="flex flex-col gap-10">
        <div class="flex flex-col md:flex-row gap-10">
          <div>
            <h2 class="font-semibold text-xl">Address</h2>
            <p class="text-gray-500">{{ contact.address }}</p>
          </div>
          <div>
            <h2 class="font-semibold text-xl">Email</h2>
            <p class="text-gray-500">{{ contact.email }}</p>
          </div>
        </div>
        <div>
          <h2 class="font-semibold text-xl">Phone</h2>
          <p class="text-gray-500">{{ contact.phone }}</p>
        </div>
      </div>
    </div>
  </div>

  
</template>
