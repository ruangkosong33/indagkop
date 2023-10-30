<?php

namespace App\Http\Controllers\AboutUs;

use App\Models\Policy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class PolicyController extends Controller
{
    public function index()
    {
        $policy=Policy::orderBy('id')->get();

        return view('admin.pages.policy.index-policy', ['policy'=>$policy]);
    }

    public function create()
    {
        return view('admin.pages.policy.create-policy');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title_policy'=>'required',
            'description'=>'required',
        ]);

        $policy=Policy::create([
            'title_policy'=>$request->title_policy,
            'description'=>$request->description,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Simpan');

        return redirect()->route('policy.index');
    }

    public function edit(Policy $policy)
    {
        return view('admin.pages.policy.edit-policy', ['policy'=>$policy]);
    }

    public function update(Request $request, Policy $policy)
    {
        $this->validate($request, [
            'title_policy'=>'required',
            'description'=>'required',
        ]);

        $policy->update([
            'title_policy'=>$request->title_policy,
            'description'=>$request->description,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Update');

        return redirect()->route('policy.index');
    }

    public function destroy(Policy $policy)
    {
        $policy=Policy::where('id', $policy->id)->delete();

        Alert::success('Berhasil', 'Data Berhasil Di Hapus');

        return redirect()->route('policy.index');
    }
}
