<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyKendaraanRequest;
use App\Http\Requests\StoreKendaraanRequest;
use App\Http\Requests\UpdateKendaraanRequest;
use App\Models\Kendaraan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class KendaraanController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('kendaraan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Kendaraan::query()->select(sprintf('%s.*', (new Kendaraan)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'kendaraan_show';
                $editGate      = 'kendaraan_edit';
                $deleteGate    = 'kendaraan_delete';
                $crudRoutePart = 'kendaraans';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('kendaraanname', function ($row) {
                return $row->kendaraanname ? $row->kendaraanname : '';
            });
            $table->editColumn('nim', function ($row) {
                return $row->nim ? $row->nim : '';
            });
            $table->editColumn('jenis_kelamin', function ($row) {
                return $row->jenis_kelamin ? $row->jenis_kelamin : '';
            });
            $table->editColumn('jurusan', function ($row) {
                return $row->jurusan ? $row->jurusan : '';
            });
            $table->editColumn('fakultas', function ($row) {
                return $row->fakultas ? $row->fakultas : '';
            });
            $table->editColumn('jalur', function ($row) {
                return $row->jalur ? $row->jalur : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.kendaraans.index');
    }

    public function create()
    {
        abort_if(Gate::denies('kendaraan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kendaraans.create');
    }

    public function store(StoreKendaraanRequest $request)
    {
        $kendaraan = Kendaraan::create($request->all());

        return redirect()->route('admin.kendaraans.index');
    }

    public function edit(Kendaraan $kendaraan)
    {
        abort_if(Gate::denies('kendaraan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kendaraans.edit', compact('kendaraan'));
    }

    public function update(UpdateKendaraanRequest $request, Kendaraan $kendaraan)
    {
        $kendaraan->update($request->all());

        return redirect()->route('admin.kendaraans.index');
    }

    public function show(Kendaraan $kendaraan)
    {
        abort_if(Gate::denies('kendaraan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kendaraans.show', compact('kendaraan'));
    }

    public function destroy(Kendaraan $kendaraan)
    {
        abort_if(Gate::denies('kendaraan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kendaraan->delete();

        return back();
    }

    public function massDestroy(MassDestroyKendaraanRequest $request)
    {
        $kendaraans = Kendaraan::find(request('ids'));

        foreach ($kendaraans as $kendaraan) {
            $kendaraan->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
