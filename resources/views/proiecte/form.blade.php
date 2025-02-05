@csrf

<div id="datePicker" class="row mb-4 pt-2 rounded-3" style="border:1px solid #e9ecef; border-left:0.25rem darkcyan solid; background-color:rgb(241, 250, 250)">
    <div class="col-lg-12 mb-4">
        <label for="denumire_contract" class="mb-0 ps-3">Denumire Contract</label>
        <input
            type="text"
            class="form-control bg-white rounded-3"
            name="denumire_contract"
            value="{{ old('denumire_contract', $preFilledFields['denumire_contract'] ?? $proiect->denumire_contract ?? '') }}">
    </div>

    <div class="col-lg-10 mb-4">
        <label for="nr_contract" class="mb-0 ps-3">Nr. Contract</label>
        <input
            type="text"
            class="form-control bg-white rounded-3"
            name="nr_contract"
            value="{{ old('nr_contract', $preFilledFields['nr_contract'] ?? $proiect->nr_contract ?? '') }}">
    </div>

    <div class="col-lg-2 mb-4 text-center">
        <label for="data_contract" class="mb-0 ps-0">Data Contract</label>
        <vue-datepicker-next
            data-veche="{{ old('data_contract', $proiect->data_contract ?? null) }}"
            nume-camp-db="data_contract"
            tip="date"
            value-type="YYYY-MM-DD"
            format="DD.MM.YYYY"
            :latime="{ width: '125px' }"
        ></vue-datepicker-next>
    </div>

    <div class="col-lg-12 mb-4">
        <label for="data_limita_predare" class="mb-0 ps-3">Data Limită Predare</label>
        <input
            type="text"
            class="form-control bg-white rounded-3"
            name="data_limita_predare"
            value="{{ old('data_limita_predare', $preFilledFields['data_limita_predare'] ?? $proiect->data_limita_predare ?? '') }}">
    </div>

    <div class="col-lg-9 mb-4">
        <label for="nr_proces_verbal_predare_primire" class="mb-0 ps-3">Nr. Proces Verbal Predare-Primire</label>
        <input
            type="text"
            class="form-control bg-white rounded-3"
            name="nr_proces_verbal_predare_primire"
            value="{{ old('nr_proces_verbal_predare_primire', $preFilledFields['nr_proces_verbal_predare_primire'] ?? $proiect->nr_proces_verbal_predare_primire ?? '') }}">
    </div>

    <div class="col-lg-3 mb-4 text-center">
        <label for="data_proces_verbal_predare_primire" class="mb-0 ps-0 small">Data Proces Verbal Predare-Primire</label>
        <vue-datepicker-next
            data-veche="{{ old('data_proces_verbal_predare_primire', $proiect->data_proces_verbal_predare_primire ?? null) }}"
            nume-camp-db="data_proces_verbal_predare_primire"
            tip="date"
            value-type="YYYY-MM-DD"
            format="DD.MM.YYYY"
            :latime="{ width: '125px' }"
        ></vue-datepicker-next>
    </div>
</div>

<div class="row gx-4 mb-4">
    <div class="col-lg-6 ps-0">
        <!-- Where we mount our MembriSelector Vue app -->
        <div id="membriSelectorApp" class="pt-2 pb-4 px-2 rounded-3" style="border:1px solid #e9ecef; border-left:0.25rem #e66800 solid; background-color:#fff9f5">
            <!-- Pass the data from the controller as JSON props -->
            <membri-selector
                :all-membri='@json($allMembri)'
                :existing-membri='@json($existingMembri)'
            >
            </membri-selector>
        </div>
    </div>
    <div class="col-lg-6 pe-0">
        <!-- Where we mount our SubcontractantiSelector Vue app -->
        <div id="subcontractantiSelectorApp" class="pt-2 px-2 pb-4 rounded-3" style="border:1px solid #e9ecef; border-left:0.25rem darkcyan solid; background-color:rgb(241, 250, 250)">
            <!-- Pass the data from the controller as JSON props -->
            <subcontractanti-selector
                :all-subcontractanti='@json($allSubcontractanti)'
                :existing-subcontractanti='@json($existingSubcontractanti)'
            >
            </subcontractanti-selector>
        </div>
    </div>
</div>

<div id="datePicker" class="row mb-4 pt-2 rounded-3" style="border:1px solid #e9ecef; border-left:0.25rem darkcyan solid; background-color:rgb(241, 250, 250)">
    <div class="col-lg-6 mb-4">
        <label for="stare_contract" class="mb-0 ps-3">Stare Contract</label>
        <input
            type="text"
            class="form-control bg-white rounded-3"
            name="stare_contract"
            value="{{ old('stare_contract', $preFilledFields['stare_contract'] ?? $proiect->stare_contract ?? '') }}">
    </div>

    <div class="col-lg-6 mb-4">
        <label for="cu" class="mb-0 ps-3">CU</label>
        <input
            type="text"
            class="form-control bg-white rounded-3"
            name="cu"
            value="{{ old('cu', $preFilledFields['cu'] ?? $proiect->cu ?? '') }}">
    </div>

    <div class="col-lg-6 mb-4">
        <label for="studii_teren" class="mb-0 ps-3">Studii Teren</label>
        <input
            type="text"
            class="form-control bg-white rounded-3"
            name="studii_teren"
            value="{{ old('studii_teren', $preFilledFields['studii_teren'] ?? $proiect->studii_teren ?? '') }}">
    </div>

    <div class="col-lg-6 mb-4">
        <label for="avize" class="mb-0 ps-3">Avize</label>
        <input
            type="text"
            class="form-control bg-white rounded-3"
            name="avize"
            value="{{ old('avize', $preFilledFields['avize'] ?? $proiect->avize ?? '') }}">
    </div>

    <div class="col-lg-6 mb-4">
        <label for="faza" class="mb-0 ps-3">FAZA</label>
        <input
            type="text"
            class="form-control bg-white rounded-3"
            name="faza"
            value="{{ old('faza', $preFilledFields['faza'] ?? $proiect->faza ?? '') }}">
    </div>

    <div class="col-lg-6 mb-4">
        <label for="arhitectura" class="mb-0 ps-3">Arhitectură</label>
        <input
            type="text"
            class="form-control bg-white rounded-3"
            name="arhitectura"
            value="{{ old('arhitectura', $preFilledFields['arhitectura'] ?? $proiect->arhitectura ?? '') }}">
    </div>

    <div class="col-lg-6 mb-4">
        <label for="rezistenta" class="mb-0 ps-3">Rezistență</label>
        <input
            type="text"
            class="form-control bg-white rounded-3"
            name="rezistenta"
            value="{{ old('rezistenta', $preFilledFields['rezistenta'] ?? $proiect->rezistenta ?? '') }}">
    </div>

    <div class="col-lg-6 mb-4">
        <label for="instalatii" class="mb-0 ps-3">Instalații</label>
        <input
            type="text"
            class="form-control bg-white rounded-3"
            name="instalatii"
            value="{{ old('instalatii', $preFilledFields['instalatii'] ?? $proiect->instalatii ?? '') }}">
    </div>

    <div class="col-lg-6 mb-4">
        <label for="partea_economica" class="mb-0 ps-3">Partea Economică</label>
        <input
            type="text"
            class="form-control bg-white rounded-3"
            name="partea_economica"
            value="{{ old('partea_economica', $preFilledFields['partea_economica'] ?? $proiect->partea_economica ?? '') }}">
    </div>

    <div class="col-lg-6 mb-4">
        <label for="autorizatie_de_construire" class="mb-0 ps-3">Autorizație de Construire</label>
        <input
            type="text"
            class="form-control bg-white rounded-3"
            name="autorizatie_de_construire"
            value="{{ old('autorizatie_de_construire', $preFilledFields['autorizatie_de_construire'] ?? $proiect->autorizatie_de_construire ?? '') }}">
    </div>

    <div class="col-lg-12 mb-4">
        <label for="observatii" class="mb-0 ps-3">Observații</label>
        <textarea
            class="form-control bg-white rounded-3"
            name="observatii"
            rows="3">{{ old('observatii', $preFilledFields['observatii'] ?? $proiect->observatii ?? '') }}</textarea>
    </div>
</div>

    <div class="col-lg-12 px-4 py-2 mb-0 text-center">
        <button type="submit" class="btn btn-primary text-white me-3 rounded-3">
            <i class="fa-solid fa-save me-1"></i> {{ $buttonText }}
        </button>
        <a class="btn btn-secondary rounded-3" href="{{ Session::get('returnUrl', route('proiecte.index')) }}">
            Renunță
        </a>
    </div>
</div>
