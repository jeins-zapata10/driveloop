<style>
:root {
    --colorprincipal: #c81843;
    --colorsecundario: #9a1b39;
    --negro: #282828;
}

.body-tarjeta {
    font-size: 62.5%;
    margin: 0;
    padding: 0;
}

h1 {
    font-family: "Roboto", sans-serif;
    font-weight: bold;
    font-size: 36px;
}

h2 {
    font-family: "Roboto", sans-serif;
    font-weight: 400;
    font-size: 20px;
}

h3 {
    font-family: "Roboto", sans-serif;
    font-weight: bold;
    font-size: 18px;
}

.vehtitulo {
    text-transform: uppercase;
    margin-top: 10px;
}

h4 {
    font-family: "Roboto", sans-serif;
    font-size: 13px;
    font-weight: 400;
}

.subtitulo {
    font-weight: lighter;
    font-size: 20px;
}

.contenedor {
    background-image: url(../ICONOS/FONDO.jpg);
    background-color: #1f1f1f;
    max-width: 100vw;
    background-size: cover;
    background-repeat: no-repeat;
    height: 100vh;
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.text-princ {
    margin-left: 300px;
    margin-bottom: 86px;
}

.fondo-auto {
    padding-top: 20px;
    padding-left: 10px;
}

.tarjeta {
    width: 330px;
    height: 361px;
    background-color: white;
    color: var(--negro);
    border-radius: 10px;
}

.icon-estrella {
    width: 21px;
}

.icon-ubi {
    width: 13px;
}

.icon-perso {
    width: 12px;
}

.info-iconos {
    display: flex;
    gap: 38px;
}

.icono {
    display: flex;
    gap: 7px;
    margin-top: 6px;
}

.icon-p {
    margin-top: 22px;
    margin-bottom: 8px;
}

.tarj-content {
    display: flex;
    justify-content: center;
    gap: 23px;
}

.info {
    margin: 0 38px;
}

.buttom-princ {
    display: flex;
}

.precio {
    background-color: var(--negro);
    font-size: 16;
    color: white;
    width: 127px;
    text-align: center;
    line-height: 3;
    font-weight: lighter;
}

.rentar {
    background-color: var(--colorprincipal);
    font-size: 16;
    color: white;
    text-transform: uppercase;
    width: 127px;
    text-align: center;
    line-height: 3;
    font-weight: lighter;
}

.buttom-princ h3:hover {
    cursor: pointer;
}
</style>

<!-- @if(count($vehiculos) > 0)
    @foreach($vehiculos as $vehiculo)
        <div class="tarjeta">
            <img class="fondo-auto" src="{{ asset('storage/' . $vehiculo->foto) }}" alt="Vehículo">
            <div class="info-tarjeta">
                <div class="info">
                    <h2 class="vehtitulo">{{ $vehiculo->descripcion ?? 'Vehículo' }}</h2>
                    
                    <div class="info-iconos">
                        <div class="icono">
                            <img class="icon-estrella" src="{{ asset('ICONOS/ICONOS-17.png') }}" alt="icono estrella">
                            <h2>{{ $vehiculo->calificacion ?? 'N/A' }}</h2>
                        </div>
                        <div class="icono">
                            <img class="icon-ubi" src="{{ asset('ICONOS/ICONOS-16.png') }}" alt="icono ubicacion">
                            <h2>{{ $vehiculo->ciudad ?? 'No especificada' }}</h2>
                        </div>
                    </div>
                    
                    <div class="icono icon-p">
                        <img class="icon-perso" src="{{ asset('ICONOS/ICONOS-18.png') }}" alt="icono persona">
                        <h4>{{ $vehiculo->pas }} Personas</h4>
                    </div>
                    
                    <div class="buttom-princ">
                        <h3 class="precio">${{ number_format($vehiculo->precio_dia, 0, ',', '.') }} / día</h3>
                        <h3 class="rentar">Rentar</h3>
                           
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="sin-resultados">
        No hay vehículos disponibles con los filtros seleccionados.
    </div>
@endif -->

@if(count($vehiculos) > 0)
@foreach($vehiculos as $vehiculo)
<div class="tarjeta">
    <!-- Asegúrate de que el campo 'foto' exista en tu modelo -->
    @if($vehiculo->foto)
    <img class="fondo-auto" src="{{ asset('storage/' . $vehiculo->foto) }}" alt="{{ $vehiculo->marca ?? 'Vehículo' }}">
    @else
    <img class="fondo-auto" src="{{ asset('ICONOS/AUTO.jpg') }}" alt="Vehículo sin foto">
    @endif

    <div class="info-tarjeta">
        <div class="info">
            <!-- Verifica si tienes campos 'marca' y 'modelo' o si es diferente -->
            <h2 class="vehtitulo">
                @if($vehiculo->marca && $vehiculo->modelo)
                {{ $vehiculo->marca }} {{ $vehiculo->modelo }}
                @elseif($vehiculo->descripcion)
                {{ $vehiculo->descripcion }}
                @else
                Vehículo #{{ $vehiculo->id }}
                @endif
            </h2>

            <div class="info-iconos">
                <div class="icono">
                    <img class="icon-estrella" src="{{ asset('ICONOS/ICONOS-17.png') }}" alt="icono estrella">
                    <h2>{{ $vehiculo->calificacion ?? 'N/A' }}</h2>
                </div>
                <div class="icono">
                    <img class="icon-ubi" src="{{ asset('ICONOS/ICONOS-16.png') }}" alt="icono ubicacion">
                    <!-- Verifica si tienes campo 'ubicacion' o es diferente -->
                    <h2>{{ $vehiculo->ubicacion ?? $vehiculo->ciudad ?? 'No especificada' }}</h2>
                </div>
            </div>

            <div class="icono icon-p">
                <img class="icon-perso" src="{{ asset('ICONOS/ICONOS-18.png') }}" alt="icono persona">
                <!-- Usa 'pas' que es el campo en tu consulta -->
                <h4>{{ $vehiculo->pas ?? '4' }} Personas</h4>
            </div>

            <div class="buttom-princ">
                <!-- Asegúrate del campo de precio -->
                @if($vehiculo->precio_dia)
                <h3 class="precio">${{ number_format($vehiculo->precio_dia, 0, ',', '.') }} / día</h3>
                @elseif($vehiculo->precio)
                <h3 class="precio">${{ number_format($vehiculo->precio, 0, ',', '.') }} / día</h3>
                @else
                <h3 class="precio">Consultar precio</h3>
                @endif

                <!-- Enlace para reservar pasando los parámetros del formulario -->
                @php
                $routeParams = ['id' => $vehiculo->id];
                if(request()->has('pickup_date')) {
                $routeParams['pickup_date'] = request('pickup_date');
                }
                if(request()->has('return_date')) {
                $routeParams['return_date'] = request('return_date');
                }
                if(request()->has('pickup_time')) {
                $routeParams['pickup_time'] = request('pickup_time');
                }
                if(request()->has('return_time')) {
                $routeParams['return_time'] = request('return_time');
                }
                @endphp

                <h3 class="rentar">Rentar</h3>
                </a>
            </div>
        </div>
    </div>
</div>
@endforeach
@else
<!-- Mostrar cuando no hay resultados -->
<div class="no-resultados" style="grid-column: 1 / -1; text-align: center; padding: 40px; color: #666;">
    <h3>No se encontraron vehículos disponibles</h3>
    <p>Intenta con otros criterios de búsqueda</p>

</div>
@endif