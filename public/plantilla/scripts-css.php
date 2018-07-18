<script src="js/jquery-1.11.3.min.js"></script>
<script src="../js/jquery-ui.min.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/menu.js"></script>
<script>
(function(a){a.fn.validCampo=function(b){a(this).on({keypress:function(a){var c=a.which,d=a.keyCode,e=String.fromCharCode(c).toLowerCase(),f=b;(-1!=f.indexOf(e)||9==d||37!=c&&37==d||39==d&&39!=c||8==d||46==d&&46!=c)&&161!=c||a.preventDefault()}})}})(jQuery);
</script>

<script>
        
    $(document).ready(function(){
        $('#cedula, #iden').validCampo('0123456789');      
        $('#contrasena').validCampo(' abcdefghijklmnñopqrstuvwxyz0123456789-_');
        $('#nombres, #apellidos, .producto').validCampo(' abcdefghijklmnñopqrstuvwxyzáéíóú');    
        $('#celular').validCampo(' 0123456789-+');
        $('.cantidad').validCampo('0123456789');  
    });

</script>
<link href="./css/menu.css" rel="stylesheet" type="text/css" />
<link href="./css/principal.css" rel="stylesheet" type="text/css" />
<link href="./css/crud.css" rel="stylesheet" type="text/css" />
