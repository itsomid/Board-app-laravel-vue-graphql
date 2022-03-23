<template>
    <CardEditor v-model="title" @closed="closeEditor" @saved="addCard" label="Add Card"></CardEditor>
</template>

<script>
import CardAdd from "../graphql/CardAdd.gql";
import CardEditor from "./CardEditor";
import {EVENT_CARD_ADDED} from "../constants";

export default {
    components: {CardEditor},
    props: {
        list: Object
    },
    data() {
        return {
            title: null
        }
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

