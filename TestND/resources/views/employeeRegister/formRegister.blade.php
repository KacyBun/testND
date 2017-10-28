
@extends('home2')
@section('containercol')

    @if(session('message'))
        <div class="alert alert-danger">
            {{session('message')}}
        </div>
        @endif

    {!! BootForm::open(['url' =>('registro'), 'method' =>'post', 'id'=>'registrarempleado']) !!}

    <div class="row">
        <div class="col-xs-6">
            {!! BootForm::text('name','Nombre',null,['requiered']) !!}
        </div>
        <div class="col-xs-6">
            {!! BootForm::text('email','Email',null,['requiered'])!!}
        </div>
        <div class = "col-xs-6">
            {!! BootForm::date('birthDate','Fecha de Nacimiento',null,['requiered']) !!}
        </div>

        <div class="row" id="agregamasobl" >
            <div class="row col-xs-12">
                <div class="form-group col-xs-5">
                    <label for="Direcciones" class="control-label">
                        Direcciones
                    </label>
                </div>
                <div class="form-group col-xs-2">
                    <label for="Direcciones" class="control-label">
                    </label>
                </div>

            </div>
            <div class="col-xs-12" id="direcciongroup">

            </div>
        </div>
        <div class="col-xs-12" >
            <button id="adicional" name="adicional" type="button" class="btn btn-success"> <i class="fa fa-plus-square" ></i> Agregar otra direccion</button>
        </div>

    </div>



    {!! BootForm::close() !!}

    {!! BootForm::button('Registrar', ['class' => 'btn btn-default','id'=>'guardar']) !!}
@endsection

@push('scripts')
<script type="text/javascript">

    $(document).ready(function() {
        $(function(){
            var htmlobl = $("#manyAddress").render();
            agregainput('adicional','direcciongroup',htmlobl);
            // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
            eliminainput('eliminar');
            // Evento que selecciona la fila y la elimina

            $('#guardar').click(function () {
                if(validar(['address','alias'])){
                    $('#registrarempleado').submit();
                }
            });
            function validar(valores,tipo){
                resp = true;
                if(typeof valores==='object'){
                    var datos = mapear(valores,tipo);
                    Object.keys(datos).forEach(function (key) {
                        if(!validaarray(datos[key],key)){
                            if(resp == true) {
                                resp = false;
                            }
                        }
                    });

                }else{
                    resp=false;
                }
                return resp;
            }
            function mapear(claves,tipo='input'){
                var temp=[];
                if (typeof claves==='object') {
                    $.each( claves, function( key, value ) {
                        temp[value]= $(tipo+"[id='"+value+"']").map(function(){
                            return $(this).val();
                        }).get();
                    });
                } else if(typeof claves==='string') {
                    temp[claves] = $(tipo+"[id='"+claves+"']").map(function () {
                        return $(this).val();
                    }).get();
                } else {
                    temp=false;
                }
                return temp;
            }
            function notificar(campos){
                if (typeof campos==='object') {
                    campos.styling= 'bootstrap3';
                    new PNotify(campos);
                }
            }
            function validaarray(dato,nombre){
                detalle={};
                if (dato.length > 0){
                    Object.keys(dato).forEach(function (key) {
                        if(dato[key]==""){
                            detalle.title='Revisar '+nombre;
                            detalle.text='un campo '+nombre+' esta vacio';
                            notificar(detalle);
                            return false;
                        }
                    });
                    return true;
                }else{
                detalle.title='Revisar '+nombre;
                detalle.text='Debe registrar '+nombre;
                notificar(detalle);
                return false;
                }
                return true;
            }
        });
    });
</script>
@include('employeeRegister.selectaddress')
@endpush
