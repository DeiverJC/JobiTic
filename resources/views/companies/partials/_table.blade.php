<div class="col-md-12">
@foreach($data as $dt)
    <h3 class="alert alert-danger">Información básica</h3>
    <table class="table table-hover">
        <tbody>
            <tr>
                <th>Razón social</th>
                <td colspan="3">{{ $dt->business_name }}</td>
            </tr>
            <tr>
                <th>Actividad Económica</th>
                <td colspan="3">{{ $dt->economic_activity }}</td>
            </tr>
            <tr>
                <th>Representante Legal</th>
                <td colspan="3">{{ $dt->legal_repre }}</td>
            </tr>
            <tr>
                <th>Correo Representane Legal</th>
                <td colspan="3">{{ Auth::user()->email }}</td>
            </tr>
            <tr>
                <th>Número de Trabajadores</th>
                <td colspan="3">{{ $dt->num_workers }}</td>
            </tr>
            <tr>
                <th>Tipo de Empresa</th>
                <td colspan="3">{{ $dt->type_company }}</td>
            </tr>
            <tr>
                <th>Naturaleza</th>
                <td colspan="3">{{ $dt->nature }}</td>
            </tr>
            <tr>
                <th>Jerarquía</th>
                <td colspan="3">{{ $dt->hierarchy }}</td>
            </tr>
        </tbody>
    </table>
</div>
<div class="col-md-12">
    <h3 class="alert alert-danger">Localizacion de la empresa</h3>
    <table class="table table-hover">
        <tbody>
            <tr>
                <th>País</th>
                <td colspan="3">{{ $location->country_name }}</td>
            </tr>
            <tr>
                <th>Departamento</th>
                <td colspan="3">{{ $location->state_name }}</td>
            </tr>
            <tr>
                <th>Ciudad</th>
                <td colspan="3">{{ $location->city_name }}</td>
            </tr>
            <tr>
                <th>Dirección</th>
                <td colspan="3">{{ $dt->address }}</td>
            </tr>
            <tr>
                <th>Teléfono</th>
                <td colspan="3">{{ $dt->phone_indic}} <strong>{{ $dt->phone_num }}</strong> {{ $dt->phone_ext }}</td>
            </tr>
            <tr>
                <th>Teléfono alterno</th>
                <td colspan="3">{{ $dt->phone2_indic}} <strong>{{ $dt->phone2_num }}</strong> {{ $dt->phone2_ext }}</td>
            </tr>
            <tr>
                <th>Celular</th>
                <td colspan="3">{{ $dt->celphone }}</td>
            </tr>
            <tr>
                <th>Página web</th>
                <td colspan="3">{{ $dt->website }}</td>
            </tr>
        </tbody>
    </table>
</div>
<div class="col-md-12">
    <h3 class="alert alert-danger">Información de contacto</h3>
    <table class="table table-hover">
        <tbody>
            <tr>
                <th>Nombre y Apellido</th>
                <td colspan="3">{{ $dt->name }} {{ $dt->surnames }}</td>
            </tr>
            <tr>
                <th>Cargo</th>
                <td colspan="3">{{ $dt->position }}</td>
            </tr>
            <tr>
                <th>Correo electrónico</th>
                <td colspan="3">{{ $dt->email }}</td>
            </tr>
            <tr>
                <th>Teléfono</th>
                <td colspan="3">{{ $dt->phone_indic_hr}} <strong>{{ $dt->phone_num_hr }}</strong> {{ $dt->phone_ext_hr }}</td>
            </tr>
            <tr>
                <th>Teléfono alterno</th>
                <td colspan="3">{{ $dt->phone2_indic_hr}} <strong>{{ $dt->phone2_num_hr }}</strong> {{ $dt->phone2_ext_hr }}</td>
            </tr>
        </tbody>
    </table>
@endforeach
</div>
