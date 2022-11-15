@extends('admin.subview.adminHeader')
@include('admin.subview.navbar')
<body>
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
    <script src="{{asset('js/admin/viacep.js')}}"></script>
</head>

<section id="formulario">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                @if(!empty($message))
                    <div class="text-white alert alert-success bg-success text-center">{{$message}}</div>
                @endif
                <h5 class="card-title text-center">Novo Cadastro</h5>
                <form enctype="multipart/form-data"
                      method="POST"
                      action="{{route('storeNewPacient')}}">
                    @csrf
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control"></div>
                        @error('name')
                        <small class="bg-danger text-white w-25 rounded" role="alert">Nome Inválido</small>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <label for="birth_date" class="col-sm-2 col-form-label">Data de Nascimento</label>
                        <div class="col-sm-10">
                            <input type="date" name="birth_date" class="form-control"></div>
                        @error('birth_date')
                        <small class="bg-danger text-white w-25 rounded" role="alert">Data Inválida</small>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <label for="cpf" class="col-sm-2 col-form-label">CPF</label>
                        <div class="col-sm-10">
                            <input type="text" name="cpf" class="form-control"></div>
                        @error('cpf')
                        <small class="bg-danger text-white w-25 rounded" role="alert">CPF Inválido</small>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label for="phone_number_first" class="col-sm-2 col-form-label">Telefone</label>
                        <div class="col-sm-10">
                            <input type="text" name="phone_number_first" class="form-control"></div>
                        @error('phone_number_first')
                        <small class="bg-danger text-white w-25 rounded" role="alert">Telefone Inválido</small>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <label for="phone_number_second" class="col-sm-2 col-form-label">Telefone Recado</label>
                        <div class="col-sm-10">
                            <input type="text" name="phone_number_second" class="form-control"></div>
                        @error('phone_number_second')
                        <small class="bg-danger text-white w-25 rounded" role="alert">Telefone Inválido</small>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label for="phone_number_third" class="col-sm-2 col-form-label">Telefone</label>
                        <div class="col-sm-10">
                            <input type="text" name="phone_number_third" class="form-control"></div>
                        @error('phone_number_third')
                        <small class="bg-danger text-white w-25 rounded" role="alert">Telefone Inválido</small>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label for="adress" class="col-sm-2 col-form-label">E-mail</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="email" id="formFile" name="email">
                            @error('email')
                            <small class="bg-danger text-white w-25 rounded" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="cep" class="col-sm-2 col-form-label">CEP</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="cep" name="cep"
                                   onblur="pesquisacep(this.value);">
                            @error('cep')
                            <small class="bg-danger text-white w-25 rounded" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="adress" class="col-sm-2 col-form-label">Endereço</label>
                        <div class="col-sm-10"><input class="form-control" type="text" id="rua" name="adress">
                            @error('adress')
                            <small class="bg-danger text-white w-25 rounded" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="city" class="col-sm-2 col-form-label">Cidade</label>
                        <div class="col-sm-10"><input class="form-control" type="text" id="cidade" name="city">
                            @error('city')
                            <small class="bg-danger text-white w-25 rounded" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    @if(request()->session()->get('status') !== null)
                        <div class="row mb-3">
                            <label for="responsable_name" class="col-sm-2 col-form-label">Nome do Responsável</label>
                            <div class="col-sm-10"><input class="form-control" type="text" id="formFile"
                                                          name="responsable_name">
                                @error('responsable_name')
                                <small class="bg-danger text-white w-25 rounded" role="alert">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="responsable_cpf" class="col-sm-2 col-form-label">CPF do Responsável</label>
                            <div class="col-sm-10"><input class="form-control" type="text" id="formFile"
                                                          name="responsable_cpf">
                                @error('responsable_cpf')
                                <small class="bg-danger text-white w-25 rounded" role="alert">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    @endif


                    <div class="text-center">
                        <div class="">
                            <button type="submit" class="btn bg-success text-light">Confirmar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
