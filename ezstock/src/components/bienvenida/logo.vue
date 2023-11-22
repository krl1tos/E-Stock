<template>
    <v-card ID="contenedor" elevation="0">
        <div id="img">
            <h1><strong class="text-h1">E-stock</strong><div class="text-h2">Registra cada paso, observa tu avance.</div></h1>
        </div>
    </v-card>
</template>

<style scoped>
    #contenedor{
        display: flex;
        align-items: center;
        height: 100dvb;
        background-color: transparent;
    }
    #img{
        margin-left: 60px;
        margin-bottom: 100px;
        color: white;
    }
</style>

<script setup>
import { ref } from 'vue';
import { inject } from 'vue';

const colorFondo = inject('colorFondo')
const logo = ref("Estock normal.png")
</script>
