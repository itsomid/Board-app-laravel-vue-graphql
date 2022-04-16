<template>
    <div>
        <div v-if="!edited"
             class="group bg-white shadow-card rounded-sm p-2 cursor-pointer text-sm hover:bg-gray-100 mb-2 flex justify-between">
            <div>{{ card.title }}</div>
            <div class="flex font-bold opacity-0 group-hover:opacity-100 transition-opacity ease-out duration-500">
                <div class="text-gray-400 pr-2 hover:text-yellow-600" @click="edited = true">E</div>
                <div class="text-gray-400 hover:text-red-700" @click="cardDelete">D</div>
            </div>
        </div>
        <cardEditor
            v-else
            v-model="cardTitle"
            class="mb-2"
            label="Save Card"
            @closed="edited = false"
            @saved="cardUpdate"
        ></cardEditor>
    </div>
</template>

<script>
import cardDelete from './../graphql/cardDelete.gql'
import cardUpdate from './../graphql/cardUpdate.gql'
import {EVENT_CARD_DELETED, EVENT_CARD_UPDATE} from "../constants";
import CardEditor from "./CardEditor";

export default {
    components: {CardEditor},
    props: {
        card: Object
    },
    data() {
        return {
            edited: false,
            cardTitle: this.card.title
        }
    },
    methods: {
        cardDelete() {
            this.$apollo.mutate({
                mutation: cardDelete,
                variables: {
                    id: this.card.id
                },
                update: (store, {data: {cardDelete}}) => {
                    this.$emit('deleted', {
                        store,
                        data: cardDelete,
                        type: EVENT_CARD_DELETED
                    })
                }
            })
        },
        cardUpdate() {

            this.$apollo.mutate({
                mutation: cardUpdate,
                variables: {
                    id: this.card.id,
                    title: this.cardTitle
                },
                update: (store, {data: {cardUpdate}}) => {
                    this.$emit('updated', {
                        store,
                        data: cardUpdate,
                        type: EVENT_CARD_UPDATE
                    })
                }

            })
            this.edited = false
        }

    }
}
</script>
