<template>
    <div class="todolist">
        <ul v-for="todo in todos" :key="todo.title">
            <todo-item :deleteHandler="deleteTodo" :clickHandler="updateTodo" :id="todo.id" :name="todo.title"></todo-item>
        </ul>
    </div>
</template>
<script>
import TodoItem from './TodoItem.vue';
export default {
    components:{TodoItem},
    props:['todos','updateTodo','deleteTodo'],
    data:function(){
        return {
            todos:this.newTodos
        }
    }
}
</script>

<style scoped>

    .todolist{
        max-width: 400px;
        margin: 50px auto;
    }
    ul{
        padding: 0;
        width: 100%;
    }
</style>
