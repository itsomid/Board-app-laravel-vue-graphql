<template>
    <div class="bg-white sm:bg-gray-100 h-full flex justify-center">
        <div class="w-300p sm:w-400p mt-2 sm:mt-10 flex flex-col items-center">
            <div class="text-3xl text-blue-700 font-bold mb-10">

                <span>Laravello</span>
            </div>
            <div class="w-full sm:shadow-xl sm:bg-white sm:py-8 sm:px-12">
                <div v-if="errors.length" class="mb-3 p-2 bg-red-600 text-gray-100 rounded-sm text-sm text-center ">
                    <div v-for="(err, index) in errors" :key="index">
                        {{err.message}}
                    </div>
                </div>
                <div class="w-full text-center text-gray-600 font-bold mb-8">Signup for your account</div>
                <form @submit.prevent="register">
                    <div class="w-full mb-4">
                        <input type="text"
                               placeholder="Enter email"
                               class="rounded-sm px-4 py-2 outline-none focus:outline-none border-gray-400 bg-gray-100 border-solid border-2 w-full text-sm"
                               v-model="email"
                        >
                    </div>
                    <div class="w-full mb-4">
                        <input type="text"
                               placeholder="Enter full name"
                               class="rounded-sm px-4 py-2 outline-none focus:outline-none border-gray-400 bg-gray-100 border-solid border-2 w-full text-sm"
                               v-model="name"
                        >
                    </div>
                    <div class="w-full mb-4">
                        <input type="password"
                               placeholder="Enter password"
                               class="rounded-sm px-4 py-2 outline-none focus:outline-none border-gray-400 bg-gray-100 border-solid border-2 w-full text-sm"
                               v-model="password"
                        >
                    </div>
                    <div class="w-full mb-6">
                        <button type="submit"
                                class="rounded-md px-4 py-2 text-sm bg-green-500 font-bold outline-none focus:outline-none hover:opacity-75 w-full text-white disabled:opacity-25">
                            Signup
                        </button>
                    </div>
                </form>
                <div class="bg-gray-400 h-px w-full mb-6"></div>
                <div class="text-center text-sm">
                    <router-link :to="{name: 'login'}" class="text-blue-600 hover:underline">Already have an account? Log In</router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Register from './graphql/register.gql'
import {gqlErrors} from "./utils";
export default {
    name: "Register",
    data(){
        return{
            email: null,
            password: null,
            name: null,
            errors: []
        }
    },
    methods:{
       async register(){
            // console.log('register BUTTON Cliiicked!!!')
            try{
               await this.$apollo.mutate({
                    mutation: Register,
                    variables:{
                        email: this.email,
                        password: this.password,
                        name: this.name
                    }
                })
            }catch (err){
                console.log(gqlErrors(err))
                this.errors = gqlErrors(err)
            }

        }
    }

}
</script>

<style scoped>

</style>
