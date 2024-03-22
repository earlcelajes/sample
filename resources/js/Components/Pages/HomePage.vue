<template>
    <div>
        <h1>List of Books</h1>
        <div class="d-flex gap-2">
            <button type="button" class="btn btn-primary" @click="goToAuthor">Add Author</button>
            <button type="button" class="btn btn-primary" @click="goToAddBook">Add Book</button>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="book in books" :key="book.id">
                    <th scope="row">{{ book.title }}</th>
                    <td>{{ book.author.name }}</td>
                    <td class="d-flex gap-2">
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal"
                            @click="setValues(book.id, book.title, book.author_id)"
                            >Update</button>
                        <button type="button" class="btn btn-danger" @click="deleteBook(book.id)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form @submit.prevent="updateBook">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Book Title</label>
                                    <input type="text" v-model="title" class="form-control" id="title">
                                </div>
                                <div class="mb-3">
                                    <label for="author_id" class="form-label">Author</label>
                                    <select class="form-select" v-model="author_id">
                                        <option v-for="author in authors" :value="author.id" :selected="author.id === author_id">{{ author.name }}</option>
                                    </select>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { useRouter } from "vue-router";
import axios from "axios";

const b_id = ref(null);
const title = ref('');
const author_id = ref(null);
const books = ref([]);
const authors = ref([]);
const router = useRouter();

onMounted(() => {
    getBooks();
    getAuthors();
});

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

const getBooks = async () => {
    try {
        await axios.get(`${import.meta.env.VITE_BASE_URL}/api/auth/get-books`)
            .then((response) => {
                console.log(response.data)
                books.value = response.data.data
            })
    }
    catch (err) {
        console.log(err);
    }
}

const deleteBook = async (id) => {
    try {
        await axios.delete(`${import.meta.env.VITE_BASE_URL}/api/auth/delete-book/${id}`)
            .then((response) => {
                getBooks();
            })
    }
    catch (err) {
        console.log(err);
    }
}

const updateBook = async () => {
    try {
        await axios.put(`${import.meta.env.VITE_BASE_URL}/api/auth/update-book/${b_id.value}`, {
            title: title.value,
            author_id: author_id.value
        })
        .then((response) => {
            getBooks();
        })
    }
    catch (err) {
        console.log(err);
    }
}

const setValues = (book_id, book_title, book_author_id) => {
    b_id.value = book_id;
    title.value = book_title
    author_id.value = book_author_id;
}


const goToAuthor = () => {
    router.push('/add-author')
}

const goToAddBook = () => {
    router.push('/add-book')
}

</script>

<style scoped></style>
