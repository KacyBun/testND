Array.prototype.count_value = function(){
    var count = {};
    for(var i = 0; i < this.length; i++){
        if(!(this[i] in count))count[this[i]] = 0;
        count[this[i]]++;
    }
    return count;
};
Array.prototype.repetidos = function(){
    var count = {};
    for(var i = 0; i < this.length; i++){
        if(!(this[i] in count))count[this[i]] = 0;
        count[this[i]]++;
    }
    for (var key in count) {
        // check if the property/key is defined in the object itself, not in parent
        if (count.hasOwnProperty(key)) {
            if (count[key]>1){
                return false;
            }
        }
    }
    return true;

};


function validarfrm(form){
    var resp= true;
    var campo;
    var campos=[];
    $('#'+form+' :input').each(function(index,obj){
        campo = $(this).attr('id');
        temp={
            'resp':true,
            'campo':campo,
            'mensaje': ''
        };
        temp=valida(obj,temp);
        if(!temp.resp){
            resp=false;
        }
        campos.push(temp);
    });
    $.each(campos, function( index, value ) {
        if (value.campo!= undefined){
            agregaerror(value);
        }
    });
    return resp;
}
function agregaerror(objeto){
    if(objeto != undefined){
        if(objeto.resp){
            $('#'+objeto.campo).parent().parent().removeClass("has-error");
            $('#'+objeto.campo).parent().children("span").remove();
        }else{
            if ($('#'+objeto.campo).parent().parent().attr("class").indexOf('has-error')== -1) {
                $('#'+objeto.campo).parent().parent().addClass("has-error");
                $('#'+objeto.campo).parent().append('<span class="help-block">'+objeto.mensaje+'</span>');
            }else{
                $('#'+objeto.campo).parent().children(".help-block").effect( "shake", "slow" );
                $('#'+objeto.campo).parent().children(".help-block").html(objeto.mensaje);
            }
        }
    }
}

function valida(obj,temp){
    if(!$(obj).attr('omit')){
        val = $(obj).val().trim();
        if($(obj).attr('type')=='text'){
            $(obj).val(val);
        }
        patron = $(obj).attr('pattern');
        Ncampo = $(obj).attr('ref');
        regla = $(obj).attr('required');
        msjpatr = $(obj).attr('title');
        if (regla != undefined){
            if(patron!= undefined){
                if(!val.match(patron)){
                    if (val==""){
                        temp.mensaje ='Debe llenar el campo';
                    }else{
                        temp.mensaje = msjpatr+' en el campo';
                    }
                    temp.resp=false;

                }
            }else{
                if (val==""){
                    temp.mensaje ='Debe llenar el campo';
                    temp.resp=false;
                    return temp
                }
            }
        }else{
            if(patron!= undefined){
                if (val!=""){
                    if(!val.match(patron)){

                    }
                }
            }
        }
        return temp;
    }
}

function errorTreal (form)
{
    $('#'+form+' :input').each(function(index,obj){
        campo = $(this).attr('id');
        $( "#"+campo ).change(function() {
            obj = $(this).attr('id');
            temp={
                'resp':true,
                'campo':obj,
                'mensaje': ''
            };
            value=valida(this,temp);
            agregaerror(value);
        });
    });
}

function disabledchange (form,select,atrib,value,other=false,select2=''){
    var myform = $("#"+form);
    var inputsoff=$("#"+form).find(':input:disabled').removeAttr('disabled');
    if($('option:selected', $('#'+select)).attr(atrib)==value){
        inputsoff.attr('disabled','disabled');
    }else{
        myform.find(':input:disabled').removeAttr('disabled');
    }
    $('#'+select).change(function () {
        val= $('option:selected', this).attr(atrib);
        if(val!=undefined){
            if(val==value){
                inputsoff.attr('disabled','disabled');
            }else{
                myform.find(':input:disabled').removeAttr('disabled');
            }
        }else{
            myform.find(':input:disabled').removeAttr('disabled');
        }
    });
    if(other){
        $('#'+select2).change(function () {
            val= $('option:selected', $('#'+select)).attr(atrib);
            if(val!=undefined){
                if(val==value){
                    inputsoff.attr('disabled','disabled');
                }else{
                    myform.find(':input:disabled').removeAttr('disabled');
                }
            }else{
                myform.find(':input:disabled').removeAttr('disabled');
            }
        });
    }
}

function apendcombo (combo,data,selectpicker=false){
    $('#'+combo).find('option').remove();
    $.each(data, function (indice, val) { // indice, valor
        $('#'+combo).append('<option value="' + indice + '">' + val + '</option>');
    });
    if(selectpicker){
        $('#'+combo).selectpicker('refresh');
    }
}

function agrega(agrega,contenedor,html,claseselect,clasedate){
    $('.'+claseselect).selectpicker();
    $('.'+clasedate).daterangepicker({
        singleDatePicker: true,
        singleClasses: "picker_1"
    });
    $("#"+agrega).on('click', function(){
        $('#'+contenedor).append(html);
        $('.'+claseselect).selectpicker();
        $('.'+clasedate).daterangepicker({
            singleDatePicker: true,
            singleClasses: "picker_1"
        });
    });
}

function agregainput(agrega,contenedor,html){
    $('#'+contenedor).append(html);
    $("#"+agrega).on('click', function(){
        $('#'+contenedor).append(html);

    });
}

function elimina(claseelimina,claseselect){
    $(document).on("click","."+claseelimina,function(){

        $('.'+claseselect).selectpicker('destroy');

        if( $('.'+claseselect).length!=1){
            $(this).parent().parent().parent().remove();
        }
        $('.'+claseselect).selectpicker();
        //verifica que haya mas de un elemento para poder eliminar
    });
}
function eliminainput(claseelimina){
    $(document).on("click","."+claseelimina,function(){
            $(this).parent().parent().parent().remove();
        //verifica que haya mas de un elemento para poder eliminar
    });
}

function apendcomboanio (combo,data, anio,selectpicker=false){
    $('#'+combo).find('option').remove();
    $.each(data[anio], function (indice, val) { // indice, valor
        if(val.estatus)
        {
            $('#'+combo).append('<option data-icon="glyphicon-ok" value="' + indice + '">' + val.mes + '</option>');
        }else{
            $('#'+combo).append('<option value="' + indice + '">' + val.mes + '</option>');
        }
    });
    if(selectpicker){
        $('#'+combo).selectpicker('refresh');
    }
}

function mascaraMoneda(num, prefix) {
    num = Math.round(parseFloat(num) * Math.pow(10, 2)) / Math.pow(10, 2)
    prefix = prefix || '';
    num += '';
    var splitStr = num.split('.');
    var splitLeft = splitStr[0];
    var splitRight = splitStr.length > 1 ? '.' + splitStr[1] : '.00';
    splitRight = splitRight + '00';
    splitRight = splitRight.substr(0, 3);
    var regx = /(\d+)(\d{3})/;
    while (regx.test(splitLeft)) {
        splitLeft = splitLeft.replace(regx, '$1' + ',' + '$2');
    }
    return prefix + ' ' + splitLeft + splitRight;
}

$.views.converters({
    number: function (valor) {

        if (!isNaN(parseFloat(valor)))
            return toCurrency(valor, 2, '.', ',');
        else
            return valor;
    },

    fechaFormatter: function (value) {
        var retorno = "";
        value = value.replace(/\//g, "");
        eval("var fechaobj = new Date(" + value + ")");
        retorno = fechaobj.getFullYear() + "-" + (fechaobj.getMonth() + 1) + "-" + fechaobj.getDate();
        //El valor es una fecha con el siguiente formato
        return retorno;
    },

    dateformat: function (value) {
        date= moment(value, 'YYYY-MM-DD HH:mm:ss').format('YYYY/MM/DD hh:mm A');
        return date;
    },


    MonedaMX: function (valor) {
        return mascaraMoneda(valor, '$'); // Funcion que se encuentra en el archivo /js/Utilerias.js
    },
    mascaraNum: function (valor) {
        var num = new Number(valor);
        var fix = num.toFixed(2);
        return fix;
    }
});

$.views.helpers({
    exist: function(val){
        if(val == undefined || val == null || val == ''){
            return false;
        }else{
            return true;
        }
    }
});


$.views.settings.delimiters("{%","%}");
$(document).ready(function () {
    $('.dropdown-submenu a.test').on("click", function(e){
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });
})
