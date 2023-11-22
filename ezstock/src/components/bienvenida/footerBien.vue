<template>
    <v-footer color="#252525" id="footerr" class="text-center d-flex flex-column">

        <div id="contenedor">
            <v-card class="cuadro" title="Redes Sociales">
                <div style="min-height: 100px;">
                    <div class="text-left" v-for="red in redes" :key="red">
                        <v-btn variant="tonal" elevation="0" style="margin: 2px;" :color="red.color" :icon="red.icon"/>
                        Siguenos en {{ red.nombre }}
                    </div>
                </div> 
            </v-card>

            <v-card class="cuadro text-left" title="Informacion Relevante">
                <ul>
                    <li v-for="item in listUno" :key="item"> {{ item }}</li>
                </ul>
            </v-card>

            <v-card class="cuadro text-left">
                <v-card-title style="margin-left: 120px;"> Te Ayudamos </v-card-title>
                <ul density="compact">
                    <li v-for="item in contactos" :key="item" style=" margin-bottom: 6px;"> 
                        <v-list-item :prepend-icon="item.icon">
                            {{ item.text }} <br>
                            {{ item.textDos}}
                        </v-list-item>
                    </li>
                </ul>
            </v-card>
        </div>

        <v-divider></v-divider>

        <div id="derechos">
           © {{ new Date().getFullYear() }} - <strong>E-Stock</strong>
        </div>
    </v-footer>

</template>

<style scoped>
#footerr{
    background-color: red;
}
#contenedor{
    height: 210px;
    width: 95%;
    display: grid;
    grid-template-columns: 27.5% 27.5% 45%;
}
.cuadro{
    margin-left: 5%;
    width: 90%;
    background-color: transparent;
    box-shadow: 0px 0px 0px;
    font-size: 16px;
    color: #BDBDBD;
}

</style>

<script setup>

    const redes = [
        {nombre:'Facebook', icon:'fa-brands fa-facebook', color:'#3b5998'},
        {nombre:'Twitter', icon:'fa-brands fa-twitter', color:'#00acee'},
        {nombre:'Instagram', icon:'fa-brands fa-instagram', color:'#FD1D1D'},
    ]
    const listUno = [
        'Sobre Nosotros',
        'Politica de Privacidad',
        'Condiciones de Uso',
    ]

    const contactos = [ 
        {icon:'fa-solid fa-house', textDos:'Nuestra Sucursal: Esquina Dr. Herrera y Wilson da Rosa 314', text:'E-Stock: tu Gestor de Stock Digital'},
        {icon:'fa-solid fa-mobile-screen', text:'Tel.: 92 909 686'},
        {icon:'fa-regular fa-envelope', text:'Email: info@estock.com'},
    ]
</script>