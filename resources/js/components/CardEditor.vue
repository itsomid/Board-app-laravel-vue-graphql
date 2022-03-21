<template>
    <div>
       <textarea
           class="rounded-md py-1 px-2 outline-none w-full text-gray-900 text-sm bg-white h-16 resize-none"
           placeholder="Enter a title for this card..."
           ref="card"
           @keyup.esc="closeEditor"
           @keyup.enter="addCard"
           v-model="title"
       ></textarea>
        <div class="flex">
            <button class="rounded-sm py-1 px-3 bg-indigo-700 text-white hover:bg-indigo-600 cursor-pointer mr-1"
                    @click="addCard">Add Card
            </button>
            <button class="rounded-sm py-1 px-3 hover:bg-gray-400 text-gray-500  cursor-pointer" @click="closeEditor">
                Cancel
            </button>
        </div>
    </div>
</template>

<script>
import CardAdd from "../graphql/CardAdd.gql";

import {EVENT_CARD_ADDED} from "../constants";
export default {
    name: "CardEditor",
    props: {
        list: Object
    },
    data() {
        return {
            title: ''
        }
    },
    mounted() {
        this.$refs.card.focus()
        // console.log(this.list.id)
    },
    methods: {
        addCard() {
            this.$apollo.mutate({
                mutation: CardAdd,
                variables: {
                    title: this.title,
                    order: this.list.cards.length + 1,
                    listId: this.list.id
                },
                update: (store, {data: {cardAdd}}) => {

                    this.$emit("added", {store, data: cardAdd, type: EVENT_CARD_ADDED})

                    this.closeEditor()
                }
            })

        },
        closeEditor() {
            this.$emit('closeEditor')
        }
    }
}
</script>

<style scoped>

</style>
