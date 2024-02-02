<script lang="ts" setup>
    import { Action } from "@/helpers/enums/ActionEnum";
    definePageMeta({
        middleware: "auth",
    });

</script>

<template>
    <FormContact :action="Action.CREATE"></FormContact>
</template>