<template>
    <div class="row">
        <div class="col-12 mb-2 text-end">
            <router-link :to='{name:"Add"}' class="btn btn-primary">Create</router-link>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Books</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>title</th>
                                    <th>author</th>
                                    <th>Published Date</th>
                                    <th>Description</th>                            
                                </tr>
                            </thead>
                            <tbody v-if="books.length > 0">
                                <tr v-for="(book,key) in books" :key="key">
                                    <td>{{ book.title }}</td>
                                    <td>{{ book.author }}</td>
                                    <td>{{ book.published_date }}</td>
                                    <td>{{ book.description }}</td>
                                    <td>
                                        <router-link :to='{name:"Edit",params:{id:book.id}}' class="btn btn-success">Edit</router-link>
                                        <button type="button" @click="deleteBook(book.id)" class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="4" align="center">No Books Found.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <pagination align="center" :data="books" @pagination-change-page="list"></pagination>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"books",
    data(){
        return {
            books:[]
        }
    },
    mounted(){
        this.list()
    },
    methods:{
        async list(page =1){
            await this.axios.get(`/api/books?page=${page}`).then(response=>{
                this.books = response.data
            }).catch(error=>{
                console.log(error)
                this.books = []
            })
        },
        deleteBook(id){
            if(confirm("Are you sure to delete this book ?")){
                this.axios.delete(`/api/books/${id}`).then(response=>{
                    this.list()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>