<template>
    <div v-if="errors.length" class="mb-3 p-2 bg-red-600 text-gray-100 rounded-sm text-sm text-center ">
        <div v-for="(err, index) in errors" :key="index">
            {{ err.message }}
        </div>
    </div>
</template>
<script>
export default {
    props: ['errors']
}
</script>
