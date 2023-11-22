<template>
    <v-toolbar id="toolbar">
        <div id="img"></div>
        <!--<audio controls src="multimedia/audio_prueba.mp3" ></audio>-->
        <v-spacer/>
        <login></login>
    </v-toolbar>
</template> 

<style scoped>
#toolbar {
    position: fixed;
    z-index: 1;
}
#img{
    width:70px;
    height: 100%;
    background-image: url("src/assets/images/logo/logo-E-Blanco.png");
    background-position: center;
    background-size: contain;
    margin-left: 15px;
}
#img:hover{
    background-image: url("src/assets/images/logo/logo-E-Celeste.png");
    transition: 0.2s;
}
#img:active{
    transform: rotate(360deg);
    transition: 0.5s;
}

</style>

<script setup>
    import login from './login.vue';
    import { inject } from 'vue';

    const colorFondo = inject('colorFondo')
</script>