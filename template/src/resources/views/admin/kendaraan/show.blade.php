@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.kendaraan.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.kendaraans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.kendaraan.fields.id') }}
                        </th>
                        <td>
                            {{ $kendaraan->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kendaraan.fields.kendaraanname') }}
                        </th>
                        <td>
                            {{ $kendaraan->kendaraanname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kendaraan.fields.nim') }}
                        </th>
                        <td>
                            {{ $kendaraan->nim }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.kendaraan.fields.jenis_kelamin') }}
                        </th>
                        <td>
                            {{ $kendaraan->jenis_kelamin }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.kendaraan.fields.jurusan') }}
                        </th>
                        <td>
                            {{ $kendaraan->jurusan }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.kendaraan.fields.fakultas') }}
                        </th>
                        <td>
                            {{ $kendaraan->fakultas }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.kendaraan.fields.jalur') }}
                        </th>
                        <td>
                            {{ $kendaraan->jalur }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.kendaraans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection