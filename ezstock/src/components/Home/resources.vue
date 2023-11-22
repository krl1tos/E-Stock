<template>
    <v-card id="card" elevation="0">
        <v-list density="dense" class="list" :color="colorDetalles" > 
            <v-list-item title="Tu Almacén" value="tablaProductos" class="resorcesBtn" @click="guardarTablaActual('tablaProductos')"/>                  
            
            <v-list-group>
                <template v-slot:activator="{ props }">
                    <v-list-item
                    class="resorcesBtn"
                    v-bind="props"
                    title="Tus Movimientos"
                    />
                </template>
            
                <div>
                    <v-list-item class="resorcesBtn" title="Entrada" value="tablaEntrada" @click="guardarTablaActual('tablaEntrada')" />
                    <v-list-item class="resorcesBtn" title="Salida" value="tablaSalida" @click="guardarTablaActual('tablaSalida')"/>
                </div>
            </v-list-group>
            <v-divider style="margin-left:10px; margin-right: 10px;" />
        </v-list>
        <v-list class="list" :color="colorDetalles" density="dense" > 
            <v-list-item class="resorcesBtn" title="Mostrar Todos" value="Mostrar Todos" @click="guardarTipoActual('Mostrar Todos')"/>
            <div v-for="tipo in tiposExistentes" :key="tipo">
                <v-list-item class="resorcesBtn"
                :title="tipo.tipo"
                :value="tipo.tipo"
                @Click="guardarTipoActual(tipo.tipo)"
                />
            </div>
        </v-list>
    </v-card>
</template>

<style scoped>
::-webkit-scrollbar {
  width: 0px;
}
.list{
    color: v-bind(colorTexto);
    background-color: transparent;
    font-size: small;
}
.resorcesBtn {
    border-radius: 15px;
    margin: 5px;
    margin-top:0px;
}
</style>

<script setup>
    import { inject } from 'vue';

    
    const tipoActual = inject('tipoActual')
    const tablaActual = inject('tablaActual')
    const tiposExistentes = inject('tiposExistentes')
    const colorTexto = inject('colorTexto')
    const colorDetalles = inject('colorDetalles')
    const tipos = tiposExistentes

    const guardarTablaActual = (value) => {
        tablaActual.value = value
    }   
    const guardarTipoActual = (value) => {
        tipoActual.value = value
    }

    console.log(tiposExistentes)
</script>