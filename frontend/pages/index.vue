<script setup>

definePageMeta({
  middleware: "auth",
});
const contactStore = useContactStore();
const contacts = await contactStore.fetchAll();
const inputSearch = ref("");

const contactsList = computed(() => {
  return contacts.filter((contact) => {
    if (inputSearch.value.trim().length > 0) {
      if (
        contact.name.toLowerCase().includes(inputSearch.value.toLowerCase()) ||
        contact.email.toLowerCase().includes(inputSearch.value.toLowerCase())
      ) {
        return true;
      }
      return false;
    }

    return true;
  });
});
</script>

<template>
  <HeaderComponent>
    <div class="flex w-full h-full justify-end items-center">
          <div class="flex justify-end">
            <BaseLogoutButton></BaseLogoutButton>
          </div>
        </div>
  </HeaderComponent>
  <div class="w-full bg-gray-100 min-h-screen px-8">
    <div class="w-full">
      <h1 class="text-4xl font-black py-8">Contacts</h1>
      <div class="relative">
        <div
          class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none"
        >
          <svg
            class="w-4 h-4 text-gray-500 dark:text-gray-400"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 20 20"
          >
            <path
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"
            />
          </svg>
        </div>
        <input
          type="search"
          id="default-search"
          class="block w-full p-4 ps-10 text-sm border outline-none"
          required
          v-model="inputSearch"
        />
      </div>
    </div>

    <div
      class="w-full flex flex-wrap justify-between mt-5 gap-3 md:px-16 sm:px-8"
      v-if="contactsList.length >= 0"
    >
      <CardContactInfo
        v-for="contact in contactsList"
        :key="contact.id"
        :contactInfo="contact"
      ></CardContactInfo>
    </div>
    <NotFoundComponent
      v-if="contactsList.length <= 0"
    ></NotFoundComponent>
  </div>
</template>
