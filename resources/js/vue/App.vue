<template>
    <section>
        <div class="container">
            <div class="heading">
                <h2 class="title">Todo List</h2>
            </div>
            <addform></addform>
            <todo></todo>
        </div>
    </section>
</template>

<script>

import Addform from './Addform.vue';
import Todo from './Todo.vue';

export default {
    components:{Addform,Todo}
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
