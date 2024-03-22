<template>
    <div>
        <h1>Add Book</h1>
        <form @submit.prevent="addBook">
            <div class="mb-3">
                <label for="title" class="form-label">Book Title</label>
                <input type="text" v-model="title" class="form-control" id="title">
            </div>
            <div class="mb-3">
                <label for="author_id" class="form-label">Author</label>
                <select class="form-select" v-model="author_id">
                    <option v-for="author in authors" :value="author.id">{{ author.name }}</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

const title = ref("");
const author_id = ref("");
const authors = ref([]);

const router = useRouter();

onMounted(() => {
    getAuthors();
})

const getAuthors = async () => {
    try{
        await axios.get(`${import.meta.env.VITE_BASE_URL}/api/auth/get-authors`)
        .then((response) => {
            console.log(response)
            authors.value = response.data.data;
        })
    }
    catch(err){
        console.log(err);
    }
}

const addBook = async () => {
    try{
        await axios.post(`${import.meta.env.VITE_BASE_URL}/api/auth/add-book`, {
            title: title.value,
            author_id: author_id.value
        })
        .then((response) => {
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
