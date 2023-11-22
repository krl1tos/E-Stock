<template>
    <v-toolbar
    color="transparent"
    >
        <img src="src\assets\images\logo\Estock0D47A1.png" id="image">

        <v-spacer></v-spacer>

        <profileToolbar/>

    </v-toolbar>
    

        
</template>

<style scoped> 

    #image {
        margin-left: 25px; 
        height: 58px;
    }
    .search:focus{
        background-color: white;
        transition: 0.2s;
        border-radius: 100px;
        box-shadow: 0px 0px 0px rgba(33, 149, 243, 0.408);        
        outline: none;
    }
    .search{
        transition: 0.2s ;
        background-color: rgb(231, 231, 231) ;
        width: 700px;
        height: 40px;
        font-size: 15px;
        border-radius: 100px;
        box-shadow: 0px 0px 0px black; 
        padding-left: 15px;  
    }
    #searchDiv {
        padding-left: 10px;
    }
</style>

<script setup>
    import profileToolbar from './profileToolbar.vue';

</script>