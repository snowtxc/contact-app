<template >
  <FormContact :action="Action.EDIT" :defaultValues="contact"></FormContact>

</template>

<script lang="ts" setup>
import { useContactStore } from "@/stores/contactStore";
import { Action } from "~/helpers/enums/ActionEnum";
definePageMeta({
  middleware: "auth",
  validate: async (route) => {
    if (!route.params) {
      return false;
    }
    if (!route.params.id) {
      return false;
    }
    const id:string | string[] = route.params.id;
    if(typeof id !== 'string'){
      return false;
    }
    if(!new RegExp("^[0-9]*$").test(id)){
        return false;
    }
    return true;
  },
});

const contactStore = useContactStore();
const id = useRoute().params.id;
const contact  = await contactStore.fetchById(id);

</script>


