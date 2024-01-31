<template>
    <div v-if="loading" class="fixed inset-0 flex items-center justify-center z-50">
        <div class="bg-black opacity-50 fixed inset-0"></div>
        <div class="relative p-4 bg-white rounded-lg shadow-lg">
        <div class="animate-spin rounded-full h-16 w-16 border-t-2 border-b-2 border-[#9378FF]"></div>
        </div>
    </div>
</template>

<script setup>
import { useAppStore } from '@/stores/appStore';

const $appStore = useAppStore();

const loading = computed(() => $appStore.loading);


</script>