<template>
  <div id="index">
    <toolbar/>
    <div id="content">
        <resourcesBar></resourcesBar>
        <tabla></tabla>
    </div>
  </div>
</template>

<style scoped>

#index{
  background-color: v-bind(colorFondo);
  height: 100%;

}
#content {
    display: grid;
    width:  100%;
    grid-template-columns: 300px calc( 100% - 300px);
}

</style>

<script setup>
  import tabla from '@/components/Home/tabla.vue';
  import toolbar from '@/components/Home/toolbar.vue';
  import resourcesBar from '@/components/Home/resourcesBar.vue';
  import { provide } from 'vue';
  import { ref } from 'vue';

  const tipoActual = ref('Mostrar Todos')
  const tablaActual = ref('tablaProductos')

  const movimientos = [
    { tipo_mov: 'Entrada', cant: 100, fecha_mov: '2023/11/01', movimiento_id: 1, codigo: 'P001', fecha_cad: '' },
    { tipo_mov: 'SalidaVendido', cant: 50, fecha_mov: '2023/11/02', movimiento_id: 2, codigo: 'P002', fecha_cad: '' },
    { tipo_mov: 'Entrada', cant: 75, fecha_mov: '2023/11/03', movimiento_id: 3, codigo: 'P003', fecha_cad: '' },
    { tipo_mov: 'SalidaNoVendido', cant: 30, fecha_mov: '2023/11/04', movimiento_id: 4, codigo: 'P004', fecha_cad: '' },
    { tipo_mov: 'Entrada', cant: 120, fecha_mov: '2023/11/05', movimiento_id: 5, codigo: 'P005', fecha_cad: '' },
    { tipo_mov: 'SalidaVendido', cant: 40, fecha_mov: '2023/11/06', movimiento_id: 6, codigo: 'P006', fecha_cad: '' },
    { tipo_mov: 'Entrada', cant: 90, fecha_mov: '2023/11/07', movimiento_id: 7, codigo: 'P007', fecha_cad: '' },
    { tipo_mov: 'SalidaNoVendido', cant: 25, fecha_mov: '2023/11/08', movimiento_id: 8, codigo: 'P008', fecha_cad: '' },
    { tipo_mov: 'Entrada', cant: 60, fecha_mov: '2023/11/09', movimiento_id: 9, codigo: 'P009', fecha_cad: '' },
    { tipo_mov: 'SalidaVendido', cant: 45, fecha_mov: '2023/11/10', movimiento_id: 10, codigo: 'P010', fecha_cad: '' },
    { tipo_mov: 'Entrada', cant: 80, fecha_mov: '2023/11/11', movimiento_id: 11, codigo: 'P001', fecha_cad: '' },
    { tipo_mov: 'SalidaNoVendido', cant: 35, fecha_mov: '2023/11/12', movimiento_id: 12, codigo: 'P002', fecha_cad: '' },
    { tipo_mov: 'Entrada', cant: 70, fecha_mov: '2023/11/13', movimiento_id: 13, codigo: 'P003', fecha_cad: '' },
    { tipo_mov: 'SalidaVendido', cant: 20, fecha_mov: '2023/11/14', movimiento_id: 14, codigo: 'P004', fecha_cad: '' },
    { tipo_mov: 'Entrada', cant: 110, fecha_mov: '2023/11/15', movimiento_id: 15, codigo: 'P005', fecha_cad: '' },
    { tipo_mov: 'SalidaNoVendido', cant: 30, fecha_mov: '2023/11/16', movimiento_id: 16, codigo: 'P006', fecha_cad: '' },
    { tipo_mov: 'Entrada', cant: 95, fecha_mov: '2023/11/17', movimiento_id: 17, codigo: 'P007', fecha_cad: '' },
    { tipo_mov: 'SalidaVendido', cant: 28, fecha_mov: '2023/11/18', movimiento_id: 18, codigo: 'P008', fecha_cad: '' },
    { tipo_mov: 'Entrada', cant: 55, fecha_mov: '2023/11/19', movimiento_id: 19, codigo: 'P009', fecha_cad: '' },
    { tipo_mov: 'SalidaNoVendido', cant: 40, fecha_mov: '2023/11/20', movimiento_id: 20, codigo: 'P010', fecha_cad: '' },
    { tipo_mov: 'Entrada', cant: 70, fecha_mov: '2023/11/21', movimiento_id: 21, codigo: 'P001', fecha_cad: '' },
    { tipo_mov: 'SalidaVendido', cant: 32, fecha_mov: '2023/11/22', movimiento_id: 22, codigo: 'P002', fecha_cad: '' },
    { tipo_mov: 'Entrada', cant: 85, fecha_mov: '2023/11/23', movimiento_id: 23, codigo: 'P003', fecha_cad: '' },
    { tipo_mov: 'SalidaNoVendido', cant: 15, fecha_mov: '2023/11/24', movimiento_id: 24, codigo: 'P004', fecha_cad: '' },
    { tipo_mov: 'Entrada', cant: 130, fecha_mov: '2023/11/25', movimiento_id: 25, codigo: 'P005', fecha_cad: '' },
    { tipo_mov: 'SalidaVendido', cant: 38, fecha_mov: '2023/11/26', movimiento_id: 26, codigo: 'P006', fecha_cad: '' },
    { tipo_mov: 'Entrada', cant: 75, fecha_mov: '2023/11/27', movimiento_id: 27, codigo: 'P007', fecha_cad: '' }
]

const productos = [
  { codigo: 'P001', unidad: '2 litros', nombre_producto: 'Detergente', tipo: 'Limpieza', rutaIMG: 'src/assets/images/productos/detergente.jpg' },
  { codigo: 'P002', unidad: '1 litro', nombre_producto: 'Aceite de Cocina', tipo: 'Alimento', rutaIMG: 'src/assets/images/productos/aceiteDeCocina.jpg' },
  { codigo: 'P003', unidad: '750 ml', nombre_producto: 'Champú', tipo: 'Cuidado Personal', rutaIMG: 'src/assets/images/productos/shampu.jpg' },
  { codigo: 'P004', unidad: '500 ml', nombre_producto: 'Jabón de Baño', tipo: 'Cuidado Personal', rutaIMG: 'src/assets/images/productos/jabonDeBaño.jpg' },
  { codigo: 'P005', unidad: '2 litros', nombre_producto: 'Leche', tipo: 'Alimento', rutaIMG: 'src/assets/images/productos/leche.png' },
  { codigo: 'P006', unidad: '750 ml', nombre_producto: 'Crema Hidratante', tipo: 'Cuidado Personal', rutaIMG: 'src/assets/images/productos/cremaHidratante.jpg' },
  { codigo: 'P007', unidad: '3 unidades por paquete', nombre_producto: 'Pañuelos de Papel', tipo: 'Hogar', rutaIMG: 'src/assets/images/productos/pañueloDePapel.jpg' },
  { codigo: 'P008', unidad: '500 ml', nombre_producto: 'Salsa de Tomate', tipo: 'Alimento', rutaIMG: 'src/assets/images/productos/salsaDeTomate.jpg' },
  { codigo: 'P009', unidad: '150 gramos', nombre_producto: 'Chocolates', tipo: 'Alimento', rutaIMG: 'src/assets/images/productos/chocolate.jpg' },
  { codigo: 'P010', unidad: '4 unidades por paquete', nombre_producto: 'Cepillos de Dientes', tipo: 'Cuidado Personal', rutaIMG: 'src/assets/images/productos/cepillo.jpg' }
];

          //PALETA DE COLORES
  const colorIcons = '#141827'  //Iconos
  const colorTexto = '#141827' //text
  const colorDetalles = 'blue' //Detalles
  const colorFondo = '#f8fcfc'  //Background
  const colorResorces = ' white' //Paneles

  //Inicia un atributo cantidad en cada prodcuto con el valor cero para declararlo como un atributo numerico 
  productos.forEach(item => {
    item.cantidad = 0
  })

  //gaurda el codigo del producto de un movimiento
  movimientos.forEach( movimiento => {
    const movimientoCodigoActual = movimiento.codigo
    
    //compara el codigo del producto del movimiento con todos los productos hasta que da cono el producto participe de ese mov. 
    productos.forEach( producto => {
      //guarda los datos del producto 
      const productoNombreActual = producto.nombre_producto
      const productoTipoActual = producto.tipo
      const productoCodigoActual = producto.codigo
      const productoImagenActual = producto.rutaIMG

      //compara el producto actual con el codigo del movimiento
      if ( movimientoCodigoActual == productoCodigoActual ){
        movimiento.nombre_producto = productoNombreActual
        movimiento.tipo_producto = productoTipoActual
        movimiento.rutaIMG = productoImagenActual

        //al encontrar el producto de dicho movimiento compara que tipo de movimiento tiene ese movimiento y de ser de salida lo resta
        //a la cantidad del producto, de ser de entrada lo suma, terminando asi el bucle para este movimiento y empezando de nuevo para el siguiente.
        switch (movimiento.tipo_mov) {
          case 'SalidaVendido':
          case 'SalidaNoVendido':
            producto.cantidad = producto.cantidad - movimiento.cant
            break;
        
          case 'Entrada':
            producto.cantidad = producto.cantidad + movimiento.cant  
            break;
        }
      }
    })
  })

  const tiposExistentes = []
  //Estas lineas de codigo chequean los tipos de productos existentes para hacer los botones "filtros" del componente

  //chequea cada uno de los tipos de cada producto
  productos.forEach(producto => {
      //declara tipo como el tipo de producto de la posicion actual
      const tipo = producto.tipo
      //inicialmente se toma como que el tipo de este producto no existe en el array de tiposExistentes
      let esteTipoExiste = false
      //se chequea si algunos de los tipos en el array coincide con el tipo de producto actual,
      //de ser asi esteTipoExiste se vuelve verdadero
      tiposExistentes.forEach(tiposRegistrados => {
          if ( tipo == tiposRegistrados.tipo) {
              esteTipoExiste = true
          }
      })
      //en caso de que esteTipoExiste continuo en falso luego de chequear todos los tipos en el array, 
      //este se crea en nuevotipo y se agrega al array tiposExistentes con un .push para repetir el proceso
      //y chequear el mismo proceso con el producto siguiente
      if (!esteTipoExiste) {
          const nuevotipo = {tipo:tipo}
          tiposExistentes.push(nuevotipo)
      }
  })


  provide('colorTexto', colorTexto)
  provide('colorFondo', colorFondo)
  provide('colorResorces', colorResorces)
  provide('colorIcons', colorIcons)
  provide('colorDetalles', colorDetalles)

  provide('tiposExistentes', tiposExistentes)
  provide('movimientos', movimientos)
  provide('productos', productos)
  provide('tablaActual', tablaActual)
  provide('tipoActual', tipoActual)
</script>