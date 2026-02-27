<div class="space-y-4">
    @if(isset($resenas) && $resenas->count() > 0)
        @foreach ($resenas as $resena)
            <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 shadow-sm">
                <div class="flex justify-between items-start">
                    <div>
                        <div class="text-yellow-400 text-lg">
                            @for ($i = 1; $i <= 5; $i++)
                                {{ $i <= $resena->puntuacion ? '★' : '☆' }}
                            @endfor
                        </div>
                        <p class="text-xs text-gray-500 mt-1">
                            Reserva #{{ $resena->codres }} | 
                            {{ \Carbon\Carbon::parse($resena->fec)->format('d/m/Y') }}
                        </p>
                    </div>
                </div>
                
                <p class="text-gray-700 mt-3 text-sm italic">"{{ $resena->des }}"</p>

                @if($resena->respuesta_propietario)
                    <div class="mt-3 bg-indigo-50 p-2 rounded text-xs text-indigo-900 border-l-4 border-indigo-400">
                        <strong>Tu respuesta:</strong> {{ $resena->respuesta_propietario }}
                    </div>
                @endif
            </div>
        @endforeach
        
        <div class="mt-4">
            {{ $resenas->links() }}
        </div>
    @else
        <div class="text-center py-8">
            <p class="text-gray-400 italic">No tienes reseñas registradas aún.</p>
        </div>
    @endif
</div>
