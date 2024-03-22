<template>
    <div>
        <h1>Add Author</h1>
        <form @submit.prevent="addAuthor">
            <div class="mb-3">
                <label for="name" class="form-label">Author Name</label>
                <input type="text" v-model="name" class="form-control" id="name">
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
</template>

<script setup>
import { ref } from  "vue";
import axios from "axios";
import { useRouter } from "vue-router";


const name = ref('');
const router = useRouter();

const addAuthor = async () => {
    try{
        await axios.post(`${import.meta.env.VITE_BASE_URL}/api/auth/add-author`, {
            name: name.value
        })
        .then((resposne) => {
             console.log(resposne.data);
             router.push('/home')
        })
    }
    catch(err){
        console.log(err);
    }
}

</script>

<style scoped>
</style>
