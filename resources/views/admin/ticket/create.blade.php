@extends('adminlte::page')

@section('title', 'Crear Ticket')

@section('content_header')
    <h1>Crear Nuevo Ticket</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Nuevo Ticket</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.ticket.store') }}">
                @csrf

                <div class="form-group">
                    <label for="title">Título</label>
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                    @error('title')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="priority">Prioridad</label>
                    <select name="priority" id="priority" class="form-control @error('priority') is-invalid @enderror">
                        <option value="">Selecciona una opción</option>
                        <option value="alta" {{ old('priority') == 'alta' ? 'selected' : '' }}>Alta</option>
                        <option value="media" {{ old('priority') == 'media' ? 'selected' : '' }}>Media</option>
                        <option value="baja" {{ old('priority') == 'baja' ? 'selected' : '' }}>Baja</option>
                    </select>
                    @error('priority')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tech">Técnico Asignado</label>
                    <input type="text" name="tech" id="tech" class="form-control @error('tech') is-invalid @enderror" value="{{ old('tech') }}">
                    @error('tech')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Guardar Ticket</button>
            </form>
        </div>
    </div>
@endsection