<script setup>
    const router = useRouter()

</script>


<template>
    <button class="bg-transparent    font-semibold hover:text-white  rounded" @click="router.back()">
        <Icon name="material-symbols:arrow-back-rounded" /> Back
    </button>
</template>