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
        return view('company.index', ['companies' => $companies]);
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
        return back();
    }
}
