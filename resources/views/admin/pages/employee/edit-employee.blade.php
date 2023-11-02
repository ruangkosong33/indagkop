@extends('admin.layouts.b-master')

@section('title', 'Pegawai')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{route('employee.index')}}">Data Pegawai</a></li>
    <li class="breadcrumb-item active">Edit Pegawai</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{route('employee.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <x-card>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="name" placeholder="Pegawai">

                        @error('name')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" placeholder="Deskripsi">
                    
                        @error('nip')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror

                    </div>
                    
                    <div class="form-group">
                        <label for="division">Unit Kerja</label>
                        <select name="division" class="form-control @error('title_division') is-invalid @enderror">

                            <option value="">--Pilih--</option>
                            @foreach ($division as $divisions)
                            <option value={{$divisions->id}}>{{$divisions->title_division}}</option>
                            @endforeach

                        </select>

                        @error('title_division')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    
                    </div>

                    <div class="form-group">
                        <label for="position">Jabatan</label>
                        <input type="text" class="form-control @error('position') is-invalid @enderror" name="position" placeholder="Jabatan">
                    
                        @error('position')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="education">Pendidikan</label>
                        <input type="text" class="form-control @error('education') is-invalid @enderror" name="education" placeholder="Riwayat Pendidikan">
                    
                        @error('education')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="pim">Diklat</label>
                        <input type="text" class="form-control @error('pim') is-invalid @enderror" name="pim" placeholder="Riwayat Pim">
                    
                        @error('pim')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror

                    </div>

                    <x-slot name="footer">
                        <button type="reset" class="btn btn-dark">Reset</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </x-slot>
                </x-card>
            </form>
        </div>
    </div>
@endsection
