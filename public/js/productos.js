$(document).ready(function(){

    $("#agregarForm").on("click", "#agregarProducto", function(evt) {

        evt.preventDefault();

        if( $(".producto:eq(0)").val() == "" ){
                      
            alert("Debe indicar un producto");
            return;
        }

        if( $(".cantidad:eq(0)").val() == "" || $(".cantidad:eq(0)").val() <= 0){
            alert("Debe indicar una cantidad mayor a cero");
            return;
        }

        var prod = $(".producto:eq(0)").val();
        var can = $(".cantidad:eq(0)").val();
        $(".producto:eq(0)").val("");
        $(".cantidad:eq(0)").val("");

        $("#masProductos").append(
                '<input type="text" name="producto[]" class="producto" value="' +prod+ '"required placeholder="Producto" readonly="readonly">'
                +'<input type="text" name="cantidad[]" class="cantidad"  value="' +can+ '"required placeholder="Cantidad" size="10%" readonly="readonly">'
                //+'<label class=eliminarLabel style=float:right><img width=50% height=50% src=img/eliminar.png></label>'
        );

    });

});