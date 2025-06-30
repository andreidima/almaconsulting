<div style="margin:0 auto;width:100%; background-color:#eff1f0;">
    <div style="margin:0 auto; max-width:800px!important; background-color: white;">

        @include ('mail.headerFooter.header')

        <div style="padding:20px 20px; max-width:760px!important;margin:0 auto; font-size:18px">
            <p>Bună,</p>

            <p>Proiectul <strong>{{ $proiect->denumire_contract ?? 'un proiect' }}</strong> a fost închis.</p>

            <p>Poți vizualiza proiectul aici:
                <a href="{{ $proiect->path() }}" target="_blank">{{ $proiect->path() }}</a>
            </p>

            <p>Toate cele bune,<br>Echipa Alma Consulting</p>
        </div>
    </div>

    @include ('mail.headerFooter.footer')
</div>
