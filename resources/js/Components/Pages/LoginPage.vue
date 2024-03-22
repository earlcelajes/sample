<template>
    <div class="container">
        <h1 class="text-center">Login</h1>
        <form @submit.prevent="handleLogin">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" v-model="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" v-model="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div>
                <button type="submit" class="btn btn-primary" style="width:100%">Login</button>
            </div>
        </form>
    </div>
</template>

<script setup>
import axios from "axios";
import { ref } from "vue";
import { useRouter } from "vue-router";

const email = ref('');
const password = ref('');

const router = useRouter();

const handleLogin = async () => {
    try{
        await axios.post(`${import.meta.env.VITE_BASE_URL}/api/auth/login`, {
            email: email.value,
            password: password.value
        })
        .then((response) => {
            console.log(response)
            router.push('/home');
        })
    }
    catch(err){
        console.log(err);
    }
}

</script>

<style scoped>
.container{
    width:50rem
}
</style>
