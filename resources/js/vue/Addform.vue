<template>
    <div>
        <form class="form-inline" @submit.prevent="addTodo()">
            <input @click="vanishMessage()" v-model="todos.title" type="text" placeholder="Write title">
            <button type="submit">submit</button>
        </form>
        <div v-if="message.danger" class="alert alert-danger">{{message.danger}}</div>
        <div v-if="message.success" class="alert alert-success">{{message.success}}</div>
    </div>
</template>

<script>

import axios from 'axios';

export default {
    props:['getTodos'],
    data:function(){
        return {
            todos:{
                title:""
            },
            message:{
                success:"",
                danger:""
            }
        }
    },
    methods:{
        addTodo:function(){
            if(this.todos.title === ''){
                {this.message.danger = 'please add a title !!'}
                return;
            }
            axios.post('/api/todo/store',this.todos)
            .then(data => {
                this.message.success = data.data.message;
                this.todos.title = '';
                this.getTodos();
            })
            .catch(error => {this.message.danger = err.message});
        },
        vanishMessage:function(){
            this.message.success = '';
            this.message.danger = '';
        }
    }
}
</script>
<style scoped>

form{
    max-width:400px !important;
    display: flex;
    margin: 50px auto 30px auto;
}

input{
    padding: 10px 20px;
    border: 1px solid #111;
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
    width: 70%;
    outline: none;
    font-family: 'Nunito',sans-serif;
}

.alert{
    padding: 15px 20px;
    width: 360px;
    margin: auto;
    font-size: 14px;
    font-family: 'Poppins',sans-serif;
    border-radius: 5px;
    text-align: center;
}

.alert-danger{
    background:rgb(255, 176, 196);
    color: rgb(255, 27, 57);
}
.alert-success{
    background:rgb(160, 255, 242);
    color: rgb(0, 136, 95);
}

input::placeholder{
    font-family: 'Nunito',sans-serif;
    color: #111;
    font-weight: bold;
}

button{
    padding: 10px 20px;
    font-family: 'Poppins',sans-serif;
    background-color: #111;
    border: 2px solid #111;
    color: #fff;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
    width: 30%;
    outline: none;
    cursor: pointer;
}

</style>
