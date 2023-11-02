@extends('admin.layouts.b-master')

@section('title', 'Bidang & UPTD')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{route('division.index')}}">Bidang & UPTD</a></li>
    <li class="breadcrumb-item active">Tambah Bidang & UPTD</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{route('division.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <x-card>
                    <div class="form-group">
                        <label for="title_division">Unit Kerja</label>
                        <input type="text" class="form-control @error('title_division') is-invalid @enderror" name="title_division" placeholder="Bidang / UPTD">

                        @error('title_division')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Deskripsi"></textarea>
                    
                        @error('description')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror

                    </div>
                    
                    <div class="form-group">
                        <label for="image">Gambar</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                        
                        @error('image')
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
