<template>
  <v-dialog v-model="dialogo" width="700">
      <template v-slot:activator="{ props }">
          <v-btn v-bind="props" elevation="0" variant="tonal" color="blue" prepend-icon="fa-solid fa-truck-ramp-box">Ingreso</v-btn>        
      </template>
        <v-card>
              <v-card-title class="text-h5 text-center" id="titulo"> Formulario de Ingreso</v-card-title>
              <v-card-text id="card-text">
                <div id="form">
                    <v-form @submit.prevent="submitForm">
                        <v-autocomplete
                            color="blue"
                            v-model="inputProductoSeleccionado"
                            label="Seleccionar Producto"
                            :items="productos"
                            item-title="nombre_producto"
                            item-value="codigo"
                            clearable
                            />
                        <v-text-field 
                            class="btn-padding" color="blue"
                            v-if=" inputProductoSeleccionado == 'Nuevo Producto' "
                            v-model="inputNuevoProductoNombre" 
                            label="Nombre"
                            messages="Ingrese el nombre del nuevo producto"
                            />
                        <v-autocomplete
                            color="blue"
                            v-if=" inputProductoSeleccionado == 'Nuevo Producto' "
                            v-model="inputNuevoProductoTipo"
                            label="Tipo de Producto"
                            :items="tipos"
                            item-title="tipo"
                            item-value="tipo"
                            clearable
                            @input="filterProductTypes"
                            />
                        <v-text-field 
                            class="btn-padding" color="blue"
                            v-if=" inputNuevoProductoTipo == 'Nuevo Tipo' && inputProductoSeleccionado == 'Nuevo Producto'"
                            v-model="inputNuevoTipo" 
                            label="Nombre del Nuevo Tipo"
                            messages="Ingrese el nombre del nuevo tipo de producto"
                            />
                        <v-file-input
                            color="blue"
                            v-if=" inputProductoSeleccionado == 'Nuevo Producto' "
                            v-model="inputNuevoProductoImagen"
                            label="Imagen o foto del producto"
                            accept=".png, .jpeg, .jpg"
                            />
                        <v-text-field
                            color="blue"
                            v-model="inputCantidad" 
                            label="Cantidad" 
                            type="number"
                            />
                    </v-form>
                </div>

                <v-img v-if="inputProductoSeleccionado != 'Nuevo Producto'" id="img" :src="encontrarRutaPorCodigo(inputProductoSeleccionado)">
                  <template style="height: 100%; width: 100%;" v-slot:default>
                    <v-card v-if="inputCantidad != null && inputCantidad != ''" elevation="0" class="text-white" color="blue" id="cantidadProducto"> ~{{ inputCantidad }}</v-card>
                  </template>
                  <template v-slot:placeholder>
                      <v-img  style="height: 100%; width: 100%;" cover src="src/assets/images/home/notimage.avif"/>
                  </template>
                </v-img>     


            </v-card-text>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn class="btn" @click="dialogo = false">Cancelar</v-btn>
                <v-btn class="btn" color="blue" variant="tonal" @click="submitForm">Registrar</v-btn>
                <v-spacer></v-spacer>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<style scoped>
.btn-padding{
    margin-bottom: 9px;
}

#card-text{
  padding-bottom: 10px;
  padding-top: 10px;
  display: flex;
  align-items: center;
}
#form{
  width: 100%;
}
#img{
  height: 180px;
  width: 30%;
  border-radius: 10px;
  margin-left: 8px;
}
#cantidadProducto{
  position: absolute;
  right: 0%;
  bottom: 0%;
  min-width: 35px;
  height: 25px;
  text-align: right;
  font-size: larger;
  font-family: Verdana, Geneva, Tahoma, sans-serif;
  padding: 2px;
  padding-left: 7px;
  padding-right: 7px;
  margin: 5px;
}
.btn{
  width: 115px;
  margin-right: 6px;
  margin-left: 6px;
}
</style>

<script setup>
//import { inject } from 'vue';
import { ref } from 'vue';

//const tipos = inject('tiposExistentes')
const tipos = []
tipos.unshift({tipo:'Nuevo Tipo'})

//const productos = inject('productos')
const productos = []
productos.unshift({codigo:'Nuevo Producto', nombre_producto:'Nuevo Producto'})

const dialogo = ref(false)

//      variables v-model de inputs
const inputProductoSeleccionado = ref('')
const inputNuevoProductoNombre = ref()
const inputNuevoProductoTipo = ref()
const inputNuevoTipo = ref()
const inputNuevoProductoImagen = ref()
const inputCantidad = ref()

function encontrarRutaPorCodigo(codigo) {
    const productoEncontrado = productos.find(producto => producto.codigo === codigo);
    return productoEncontrado ? productoEncontrado.rutaIMG : null;
}

//      FORMULARIO        //

  function nuevoprod() {
    
  }

</script>
