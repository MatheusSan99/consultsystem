@extends('admin.subview.adminHeader')
@include('admin.subview.navbar')
@section('search')
    <div class="search-bar p-3 ">
        <form class="search-form d-flex align-items-center" method="GET" autocomplete="off">
            <input type="text" name="search" placeholder="Pesquisar Médico" title="Procurar Médico"><button type="submit"><i class="bi bi-search"></i></button>
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
                <h5 class="card-title text-center">Lista de Médicos</h5>
                <table class="table table-striped table-hover table-scrollable">
                    <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Especialidade</th>
                        <th scope="col">CRM</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($doctors as $doctor)
                        <tr>
                            <td>{{ $doctor->name }}</td>
                        @foreach($specialtys as $category)
                                @if($category->id == $doctor->function_id)
                                    <td>{{ $category->name }}</td>
                                @endif
                            @endforeach
                            <td>{{ $doctor->crm }}</td>

                            <td>
                                <a href="{{route('editDoctor', $doctor->id)}}">
                                    <img src="{{asset('img/icone/edit.png')}}" width="20px" alt="editar item">
                                </a>
                            </td>
                            <form method="POST" action="{{route('destroyDoctor', $doctor->id)}}" onsubmit="return confirm('Deseja Remover {{addslashes($doctor->name)}}? Esta ação não poderá ser desfeita.')">
                                @method('DELETE')
                                @csrf
                                <td>
                                    <button type="submit" class="border-0"><img src="{{asset('img/icone/recycle-bin.png')}}" width="20px" alt="apagar item">
                                    </button>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

