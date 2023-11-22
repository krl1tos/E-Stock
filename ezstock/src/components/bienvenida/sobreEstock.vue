<template>
    <div  id="panel">
        <h2 class="text-h2">¡Bienvenido a E-Stock!</h2><br>
        <h2 class="text-h4">Más que un Gestor de Stock</h2>
        <v-card-text class="cardtext text-subtitle-1">
            &emsp;Diseñado pensando en ti, E-stock va más allá de ser simplemente un <strong>gestor de stock</strong>. Se diferencia de otros sistemas al ofrecer una experiencia intuitiva y simple en la administración de tu comercio. Mientras que otros sistemas pueden resultar antiintuitivos y complicados, E-stock destaca por su <strong>facilidad de uso</strong>. Simplifica la administración de tus productos, optimiza la dirección de tu inventario y te sumerge en una experiencia de manejo eficiente. Nuestro compromiso con la <strong>sencillez</strong> y confiabilidad promete no solo facilidad, sino también eficiencia para impulsar el progreso de tu comercio.  
        </v-card-text>
        <h2 class="text-h4"> Mejora tu productividad:</h2>
        <v-card-text class="cardtext text-subtitle-1">
            &emsp;Descubre la solución ideal para la gestión de inventario con E-stock, una plataforma diseñada para simplificar tu día a día comercial. Con nuestra aplicación intuitiva, experimentarás un control preciso y una optimización eficiente de productos. Especialmente útil en comercios pequeños y medianos, E-stock se adapta a las necesidades específicas de comercios en desarrollo, ofreciendo flexibilidad y funcionalidad. Olvídate de las complicaciones y eleva la eficiencia de tu comercio con E-stock.
        </v-card-text>
        <!--
        <p id="panel" class="text-body-1 text-black">¡Bienvenido a E-stock! Tu plataforma confiable para la gestión de inventario diseñada pensando en ti. Simplifica el control de tus productos, optimiza tu stock y experimenta una administración empresarial más eficiente. En E-stock, creemos en la simplicidad, confiabilidad y en brindarte las herramientas necesarias para impulsar el progreso de tu negocio.</p>
    -->

    <!--
          E-stock: donde una gestión fácil y efectiva está pensada especialmente para ti. Optimiza tus operaciones administrativas con nuestra ayuda.
         Optimiza tus operaciones administrativas con E-stock. Gestiona fácil y rapidamente las existencias mejorando la eficiencia. ¿Listo para simplificar tu gestión de stock y potenciar tu negocio? <strong> ¡Únete a E-stock hoy mismo!</strong>  
        -->
    </div>
</template>

<style scoped>
#panel{
    color: v-bind(colorTexto);
    border-radius: 25px;
    padding: 15px;
    margin-left: 15px;
}
.cardtext{
    border-radius: 25px;
    margin: 10px;
}
.cardtext:hover{
    background-color: #2195f3c0;
    transition: 0.2s;
}
</style>

<script setup>
    import { inject } from 'vue';
    const colorFondo = inject('colorFondo')
    const colorTexto = "white"
    const colorDetalles = inject('colorDetalles')
</script>