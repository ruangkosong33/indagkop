@extends('admin.layouts.b-master')

@section('title', 'Sejarah Dinas')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Sejarah Dinas</li>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <x-card>
                <x-slot name="header">
                    @foreach ($historical as $historicals)
                    @if($historical->isEmpty())
                        <a href="{{route('historical.create')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</a>
                    @else
                        <a href="{{route('historical.edit', $historicals->id)}}" class="btn btn-warning"><i class="fas fa-plus-circle"></i> Edit</a>
                    @endif
                    @endforeach
                </x-slot>

                <x-table>
                    <x-slot name="thead">
                        <th>Judul</th>
                        <th>Deskripsi</th>
    
                    </x-slot>
                        @foreach ($historical as $historicals)
                        <tr>
                            <td width="38%">Sub Judul</td>
                            <td>{{$historicals->title_historical}}</td>
                        </tr>
                        <tr>
                            <td width="38%">Deskripsi</td>
                            <td>{!!$historicals->description!!}</td>
                        </tr>
                        @endforeach
                </x-table>
            </x-card>
        </div>
    </div>

@endsection

