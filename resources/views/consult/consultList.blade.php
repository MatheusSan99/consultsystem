@extends('admin.subview.adminHeader')
@include('admin.subview.navbar')
@section('search')
    <div class="search-bar p-3 ">
        <form class="search-form d-flex align-items-center" method="GET" autocomplete="off">
            <input type="text" name="search" placeholder="Pesquisar Especialidade" title="Procurar Especialidade"><button type="submit"><i class="bi bi-search"></i></button>
        </form>
    </div>
@endsection
<section id="products">
    <div class="col-xs-4 col-sm-6">
        <div class="card">
            <div class="card-body">
                @if(!empty($message))
                    <div class="text-white alert alert-success bg-success text-center">{{$message}}</div>
                @endif
                <h5 class="card-title text-center">Lista de Consultas</h5>
                <table class="table table-striped table-hover table-scrollable">
                    <thead>
                    <tr>
                        <th scope="col">Médico</th>
                        <th scope="col">Paciente</th>
                        <th scope="col">Data da Consulta</th>
                        <th scope="col">Data de Agendamento</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($consults as $consult)
                            <tr>
                                @foreach($doctors as $doctor)
                                    @if($consult->doctor_id == $doctor->id)
                                        <td>{{ $doctor->name }}</td>
                                    @endif
                                @endforeach

                                @foreach($pacients as $pacient)
                                        @if($consult->pacient_id == $pacient->id)
                                            <td>{{ $pacient->name }}</td>
                                        @endif
                                @endforeach

                                <td>{{ \Illuminate\Support\Carbon::parse($consult->date)->format('d/m/Y H:i') }}</td>
                                <td>{{ \Illuminate\Support\Carbon::parse($consult->created_at)->format('d/m/Y H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

