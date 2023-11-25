<template >
    <v-dialog width="650">
      <template v-slot:activator="{ props }">
        <v-btn id="btn-dialog" variant="tonal" v-bind="props" text="Iniciar Sesion"/>
      </template>
  
      <template v-slot:default="{ isActive }">
        <v-card id="card" elevation="0">
          <v-card-text class="texto text-h6">
            <div class="text-h4">¡Bienvenido de nuevo!</div> Inicia sesión para gestionar tu inventario fácilmente.
          </v-card-text>
          <v-form id="form">
            <v-text-field
            color="blue"
            id="email"
            label="Correo Electronico"
            type="email"
            required
            />
            <v-text-field
            color="blue"
            id="contraseña"
            type="password"
            label="Contraseña"
            requiered
            />
            <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn
              variant="tonal"
              id="btnLogin"
              text="Iniciar"
              @click="isActive.value = false; enviarDatos(); console.log(form)"
            />
          </v-card-actions>
          </v-form>
        </v-card>
      </template>
    </v-dialog>
  </template>
  
<style scoped>

#btn-dialog{
  color: white;
}
#btn-dialog:hover{
  color: v-bind(colorDetalles);
  transition: 0.2s;
}
#card{
  background-color: #252525;
  color: white;
  border-radius: 10px;
}
#form{
  margin: 18px;
}
.texto{
  padding: 0px;
}
#btnLogin {
  color: white;
}
#btnLogin:hover{
  color: #2196F3;
}
</style>
  
<script setup>
  import { inject } from 'vue';
  const colorDetalles = "#2196F3"
  const colorFondo = inject('colorFondo')

    function enviarDatos() {
      const nombreUsuario = document.getElementById("nombreUsuario").value;
      const contraseña = document.getElementById("contraseña").value;
      
      //Array de objetos u objeto?????????
      let form = new FormData();
      
      //"nombre como se guarda", variable
      form.append("nombre", nombreUsuario);
      form.append("contraseña", contraseña);
      console.log(form)
    }
  
  
  </script>