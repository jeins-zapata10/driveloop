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