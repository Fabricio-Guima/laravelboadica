<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlanController extends Controller
{
    private $repository;
    public function __construct(Plan $plan)
    {
     $this->repository = $plan;  
    }
    public function index() {

        $plans = $this->repository->latest()->paginate(2);

        return view('admin.pages.plans.index', ['plans' => $plans]);
    }
    public function create(Request $request) {

        return view('admin.pages.plans.create');
    }

    public function store(Request $request) {      

        $data = $request->all();     

        $this->repository->create([
            'name' => $data['name'],
            'url' => Str::kebab($data['name']),
            'price' => $data['price'],
            'description' => $data['description']
        ]);

        return redirect()->route('plans.index');
    }

    public function show($url) {
       
        $plan = $this->repository->where('url', $url)->first();

        if(!$plan) {
            return redirect()->route('plans.index');
        }

        return view('admin.pages.plans.show', ['plan' => $plan]);
    }

    public function destroy($url) {
       
        $plan = $this->repository->where('url', $url)->first();

        if(!$plan) {
            return redirect()->back();
        }

        $plan->delete();

        return redirect()->route('plans.index');
    }

    public function search(Request $request) {

        $filters = $request->filter;

       $plans = $this->repository->search($filters);     

        return view('admin.pages.plans.index', ['plans' => $plans, 'filters' => $filters]);
    }

    public function edit($url) {

        if(!$plan = $this->repository->where('url', $url)->first()) {
            return redirect()->back();
        }


        return view('admin.pages.plans.edit', ['plan' => $plan]);
    }

    public function update(Request $request,$url) {
       

        if(!$plan = $this->repository->where('url', $url)->first()) {
            return redirect()->back();
        }

       
        $plan->update($request->all());

        return redirect()->route('plans.index');
    }
}
