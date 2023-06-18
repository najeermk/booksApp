<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update Book</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="update">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" v-model="book.title">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>author</label>
                                    <input type="text" class="form-control" v-model="book.author">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>published_date</label>
                                    <input type="text" class="form-control" v-model="book.published_date">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" class="form-control" v-model="book.description">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"update-book",
    data(){
        return {
            book:{
                title:"",
                author:"",
                published_date:"",
                description:"",
                _method:"patch"
            }
        }
    },
    mounted(){
        this.showbook()
    },
    methods:{
        async showbook(){
            await this.axios.get(`/api/books/${this.$route.params.id}`).then(response=>{
                const { title, author, published_date, description } = response.data
                this.book.title = title
                this.book.author = author
                this.book.published_date = published_date
                this.book.description = description
            }).catch(error=>{
                console.log(error)
            })
        },
        async update(){
            await this.axios.put(`/api/books/${this.$route.params.id}`,this.book).then(response=>{
                this.$router.push({title:"List"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>