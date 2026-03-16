@extends('adminlte::page')

@section('title', 'Registro de tickets')

@section('content_header')
    <h1>Registro de tickets</h1>
@endsection

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Nuevo ticket</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.tickets.store') }}">
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
                    <input type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}">
                    @error('description')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="priority">Prioridad</label>
                    <select name="priority" id="priority" class="form-control @error('priority') is-invalid @enderror" value="{{ old('tickets') }}">
                        <option value="">Selecciona una opción</option>
                        <option value="alta">Alta</option>
                        <option value="media">Media</option>
                        <option value="baja">Baja</option>
                    </select>
                    @error('tickets')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tech">Técnico</label>
                    <input type="text" name="tech" id="tech" class="form-control @error('tech') is-invalid @enderror" value="{{ old('tech') }}">
                    @error('tech')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Listado de tickets</h3>
        </div>
        <div class="card-body">
            @if($tickets->isEmpty())
                <p>No hay tickets registrados aún.</p>
            @else
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>title</th>
                            <th>description</th>
                            <th>priority</th>
                            <th>tech</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tickets as $ticket)
                            <tr>
                                <td>{{ $ticket->id }}</td>
                                <td>{{ $ticket->title }}</td>
                                <td>{{ $ticket->description }}</td>
                                <td>{{ $ticket->priority }}</td>
                                <td>{{ $ticket->tech }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
