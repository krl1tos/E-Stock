<template>
  <v-dialog width="700" v-model="dialogo">
  <template v-slot:activator="{ props }">
    <v-btn v-bind="props" elevation="0" variant="tonal" color="blue" prepend-icon="fa-solid fa-sack-xmark">Descarte</v-btn>
  </template>
  <v-card>
      <v-card>
            <v-card-title class="text-h5 text-center" id="titulo"> Formulario de Descarte </v-card-title>
            <v-card-text id="card-text">
              <div id="form">
                <v-form @submit.prevent="submitDownloadForm">
                  <v-autocomplete
                    v-model="inputProductoSeleccionado"
                    label="Seleccionar Producto"
                    :items="productos"
                    item-title="nombre_producto"
                    item-value="codigo"
                    solo-inverted
                    clearable
                    color="blue"
                  />
                  <v-text-field
                    v-model="inputCantidad" 
                    label="Cantidad" 
                    type="number"
                    color="blue"
                    />
                </v-form>
              </div>
              <v-img id="img" :src="encontrarRutaPorCodigo(inputProductoSeleccionado)">
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
              <v-btn class="btn" @click="dialogo = false" color="#252525" >Cancelar</v-btn>
              <v-btn class="btn" variant="tonal" color="blue">Subir</v-btn>
              <v-spacer></v-spacer>
            </v-card-actions>
          </v-card>
  </v-card>
</v-dialog>
</template>

<style scoped>
#titulo{
  margin-top: 10px;
  padding-bottom: 0px;
}
#card-text{
  padding-bottom: 10px;
  padding-top: 10px;
  display: flex;
  align-items: center;
}
#form{
  width: 70%;
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
import { ref } from 'vue';
import { inject } from 'vue';


const dialogo = ref(false)
const productos = inject('productos')

const inputProductoSeleccionado = ref([])

function encontrarRutaPorCodigo(codigo) {
  const productoEncontrado = productos.find(producto => producto.codigo === codigo);
  return productoEncontrado ? productoEncontrado.rutaIMG : null;
}

const inputCantidad = ref()
const dialogEntrada = ref(false)
const dialogSalida = ref(false)
const selectedProduct = ref("")
const newProductName = ref("")
const newProductType = ref([])
const newProductImage = ref(null)
const quantity = ref(0)
const quantityToDownload = ref(0)
const filteredProductTypes = ref([])
const errorSnackbar = ref(false)
const errorMessage = ref("")
const status = ref("")

//      REGLAS DE INPUT

const rulesCantidad = [
  v => !!v || 'Este campo no puede estar vacío',
  v => v > 0 || 'El número no puede ser negativo',
  v => /^\d+$/.test(v) || 'Ingrese solo números',
]

/*  const tipos = async() => {
await fetch("http://localhost/api/Traertipos.php")
.then(respuesta => respuesta.json())  
.then(datos => filteredProductTypes.value=datos)        
}

const submitForm=()=> {
  if (selectedProduct.value === 'Nuevo Producto') {
    console.log(newProductImage.value[0].type)
    if (!(isImageValid.value(newProductImage.value[0]))) {
      
      errorSnackbar.value = true;
      errorMessage.value = 'El formato de la imagen no es válido. Debe ser PNG, JPEG o JPG.';
        
    }
    
  }


  if (quantity.value < 0) {
    errorSnackbar.value = true;
    errorMessage.value = 'La cantidad no puede ser un número negativo.';
    
  }

  // Aquí puedes realizar la lógica para guardar los datos del formulario de subida
  console.log('Producto seleccionado:', selectedProduct.value);
  console.log('Nombre:', newProductName.value);
  console.log('Tipo de Producto:', newProductType.value);
  console.log('Imagen:', newProductImage.value);
  console.log('Cantidad:', quantity.value);
  closeDialog();
},
submitDownloadForm=()=> {
  // Aquí puedes realizar la lógica para descargar productos con la cantidad especificada
  console.log('Producto seleccionado para descarga:', inputProductoSeleccionado.value);
  console.log('Cantidad a descargar:', -Math.abs(quantityToDownload.value)); // Convertir a número negativo
  console.log('Estado del Producto:', status.value);
  closeDownloadDialog();
},

isImageValid=(file)=> {
if (!file) return false;
const validFormats = ['image/png', 'image/jpeg','image/jpg'];
console.log(":(" + file.name)
return validFormats.includes(file.type);
},
filterProductTypes=(query)=> {
  filteredProductTypes.value = productTypes.value.filter(type =>
    type.toLowerCase().includes(query.toLowerCase())
  );
}

*/
</script>