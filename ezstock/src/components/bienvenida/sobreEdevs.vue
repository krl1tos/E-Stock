<template>
  <v-carousel id="carrusel" cycle :interval="6000" hide-delimiters show-arrows="hover">
    <v-carousel-item
      v-for="(item,i) in items"
      :key="i"
      :src="item.src"
      cover
    ></v-carousel-item>
  </v-carousel>
  <div id="div-text">
    <h2 class="text-h3 text-white">&ensp;E-Devs: <br>&ensp;El Equipo Detras</h2> <br>
    <v-card-text class="card-text text-body-1 text-white">&emsp;En E-Devs, somos un equipo apasionado por la innovación tecnológica. Unimos mentes creativas y futuros programadores web con el propósito claro de transformar y simplificar la gestión de stock para empresas y comercios en desarrollo. Forjamos nuestra identidad al buscar incansablemente soluciones efectivas y accesibles. Creemos en el poder de la tecnología para impulsar el progreso empresarial y mejorar la eficiencia. En E-Devs, creamos más que software; diseñamos herramientas intuitivas para facilitar la vida comercial. </v-card-text>
    <v-card-text class="card-text text-body-1 text-white">&emsp;Colaboramos estrechamente con nuestros clientes, adaptando nuestras soluciones a sus necesidades específicas. Nuestro compromiso es ser el socio confiable que optimiza operaciones e impulsa el crecimiento de los negocios. En E-Devs, convertimos desafíos en oportunidades y trazamos el camino hacia el éxito tecnológico de tu empresa.</v-card-text>
  </div>
</template>

<style scoped>
#carrusel{
  background-color: #252525;
  border-radius: 10px;
  width: 60%;
  margin-right: 15px;
  height: 85px;
}
#div-text{
  width: 35%;
  height: auto;
  
}
.card-text{
  border-radius: 15px;
}
.card-text:hover{
  background-color: #2195f3c0;
  transition: 0.2s;
}
</style>


<script setup>

  const items= [
    {src: 'src/assets/images/Bienvenida/carrusel/tresDesarrolladoresTrabajando.YUnIndividuo.jpg',},
    {src: 'src/assets/images/Bienvenida/carrusel/dosDesarolladoresEnPizarra.jpg',},
    {src: 'src/assets/images/Bienvenida/carrusel/dosDesarrolladoresDocumentado.jpg',},
    {src: 'src/assets/images/Bienvenida/carrusel/unDesarrolladorConCafe.jpg',},
    {src: 'src/assets/images/Bienvenida/carrusel/dosDesarrolladoresAdmirandoCodigo.jpg',},
  ]
</script>