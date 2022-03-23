<template>
    <div>
       <textarea
           class="rounded-md py-1 px-2 outline-none w-full text-gray-900 text-sm bg-white h-16 resize-none"
           placeholder="Enter a title for this card..."
           ref="card"
           @keyup.esc="closed"
           @keyup.enter="saved"
           :value="modelValue"
           @input="$emit('input',$event.target.value)"
       ></textarea>
        <div class="flex">
            <button class="rounded-sm py-1 px-3 bg-indigo-700 text-white hover:bg-indigo-600 cursor-pointer mr-1"
                    @click="saved">Save Card
            </button>
            <button class="rounded-sm py-1 px-3 hover:bg-gray-400 text-gray-500  cursor-pointer" @click="closed">
                Cancel
            </button>
        </div>
    </div>
</template>

<script>

export default {
    props: ['modelValue'],
    mounted() {
        this.$refs.card.focus()
    },
    methods: {
        closed() {
            this.$emit('closed')
        },
        saved() {
            this.$emit('saved')
        }
    }
}
</script>

