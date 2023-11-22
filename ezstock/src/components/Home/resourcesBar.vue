<template>
    <v-card id="card" elevation="0" >
        <div id="movimientos">
            <v-menu location="end">
                <template v-slot:activator="{ props }">
                    <v-btn v-bind="props" variant="outlined" id="btnMovimientos" :color="colorDetalles" elevation="1" prepend-icon="fa-plus"> Nuevo Moviemiento</v-btn>
                  </template>
                  <v-list>
                    <v-list-item>
                        <ingreso/>
                    </v-list-item>
                    <v-list-item> 
                        <venta/>
                    </v-list-item>  
                    <v-list-item>
                        <descarte/>
                    </v-list-item>                      
                </v-list>
            </v-menu>
        </div>
        <resources id="resorces"/>
    </v-card>
</template>

<style scoped>
    #card {
        background-color: transparent;
        margin-top: 6px;
        border-radius: 0px;
        width: 300px;
        max-height:680px ;
        height: min-content;
    }
    #movimientos {
        padding-top: 15px;
        padding-bottom: 15px;
        padding-left: 30px;
    }
    #btnMovimientos{
        height: 50px;
        border-radius: 10px;
        width: 230px;
    }
    #resorces{
        background-color: v-bind(colorResorces);
        margin: 5px;
        border-radius: 15px;
        overflow-y: scroll;
}
</style>

<script setup>
    import resources from './resources.vue';
    import { inject } from 'vue';
    import ingreso from '@/components/Home/ConexionConBack/ingreso'
    import venta from '@/components/Home/ConexionConBack/venta'
    import descarte from '@/components/Home/ConexionConBack/descarte'

    const colorResorces = inject('colorResorces')
    const colorDetalles = inject('colorDetalles')
</script>