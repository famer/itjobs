<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class CompanyController extends Controller
{

    public function __construct() {
        $this->middleware(['auth']);
    }

    public function index() {
        if (!Gate::allows('create-company')) {
            abort(403);
        }
        $companies = auth()->user()->companies->where('moderated', 'yes');
        $onModeration = auth()->user()->companies->where('moderated', 'no');
        $toEdit = auth()->user()->companies->where('moderated', 'remoderation');
        return view('company.index', [
            'companies' => $companies,
            'onModeration' => $onModeration,
            'toEdit' => $toEdit,
        ]);
    }

    public function editForm(Company $company) {
        if (!Gate::allows('update-company', $company)) {
            abort(403);
        }
        return view('company.edit-form', [ 'company' => $company ]);
    }

    public function edit(Company $company, Request $request) {

        // Check if company belongs to current user
        if (!Gate::allows('update-company', $company)) {
            abort(403);
        }
        $company->name = $request->name;
        $company->moderated = 'no';
        $company->save();
        return redirect()->route('company', $company);
    }

    public function company(Company $company) {

        // Make company available for adding positions while on moderation
        if (!$company->moderated) {
            
            //return 'Not moderated';
        }
        return view('company.show', [
            'company' => $company,
        ]);
    }

    public function store(Request $request) {

        if (!Gate::allows('create-company')) {
            abort(403);
        }
        Company::create([
            'name' => $request->name,
            'user_id' => auth()->user()->id,
        ]);
        return back()->with('status', __('company.On moderation'));
    }
}
