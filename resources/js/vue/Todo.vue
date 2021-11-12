<template>
    <div class="todolist">
        <ul>
            <todo-item name="Be rich"></todo-item>
            <todo-item name="Be Actress"></todo-item>
            <todo-item name="Good Dancer"></todo-item>
        </ul>
    </div>
</template>
<script>
import TodoItem from './TodoItem.vue';
export default {
    components:{TodoItem}
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
