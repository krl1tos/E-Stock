<template>
  <div id="contenedor">
  <v-card id="card" color="#252525">
    <h3 class="text-h4">¿Listo para simplificar tu gestión y potenciar tu negocio?</h3>
    <p class="text-subtitle-1">¡Únete a E-stock hoy mismo, regístrate y comienza a impulsar tu eficiencia en tus registros</p> <br>

    <v-form>
      <v-row justify="center">
        <v-col
        :cols="input.columnas"
        :sm="input.sm"
        v-for="input in inputs"
        :key="index"
        >

          <v-text-field class="inputs" color="blue"
          :v-model="input.nombre"
          :type="input.type"
          :label="input.label"
          :id="input.ID"
          required
          hide-details
          />
        </v-col>

        <v-col>
          <v-spacer></v-spacer>
          <v-btn id="btn-crearCuenta" variant="tonal" class="mr-5">
            Crear Cuenta
          </v-btn>
        </v-col>
      </v-row>
    </v-form>
  </v-card>
</div>
</template>

<style scoped>
#card{
  width: 100%;
  border-radius: 10px;
  padding: 15px;
}
#btn-crearCuenta{
  float: right;
  color: white;
  margin-bottom: 12px;
}
#btn-crearCuenta:hover{
  color: v-bind(colorDetalles);
  transition: 0.2s;
}
</style>

<script setup>
  import { ref } from 'vue';
  import { inject } from 'vue';
  
  const colorDetalles = inject('colorDetalles')
  const inputs = ref([
   {ID:"Nombre", columnas:12, label:"Nombre"},
   {ID:"Email", columnas:12, label:"Email", type:"Email"},
   {ID:"Contraseña", columnas:12, label:"Contraseña", type:"password", md:6, sm:6,},
   {ID:"RepetirContraseña", columnas:12, label:"Repetir Contraseña", type:"password", md:6, sm:6,},

  ])
</script>