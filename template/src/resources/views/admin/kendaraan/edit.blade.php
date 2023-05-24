@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.kendaraan.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.kendaraans.update", [$kendaraan->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="kendaraanname">{{ trans('cruds.kendaraan.fields.kendaraanname') }}</label>
                <input class="form-control {{ $errors->has('kendaraanname') ? 'is-invalid' : '' }}" type="text" name="kendaraanname" id="kendaraanname" value="{{ old('kendaraanname', $kendaraan->kendaraanname) }}" required>
                @if($errors->has('kendaraanname'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kendaraanname') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.kendaraan.fields.kendaraanname_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nim">{{ trans('cruds.kendaraan.fields.nim') }}</label>
                <input class="form-control {{ $errors->has('nim') ? 'is-invalid' : '' }}" type="text" name="nim" id="nim" value="{{ old('nim', $kendaraan->nim) }}" required>
                @if($errors->has('nim'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nim') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.kendaraan.fields.nim_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="jenis_kelamin">{{ trans('cruds.kendaraan.fields.jenis_kelamin') }}</label>
                <input class="form-control {{ $errors->has('jenis_kelamin') ? 'is-invalid' : '' }}" type="text" name="jenis_kelamin" id="jenis_kelamin" value="{{ old('jenis_kelamin', $kendaraan->jenis_kelamin) }}" required>
                @if($errors->has('jenis_kelamin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jenis_kelamin') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.kendaraan.fields.jenis_kelamin_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="jurusan">{{ trans('cruds.kendaraan.fields.jurusan') }}</label>
                <input class="form-control {{ $errors->has('jurusan') ? 'is-invalid' : '' }}" type="text" name="jurusan" id="jurusan" value="{{ old('jurusan', $kendaraan->jurusan) }}" required>
                @if($errors->has('jurusan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jurusan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.kendaraan.fields.jurusan_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="fakultas">{{ trans('cruds.kendaraan.fields.fakultas') }}</label>
                <input class="form-control {{ $errors->has('fakultas') ? 'is-invalid' : '' }}" type="text" name="fakultas" id="fakultas" value="{{ old('fakultas', $kendaraan->fakultas) }}" required>
                @if($errors->has('fakultas'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fakultas') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.kendaraan.fields.fakultas_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="jalur">{{ trans('cruds.kendaraan.fields.jalur') }}</label>
                <input class="form-control {{ $errors->has('jalur') ? 'is-invalid' : '' }}" type="text" name="jalur" id="jalur" value="{{ old('jalur', $kendaraan->jalur) }}" required>
                @if($errors->has('jalur'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jalur') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.kendaraan.fields.jalur_helper') }}</span>
            </div>

        
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection