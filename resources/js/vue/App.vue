<template>
    <section>
        <div class="container">
            <div class="heading">
                <h2 class="title">Todo List</h2>
            </div>
            <addform :getTodos="getTodos"></addform>
            <todo :todos="todos" :updateTodo="updateTodo" :deleteTodo="deleteTodo"></todo>
        </div>
    </section>
</template>

<script>

import Addform from './Addform.vue';
import Todo from './Todo.vue';
import axios from 'axios';

export default {
    components:{Addform,Todo},
    data:function(){
        return {
            todos:[]
        }
    },
    methods:{
        getTodos:function(){
            axios.get('/api/todos')
            .then(data => {
                this.todos = [...data.data];
            })
            .catch(error => console.log(error));
        },
        updateTodo:function(id){
            axios.put(`/api/todo/${id}`)
            .then(data => this.todos = [...data.data])
            .catch(err => console.log(err))
        },
        deleteTodo:function(id){
            axios.delete(`/api/todo/${id}`)
            .then(data => this.todos = [...data.data])
            .catch(err => console.log(err))
        }
    },
    created:function(){
        this.getTodos();
    }
}
</script>
<style lang="css" scoped>

    .container{
        max-width: 1024px;
        margin: auto;
    }
    .heading{
        text-align: center;
        text-transform: uppercase;
        font-family: 'Nunito',sans-serif;
        margin-top: 50px;
    }

</style>
