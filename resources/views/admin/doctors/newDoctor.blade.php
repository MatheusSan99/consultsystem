@extends('admin.subview.adminHeader')
@include('admin.subview.navbar')
<section id="formulario">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Novo Médico</h5>
                <form
                    method="POST"
                    action="{{route('storeNewDoctor')}}">
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
                        <label class="col-sm-2 col-form-label">Especialidades</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="function_id" aria-label="Default select example">
                                <option selected>Abrir as Opções</option>
                                @foreach($specialtys as $specialty)
                                    <option value={{$specialty->id}}>{{$specialty->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="crm" class="col-sm-2 col-form-label">CRM</label>
                        <div class="col-sm-10">
                            <input type="text" name="crm" class="form-control"></div>
                        @error('crm')
                        <small class="bg-danger text-white w-25 rounded" role="alert">CRM Inválido</small>
                        @enderror
                    </div>
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
