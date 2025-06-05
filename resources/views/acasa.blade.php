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
        <div class="col-md-6 mb-3">
          <div class="card culoare2">
            <div class="card-header text-center">Stare proiecte</div>
          </div>

          <div class="accordion" id="stareContractAccordion">
            @foreach($proiecteByStareContract as $normalizedKey => $projects)
              @php
                // 1) Grab one “raw” stare_contract to display as the heading
                $exampleLabel = $projects->first()->stare_contract;
                $label       = $exampleLabel ?: '-';

                // 2) Slugify the normalized key (letters only), but don’t trust it to be unique by itself:
                $baseSlug = Str::slug($normalizedKey ?: 'necunoscut');
                // 3) Append the loop index, guaranteeing uniqueness even if $baseSlug is duplicated
                $slugKey  = "{$baseSlug}-{$loop->index}";
              @endphp

              <div class="accordion-item">
                {{-- NOTE: The <h2> id and button “aria-…” all use the same $slugKey suffix --}}
                <h2 class="accordion-header" id="heading-{{ $slugKey }}">
                  <button
                    class="accordion-button collapsed d-flex align-items-center"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapse-{{ $slugKey }}"
                    aria-expanded="false"
                    aria-controls="collapse-{{ $slugKey }}"
                  >

                    {{-- 1) Category label in blue --}}
                    <span class="text-primary me-3">
                        {{ Str::ucfirst($label) }}
                    </span>

                    {{-- 2) Badge on the left --}}
                    <span class="badge bg-primary">
                      {{ $projects->count() }}
                    </span>

                    {{-- 3) Bootstrap will append the “arrow” via .accordion-button::after --}}
                  </button>
                </h2>

                {{-- This DIV’s id matches the button’s data-bs-target exactly --}}
                <div
                  id="collapse-{{ $slugKey }}"
                  class="accordion-collapse collapse"
                  aria-labelledby="heading-{{ $slugKey }}"
                  data-bs-parent="#stareContractAccordion"
                >
                  <div class="accordion-body">
                    <ul class="mb-2">
                      @foreach($projects as $project)
                        <li>
                          <a href="{{ $project->path() }}">
                            {{ $project->denumire_contract ?: '-' }}
                          </a>
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

