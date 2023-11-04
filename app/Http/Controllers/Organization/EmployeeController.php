<?php

namespace App\Http\Controllers\Organization;

use App\Models\Division;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeeController extends Controller
{
    public function index()
    {
        $employee=Employee::with(['division'])->get();

        return view('admin.pages.employee.index-employee', ['employee'=>$employee]);
    }

    public function create()
    {
        $division=Division::orderBy('id')->get();

        return view('admin.pages.employee.create-employee', ['division'=>$division]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'nip'=>'required',
            'image'=>'mimes:jpeg,png,jpg|max:10000|nullable',
            'level'=>'required',
            'position'=>'required',
            'education'=>'required',
            'pim'=>'required',
        ]);

        if($request->file('image'))
        {
            $file=$request->file('image');
            $extension=$file->getClientOriginalName();
            $images=$extension;
            $file->storeAs('public/uploads/image-employee', $images);
        }
            $images='';

        $employee=Employee::create([
            'division_id'=>$request->division_id,
            'name'=>$request->name,
            'nip'=>$request->nip,
            'image'=>$images,
            'level'=>$request->level,
            'position'=>$request->position,
            'education'=>$request->education,
            'pim'=>$request->pim,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Simpan');

        return redirect()->route('employee.index');
    }

    public function edit(Employee $employee)
    {
        $division=Division::all();

        return view('admin.pages.employee.edit-employee', ['division'=>$division, 'employee'=>$employee]);
    }

    public function update(Request $request, Employee $employee)
    {
        $this->validate($request, [
            'name'=>'required',
            'nip'=>'required',
            'image'=>'mimes:jpeg,png,jpg|max:10000',
            'level'=>'required',
            'position'=>'required',
            'education'=>'required',
            'pim'=>'required',
        ]);

        $images=$employee->image;

        if($request->file('image'))
        {
            $file=$request->file('image');
            $extension=$file->getClientOriginalName();
            $images=$extension;
            $file->storeAs('uploads/image-employee', $images);
        }
            unset($employee ['image']);

        $employee->update([
            'division_id'=>$request->division_id,
            'name'=>$request->name,
            'nip'=>$request->nip,
            'image'=>$images,
            'level'=>$request->level,
            'position'=>$request->position,
            'education'=>$request->education,
            'pim'=>$request->pim,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Update');

        return redirect()->route('employee.index');
    }

    public function destroy(Employee $employee)
    {
        $employee=Employee::where('id', $employee->id)->delete();

        Alert::success('Berhasil', 'Data Berhasil Di Hapus');

        return redirect()->route('employee.index');
    }
}
