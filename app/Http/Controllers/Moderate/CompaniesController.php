<?php

namespace App\Http\Controllers\Moderate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;

class CompaniesController extends Controller
{

    public function __construct() {
        $this->middleware(['can:moderate']);
    }
    
    public function moderateCompaniesList() {

        $companies = Company::get()->where('moderated', 'no');

        return view('moderate.companies', ['companies' => $companies]);
    }

    public function moderateCompanyForm(Company $company) {
        return view('moderate.company-form', ['company' => $company]);
    }

    public function moderateCompany(Company $company, Request $request) {

        $company->moderated = $request->moderated;

        if ($request->moderated == 'remoderation') {
            $company->moderationComments = $request->comments;
        }

        $company->save();
        return redirect()->route('moderate.companies');

    }

}
