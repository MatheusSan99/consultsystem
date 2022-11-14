@extends('admin.subview.adminHeader')
@include('admin.subview.navbar')
<section id="formulario">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Formulário de Edição</h5>
                <form enctype="multipart/form-data"
                      method="POST"
                      action="{{route('updatepacient', $pacient->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" value="{{ ($pacient->name)}}"></div>
                        @error('name')
                        <small class="bg-danger text-white w-25 rounded" role="alert">Nome Inválido</small>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label for="cpf" class="col-sm-2 col-form-label">CPF</label>
                        <div class="col-sm-10">
                            <input type="text" step="any" name="cpf" class="form-control" value="{{ ($pacient->cpf)}}"></div>
                        @error('cpf')
                        <small class="bg-danger text-white w-25 rounded" role="alert">CPF Inválido</small>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label for="birth_date" class="col-sm-2 col-form-label">Data de Nascimento</label>
                        <div class="col-sm-10">
                            <input type="text" name="birth_date" class="form-control" value="{{($pacient->birth_date) }}"></div>
                        @error('birth_date')
                        <small class="bg-danger text-white w-25 rounded" role="alert">Data Inválida</small>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label for="cep" class="col-sm-2 col-form-label">CEP</label>
                        <div class="col-sm-10"><input class="form-control" type="text" id="formFile" name="cep"  value="{{($pacient->cep)}}">
                            @error('cep')
                            <small class="bg-danger text-white w-25 rounded" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="adress" class="col-sm-2 col-form-label">Endereço</label>
                        <div class="col-sm-10"><input class="form-control" type="text" id="formFile" name="adress"  value="{{($pacient->adress)}}">
                            @error('adress')
                            <small class="bg-danger text-white w-25 rounded" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="adress" class="col-sm-2 col-form-label">Número da Residencia</label>
                        <div class="col-sm-10"><input class="form-control" type="text" id="formFile" name="number"  value="{{($pacient->adress_number)}}">
                            @error('number')
                            <small class="bg-danger text-white w-25 rounded" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="adress" class="col-sm-2 col-form-label">E-mail</label>
                        <div class="col-sm-10"><input class="form-control" type="email" id="formFile" name="email"  value="{{($pacient->email)}}">
                            @error('email')
                            <small class="bg-danger text-white w-25 rounded" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="cpf" class="col-sm-2 col-form-label">Lista de Telefones</label>
                        <div class="col-sm-10">
                            <input type="text" step="any" name="cpf" class="form-control" value="{{ ($pacient->phone_number_list)}}"></div>
                        @error('cpf')
                        <small class="bg-danger text-white w-25 rounded" role="alert">Telefones Inválido</small>
                        @enderror
                    </div>

                    <div class="text-center">
                        <div class=""><button type="submit" class="btn bg-success text-light">Confirmar</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
