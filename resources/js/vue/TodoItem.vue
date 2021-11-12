<template>
        <li>
            <span>{{name}}</span>
            <div class="icons">
                <i @click="clickHandler(id)" class='bx bx-check'></i>
                <i @click="deleteHandler(id)" class='bx bxs-trash'></i>
            </div>
        </li>
</template>
<script>
export default {
    props:['name','clickHandler','deleteHandler','id']
}
</script>
<style scoped>
    li{
        display: flex;
        justify-content: space-between;
        width: 100% !important;
        background-color: #000;
        color: #fff;
        border-radius: 5px;
        margin: 10px 0;
    }
    li span{
        font-family: 'Poppins',sans-serif;
        font-size: 14px;
        margin: 20px;
    }
    li .icons{
        display: flex;
        margin: 20px;
    }
    li .icons i{
        font-size: 18px;
        cursor: pointer;
    }
    li .icons i:last-child{
        margin-left: 10px;
    }
</style>
