<template>
  <toolbar id="toolbar"></toolbar>
  <div id="paginaPrincipal">

    <!--PRIMER PANEL // BIENVENIDA // LOGO -->
    
    <v-card color="transparent" class="panel scrollsnap" elevation="0">
      <logo/>
      <a id="line" href="#panelDos"><i class="fa-solid fa-angle-down fa-bounce fa-2xl"></i></a>  
    </v-card>

    <!--SEGUNDO PANEL A1 // SOBRE E-STOCK // REGISTRO -->

    <v-card class="panel scrollsnap" id="panelDos" elevation="0">
      
      <v-row id="row">
        <v-col class="scrollsnap col" cols="6">          
          <sobreEstock></sobreEstock>
        </v-col>

        <v-col cols="6" class="scrollsnap col">
          <v-card class="articulo" id="articuloDos" elevation="0">
            <registro></registro>
          </v-card>
        </v-col>
      </v-row>

    </v-card>

    <!--TERCER PANEL // SOBRE NOSOTROS -->
 
    <v-card class="panel scrollsnap" id="panelTres">
      <v-card class="articulo" id="articuloTres">
        <sobreEdevs></sobreEdevs>
      </v-card>
    </v-card>
    
    <footerBien class="scrollsnap" id="footer"></footerBien>
  </div>
</template>

<style scoped>
#toolbar{
  background-color: transparent;
}
#paginaPrincipal {
  background-color: v-bind(colorFondo);
  display: block;
  width: 100%;
  height: 100dvb;
  overflow-y: scroll;
  /* activa un movimiento mas suave*/
  scroll-behavior: smooth;
  /* activa el scroll en secciones*/
  scroll-snap-type: y mandatory;  

  background-image: url('src/assets/images/Bienvenida/banner.jpg');
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  background-attachment: fixed;
}
.panel{
  height: 100dvb;
  width: 100%;
  background-color: v-bind(colorFondo);
}
.scrollsnap{
  /* declara una seccion y donde se debe de colocar en pantalla*/
  /* en este caso es en el inicio de la seccion*/
  scroll-snap-align: start;
}
#line{
  display: flex;
  justify-content: center;
  align-items: center;
  position: absolute;
  bottom: 0%;
  width: 100%;
  height: 15dvb;
  background-color: v-bind(colorFondo);
  color: white;
  text-decoration: none;
  font-size: 27px;
}
#line:hover{
  color: v-bind(colorDetalles);
  transition: 0.2s;
}

#panelDos{
  background-color: v-bind(colorFondo);
  height: 100dvb;
  scroll-snap-type: y mandatory; 
  overflow-y: scroll;
}
#row{
  width: 100%;
  margin: 0px;
}
.col{
  display: flex;
  align-items: center;
  justify-content: center;
  padding:0px;
}
.articulo{
  height: 100dvb;
  width: 85%;
  background-color: transparent;
  display: flex;
  align-items: center;
  justify-content: center;
}
#panelTres{
  background-color: v-bind(colorFondo);
  display: flex;
  justify-content: center;
}
#articuloTres {
  width: 92%;
}

</style>

<script setup>
  import logo from '@/components/bienvenida/logo.vue'; 
  import footerBien from '@/components/bienvenida/footerBien.vue';
  import toolbar from '@/components/bienvenida/toolbar.vue';
  import registro from '@/components/bienvenida/registro';
  import sobreEstock from '@/components/bienvenida/sobreEstock.vue';
  import sobreEdevs from '@/components/bienvenida/sobreEdevs.vue';
  import { provide } from 'vue';

      //PALETA DE COLORES

  const colorFondo = '#25252540'
  const colorPanel = '#141827' //Paneles 
  const colorDetalles = '#2196F3'
  const colorTexto = 'black'

  provide('colorFondo', colorFondo)
  provide('colorPanel', colorPanel)
  provide('colorDetalles', colorDetalles)
  provide('colorTexto', colorTexto)

</script>