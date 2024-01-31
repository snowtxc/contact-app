<script setup>
    import { Action } from "@/helpers/enums/ActionEnum";
</script>

<template>
    <FormContact :action="Action.CREATE"></FormContact>
</template>