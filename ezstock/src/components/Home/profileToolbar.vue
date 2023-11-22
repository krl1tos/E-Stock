<template>
    <v-icon  class="toolbarIcon" icon="fa-solid fa-user" color="blue"/>
    <div class="d-flex justify-space-around">
        <v-menu>
            <template v-slot:activator="{ props }">
                <v-btn
                class="toolbarIcon"
                :color="colorIcons"
                v-bind="props"
                icon="fa-solid fa-bars"
                />
            </template>
            <v-list id="menu">
                <v-list-item
                class="text-h1"
                v-for="opciones in opciones" :key="opciones"
                :title="opciones.title"
                :value="opciones.value"
                />
                <v-divider></v-divider>
                <p class="text-caption text-center">Politica de Privacidad y <br> Condiciones de Uso</p>
            </v-list>
        </v-menu>
    </div>

</template>

<style scoped>
.toolbarIcon {
    margin-right: 8px;
    color: v-bind(colorIcons);
 }
#menu {
    width: 230px;
    padding-bottom: 0px;
}
</style>

<script setup>
    import { inject } from 'vue';
    
    const opciones = [
        {title:"Cerrar Sesión", value:''},
        {title:"Sobre Nosotros", value:''},
        {title:"Soporte De Usuario", value:''},
    ]

    const colorIcons = inject('colorIcons')
</script>