<template>
<v-card id="card1" elevation="0">
  <v-card id="card2" elevation="0" >
    <v-card elevation="0" id="card3" class="colorTexto">
      <v-card-title class="text-h5" v-if="tablaActual == 'tablaProductos'"> Tu Almacen</v-card-title>
      <v-card-title class="text-h5" v-if="tablaActual == 'tablaEntrada'"> Historial de ENTRADA al Almacen</v-card-title>  
      <v-card-title class="text-h5" v-if="tablaActual == 'tablaSalida'"> Historial de SALIDA al Almacen</v-card-title>  

      <v-card-subtitle class="text-subtitle-1" v-if="tipoActual == 'Mostrar Todos'">Mostrando todos los productos</v-card-subtitle>
      <v-card-subtitle class="text-subtitle-1" v-if="tipoActual != 'Mostrar Todos'">Mostrando unicamente {{ tipoActual }}</v-card-subtitle>
    </v-card>

    <!---------------------ESTA TABLA ES ESTO------------------>
    <v-table id="tabla" class="colorTexto" fixed-header="true">
      <thead>
        <tr > 
          <th> 
            Nombre </th>
          <th>
            Tipo </th>

          <th v-if="tablaActual == 'tablaSalida'" class="text-center">
            Motivo</th>
          <th class="text-center">
            Cantidad </th>
          <th v-if="tablaActual == 'tablaSalida' || tablaActual == 'tablaEntrada'" class="text-center">
            Fecha</th>
          <th class="text-center">
            IMG </th>
          <th v-if="tablaActual != 'tablaProductos'" class="text-center">
            
          </th>
        </tr>
      </thead>
      
      <!--       ESTA TABLA ES EL STOCK TOTAL (ALMACEN)-->
      <tbody v-if="tablaActual == 'tablaProductos'">
        <tr v-for="item in productos">
          <td v-if="( tipoActual == item.tipo || tipoActual == 'Mostrar Todos' )" >
            {{ item.nombre_producto }}
          </td>
          <td v-if="( tipoActual == item.tipo || tipoActual == 'Mostrar Todos' )">
            {{  item.tipo }}
          </td>
          <td v-if="(item.cantidad != 0) && ( tipoActual == item.tipo || tipoActual == 'Mostrar Todos' )" class="text-center">
            <p v-if="item.cantidad < 0 " class="text-red"> {{ item.cantidad }}</p>
            <p v-if="item.cantidad > 0">{{ item.cantidad }}</p>
          </td>
          <td v-if="( tipoActual == item.tipo || tipoActual == 'Mostrar Todos' )" class="text-center">
            <v-dialog width="500">
              <template v-slot:activator="{ props }">
                <v-img
                v-bind="props"
                height='50'
                id="img"
                :src="item.rutaIMG"
                />
              </template>
              <template v-slot:default="{ isActive }">
                <v-card style="border-radius: 15px;">
                  <v-img :src="item.rutaIMG" height="400"/>
                </v-card>
              </template>
            </v-dialog>
          </td>
        </tr>
      </tbody>

      <!--      ESTA TABLA ES DE ENTRADA/SALIDA (HISTORIAL DE MOVIMIENTOS)-->
      <tbody v-if=" tablaActual != 'tablaProductos'" >
        <tr
        v-for="item in movimientos"
        :key="item.name">

          <!--      NOMBRE-->
          <td v-if="((tablaActual == 'tablaSalida' && item.tipo_mov != 'Entrada') || ( tablaActual == 'tablaEntrada' && item.tipo_mov == 'Entrada')) && ( tipoActual == item.tipo_producto || tipoActual == 'Mostrar Todos' )">
            {{ item.nombre_producto }}
          </td>

          <!--      TIPO PRODUCTO-->
          <td v-if="((tablaActual == 'tablaSalida' && item.tipo_mov != 'Entrada') || ( tablaActual == 'tablaEntrada' && item.tipo_mov == 'Entrada')) && ( tipoActual == item.tipo_producto || tipoActual == 'Mostrar Todos' )">
            {{ item.tipo_producto }}
          </td>

          <!--      MOTIVO-->
          <td v-if="(tablaActual == 'tablaSalida' && item.tipo_mov != 'Entrada') && ( tipoActual == item.tipo_producto || tipoActual == 'Mostrar Todos' )" class="text-center">
            <v-tooltip v-if="item.tipo_mov == 'SalidaNoVendido'" text="Descartado">
              <template v-slot:activator="{ props }"> <!-- fa-face-frown // carita triste-->
                <v-icon v-bind="props" icon="fa-regular fa-circle-xmark" size="30" color="red"/>
                <v-icon v-bind="props" v-if="item.tipo_mov == 'SalidaVendido'" icon="mdi-cash" size="38" color="green"/>
              </template>
            </v-tooltip>
            <v-tooltip v-if="item.tipo_mov == 'SalidaVendido'" text="Vendido">
              <template v-slot:activator="{ props }"> 
                <v-icon v-bind="props"  icon="fa-solid fa-dollar-sign" size="30" color="green"/>
              </template>
            </v-tooltip>
          
          </td>

          <!--      CANTIDAD-->
          <td v-if="((tablaActual == 'tablaSalida' && item.tipo_mov != 'Entrada') || ( tablaActual == 'tablaEntrada' && item.tipo_mov == 'Entrada')) && ( tipoActual == item.tipo_producto || tipoActual == 'Mostrar Todos' )" class="text-center">
            {{ item.cant }}
          </td>

          <!--      FECHA-->
          <td  v-if="((tablaActual == 'tablaSalida' && item.tipo_mov != 'Entrada') || ( tablaActual == 'tablaEntrada' && item.tipo_mov == 'Entrada')) && ( tipoActual == item.tipo_producto || tipoActual == 'Mostrar Todos' )" class="text-center">
            {{ item.fecha_mov }}
          </td>

          <!--      IMAGEN-->
          <td v-if="((tablaActual == 'tablaSalida' && item.tipo_mov != 'Entrada') || ( tablaActual == 'tablaEntrada' && item.tipo_mov == 'Entrada')) && ( tipoActual == item.tipo_producto || tipoActual == 'Mostrar Todos' )" class="text-center">
            <v-dialog width="500">
              <template v-slot:activator="{ props }"> 
                <v-icon icon="fa-solid fa-image" v-bind="props"
                color="blue"
                />
              </template>
              <template v-slot:default="{ isActive }">
                <v-card style="border-radius: 15px;">
                  <v-img :src="item.rutaIMG" height="400"/>
                </v-card>
              </template>
            </v-dialog>
          </td>

          <!--      OPCIONES-->
          <td v-if="((tablaActual == 'tablaSalida' && item.tipo_mov != 'Entrada') || ( tablaActual == 'tablaEntrada' && item.tipo_mov == 'Entrada')) && ( tipoActual == item.tipo_producto || tipoActual == 'Mostrar Todos' )" style="padding: 0px;" class="text-center">
            <v-menu location="start">
              <template v-slot:activator="{ props }">
                  <v-btn
                  elevation="0"
                  v-bind="props"
                  icon="fa-solid fa-ellipsis-vertical"
                  />
              </template>
              <v-list density="dense" >
                <v-list-item
                v-for="opciones in opciones" :key="opciones"
                :title="opciones.title"
                :value="opciones.value"
                />
              </v-list>
            </v-menu>
          </td>
        </tr>
      </tbody>
      <div id="espacioBlanco"></div>
    </v-table>
  </v-card>
</v-card>
</template>

<style scoped>
/* width */
::-webkit-scrollbar {
  width: 0px;
}

#card1 {
  margin: 5px;
  overflow-y: hidden;
  border-radius: 15px;
  height: 670px;

}
#card2 {
  margin: 10px;
  overflow-y: hidden;
  height: 650px;
}
#card3{
  font-size: larger;
  color: v-bind(colorTexto);
}
#img:hover {
  cursor: pointer;
}
#tabla {
  height: 650px;
  color: v-bind(colorTexto);
}
#tabla thead tr th {
  color: v-bind(colorTexto);
}
#espacioBlanco{
  margin: 15px;
}
</style>

<script setup>
  import { inject } from 'vue';


  const tipoActual = inject('tipoActual')
  const tablaActual = inject('tablaActual')
  const productos = inject('productos')
  const movimientos = inject('movimientos')
  
  const colorTexto = inject('colorTexto')


  const opciones = [
    {title:"Eliminar Registro", value:''},
  ]
</script>