@extends('admin.subview.adminHeader')
@include('admin.subview.navbar')
@section('search')
    <div class="search-bar p-3 ">
        <form class="search-form d-flex align-items-center" method="GET" autocomplete="off">
            <input type="text" name="search" placeholder="Pesquisar Pacientes" title="Procurar Pacientes"><button type="submit"><i class="bi bi-search"></i></button>
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
                <h5 class="card-title text-center">Lista de Pacientes</h5>
                <table class="table table-striped table-hover table-scrollable">
                    <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Cpf</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Cep</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($pacients as $pacient)
                        <tr>

                            <td>{{ $pacient->name }}</td>

                            <td>{{ $pacient->cpf }}</td>

                            <td>{{ $pacient->phone_number_list_id }}</td>

                            <td>{{ $pacient->cep }}</td>


{{--                            @foreach($categories as $category)--}}
{{--                                @if($category->id == $product->category_id)--}}
{{--                                    <td>{{ $category->name }}</td>--}}
{{--                                @endif--}}
{{--                            @endforeach--}}

                            <td>
                                <a href="{{route('editpacient', $pacient->id)}}">
                                    <img src="{{asset('img/icone/edit.png')}}" width="20px" alt="editar item">
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
