@extends('layouts.app')
@php use Illuminate\Support\Str; @endphp

@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-6 mb-3">
            <div class="card culoare2">
                <div class="card-header">Pagina principală</div>

                <div class="card-body">
                    Bine ai venit <b>{{ auth()->user()->name ?? '' }}</b>!
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-4 mb-3">
            <div class="card culoare2">
                <div class="card-header text-center">Proiecte luna trecută</div>
                <div class="card-body text-center">
                    <b class="fs-2">{{ $proiecteLastMonth }}</b>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card culoare2">
                <div class="card-header text-center">Proiecte luna curentă</div>
                <div class="card-body text-center">
                    <b class="fs-2">{{ $proiecteThisMonth }}</b>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card culoare2">
                <div class="card-header text-center">Total Proiecte</div>
                <div class="card-body text-center">
                    <b class="fs-2">{{ $allProiecteCount }}</b>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 mb-3">
            <div class="accordion" id="stareContractAccordion">
                @foreach($proiecteByStareContract as $stare => $projects)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading-{{ Str::slug($stare ?? 'necunoscut') }}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ Str::slug($stare ?? 'necunoscut') }}" aria-expanded="false" aria-controls="collapse-{{ Str::slug($stare ?? 'necunoscut') }}">
                                <span class="me-auto">{{ $stare ?? '-' }}</span>
                                <span class="badge bg-secondary">{{ $projects->count() }}</span>
                            </button>
                        </h2>
                        <div id="collapse-{{ Str::slug($stare ?? 'necunoscut') }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ Str::slug($stare ?? 'necunoscut') }}" data-bs-parent="#stareContractAccordion">
                            <div class="accordion-body">
                                <ul class="mb-2">
                                    @foreach($projects as $project)
                                        <li>
                                            <a href="{{ $project->path() }}">{{ $project->denumire_contract ?? '-' }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection

