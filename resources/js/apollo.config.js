import ApolloClient from "apollo-boost";
import Vue from 'vue'
import VueApollo from "vue-apollo";

Vue.use(VueApollo)

const apolloClient = new ApolloClient({
    uri: 'http:127.0.0.1:8000'
})

export default VueApollo({
    defaultClient: apolloClient
})

// module.exports = apolloClient;
