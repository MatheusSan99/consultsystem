@extends('admin.subview.adminHeader')
@include('admin.subview.navbar')
<section id="formulario">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                @if(!empty($message))
                    <div class="text-white alert alert-success bg-success text-center">{{$message}}</div>
                @endif
                <h5 class="card-title text-center">Agendar Consulta</h5>
                <form
                      method="POST"
                      action="{{route('storeNewConsult')}}">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Medico</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="doctor_id" aria-label="Default select example">
                                <option selected>Abrir as Opções</option>
                                @foreach($doctors as $doctor)
                                    <option value={{$doctor->id}}>{{$doctor->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('doctor_id')
                        <small class="bg-danger text-white w-25 rounded" role="alert">Médico Inválido</small>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Paciente</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="pacient_id" aria-label="Default select example">
                                <option selected>Abrir as Opções</option>
                                @foreach($pacients as $pacient)
                                    <option value={{$pacient->id}}>{{$pacient->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('pacient_id')
                        <small class="bg-danger text-white w-25 rounded" role="alert">Paciente Inválido</small>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label for="date" class="col-sm-2 col-form-label">Data da Consulta</label>
                        <div class="col-sm-10">
                            <input type="datetime-local" name="date" class="form-control" ></div>
                        @error('date')
                        <small class="bg-danger text-white w-25 rounded" role="alert">Data Inválida</small>
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
