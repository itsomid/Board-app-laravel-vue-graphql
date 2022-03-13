<template>
    <div>
       <textarea
           class="rounded-md py-1 px-2 outline-none w-full text-gray-900 text-sm bg-white h-16 resize-none"
           placeholder="Enter a title for this card..."
           ref="card"
           @keyup.esc="$emit('closeEditor')"
           @keyup.enter="$emit('closeEditor')"
       ></textarea>
    </div>
</template>

<script>
export default {
    name: "CardEditor",
    mounted() {
        this.$refs.card.focus()
    }
}
</script>

<style scoped>

</style>
