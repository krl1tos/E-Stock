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
  
  const scrFunciones = document.createElement("script")
  scrFunciones.setAttribute("src",'/js/funciones.js' )
  document.head.appendChild(scrFunciones)


  const colorDetalles = inject('colorDetalles')
  const inputs = ref([
   {ID:"Nombre", columnas:12, label:"Nombre"},
   {ID:"Email", columnas:12, label:"Email", type:"Email"},
   {ID:"Contraseña", columnas:12, label:"Contraseña", type:"password", md:6, sm:6,},
   {ID:"RepetirContraseña", columnas:12, label:"Repetir Contraseña", type:"password", md:6, sm:6,},

  ])

    //Funcion para enviar los datos del formulario
    function registrarse() {
    //Recoge los datos del formulario.
    const nombreInput = document.getElementById("Nombre").value
    const emailInput = document.getElementById("Email").value
    const passInput = document.getElementById("Contraseña").value
    const passInput2 = document.getElementById("RepetirContraseña").value
    
    
    //Chequea que el nombre no este vacio.
    if(emailInput === '') {
        alert('El campo email es obligatorio');
        return;
    }
    
    if(nombreInput === '') {
        alert('El campo nombre es obligatorio');
        return;
    }

    if(passInput === '') {
        alert('El campo contraseña es obligatorio');
        return;
    }

    if(passInput !== passInput2){
      alert('Las contraseñas no coinsiden')
      return;
    }

    //Crea una variable para los datos del formulario.
    let datos = {};

    //Guarda los datos en la VARIABLE datos.
    datos.email=emailInput;
    datos.nombre=nombreInput;    
    
    let usuario = {
        usuario:datos
    }
    //datos.pass=passInput;



    
    enviarAlServidor(usuario)
    .then(res => {
        clave_pub=res.Respuesta.datos.clave_pub
        password=passInput

        console.log("clave_pub:"+clave_pub)
         

        passConClave= mezclarStrings(passInput,clave_pub)//password+'-'+clave_pub
        hashPass=generarHash(passConClave)
        console.log(emailInput)
        datos.nombre=nombreInput
        datos.email=emailInput
        datos.hash_contra=hashPass
        usuario.usuario=datos 

         enviarAlServidor(usuario)
        .then(res => {
            console.log(res)
            const pEstado = document.createElement("p")
            pEstado.innerHTML=res.Respuesta.estado+": "+res.Respuesta.datos.mensaje
            divEstado.appendChild(pEstado)
        }) 
    }); 

        //Envia los datos al php para subir los datos.
        fetch("http://localhost/usuario-main/crear/crear.php", {
      method: "POST",
      headers: {
        'Accept': 'application/json, text/plain, */*',
        'Content-Type': 'application/json'
        },
      body: JSON.stringify(usuario)  
    });
  }
</script>