import Vue from 'vue'
import ApolloClient from "apollo-boost";
import VueApollo from "vue-apollo";

Vue.use(VueApollo)

const apolloClient = new ApolloClient({
    uri: 'http://127.0.0.1:8000/graphql',
    headers:{
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    },
    credentials: 'include',
    onError: (err) => console.log('Global Error Handler!')
})

export default new VueApollo({
    defaultClient: apolloClient
})

// module.exports = apolloClient;
