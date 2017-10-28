@extends('home')
@section('contentx')
<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Listado<small>Empleados</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Alias</th>
                        <th>Dirección</th>
                    </tr>
                    </thead>
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{$employee->name}}</td>
                            <td>{{$employee->email}}</td>
                            <td>{{$employee->birthDate}}</td>
                            <td>{{$employee->detailempapp[0]->address->alias}}</td>
                            <td>{{$employee->detailempapp[0]->address->address}}</td>
                        </tr>
                    @endforeach

                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
</div>
@endsection