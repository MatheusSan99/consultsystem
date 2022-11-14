@extends('admin.subview.adminHeader')
@include('admin.subview.navbar')
<section id="formulario">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Formulário de Edição</h5>
                <form enctype="multipart/form-data"
                      method="POST"
                      action="{{route('updateDoctor', $doctors->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" value="{{ ($doctors->name)}}"></div>
                        @error('name')
                        <small class="bg-danger text-white w-25 rounded" role="alert">Nome Inválido</small>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label for="crm" class="col-sm-2 col-form-label">CRM</label>
                        <div class="col-sm-10">
                            <input type="text" name="crm" class="form-control" value="{{ ($doctors->crm)}}"></div>
                        @error('crm')
                        <small class="bg-danger text-white w-25 rounded" role="alert">CRM Inválido</small>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Especialidades</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="function_id" required>
                                <option selected >Abrir as Opções</option>
                                @foreach($specialtys as $category)
                                    <option  value={{$category->id}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @error('category_id')
                    <small class="bg-danger text-white w-25 rounded" role="alert">Insira a Categoria</small>
                    @enderror
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
