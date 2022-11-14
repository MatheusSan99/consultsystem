@extends('admin.subview.adminHeader')
@include('admin.subview.navbar')
<section id="formulario">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Nova Especialidade</h5>
                <form
                      method="POST"
                      action="{{route('storeNewSpecialty')}}">
                    @csrf
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control"></div>
                        @error('name')
                        <small class="bg-danger text-white w-25 rounded" role="alert">Nome Inválido</small>
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
