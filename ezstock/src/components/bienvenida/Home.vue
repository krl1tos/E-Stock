<template >
  <span>
    <v-img aspect-ratio="16/9" cover :src="caja">
    <v-row justify="center" >
      <v-card
        style="
        position: absolute;
        top: 40px;
        opacity: 0.9;"
        width="1024"
       >
        <v-card>
          <v-card-title class="Titulito">
            <span  class="text-h5">Crear usuario</span>
          </v-card-title>
          <v-card-text>
            <v-container>
              <v-row>
               
          
                <v-col
                  :cols="coso.columnas"
                  :sm="coso.sm"
                  v-for="(coso , index) in cosos"
                  :key="index"
                >
               
                <v-text-field
            :v-model="coso.nombre"
            :type="coso.type"
            :label="coso.label"
            required
            hide-details
          ></v-text-field>

                </v-col>
                <v-col class="columna">
                  <v-btn  prepend-icon   class="btn_cuenta mr-5" >
                  <img :src="tuerca" class="imagen mr-2">
                  <h4 class="texto">Crear Cuenta</h4>
                  </v-btn>
                  <Router-Link to="/login">
                  <v-btn  prepend-icon   class="btn_cuenta1 mr-5" @click="Iniciar"  >
                  <img :src="tuerca" class="imagen mr-2">
                  <h4 class="texto">Iniciar Sesión</h4>
                  </v-btn>
                  </Router-Link>
                </v-col>
              </v-row>
            </v-container>
          </v-card-text>
        </v-card>
      </v-card>
    </v-row>
  </v-img>
  </span>

  </template>

<script setup>

  
import { ref } from 'vue';
import { RouterLink } from 'vue-router';
 const cosos = ref([
 {nombre:"",columnas:12,label:"Nombre", md:6, sm:6},
 {nombre:"",columnas:12,label:"Email",type:"Email", md:6, sm:12,},
 {nombre:"",columnas:12,label:"contraseña",type:"password", md:6, sm:6,},
 {nombre:"",columnas:12,label:"Repetir Contraseña",type:"password", md:6, sm:6,},

 ])

 const caja = ref("cajas.jpeg")
 const tuerca = ref("tuerca.ico")




</script>

<style scoped>
.Titulito{
  text-align: center;
}
.btn_cuenta {
 display: flex;
 justify-content: space-between;
}
.columna{
   display: flex;
}
.imagen{
 
  width: 20px;
  height: 20px;
}

.btn_cuenta1{
  margin-left:290% ;
}

</style>
