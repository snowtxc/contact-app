<script setup>
   const { logout } = useAuthStore();
</script>

<template>
    <div class="flex w-full h-full justify-end items-center">
            <BaseButtonComponent icon="material-symbols:logout" class="mt-5" @click="logout"></BaseButtonComponent>
    </div>
</template>