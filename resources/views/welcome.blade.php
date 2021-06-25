<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Prova Linkendata</title>
</head>
<body>
    <main>
        <div class="container">
            {{-- Titolo progetto e dettagli lavoro --}}
            <div class="title">
                <h1>LinkenData</h1>
                <h3>Obbiettivi :</h3>
                <ul class="inline_list">
                    <li>Conservare in memoria nome e data di nascita</li>
                    <li>Visualizzare nome, eta' e giorni mancanti al compleanno</li>
                </ul>
            </div>
            {{-- fine prima sezione --}}

            {{-- Form Salvataggi dati Guess --}}
            <div class="guest_form_data">
                <form action="{{ route('guest_store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form_group">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Inserisci il tuo nome" value="" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form_group">
                        <input type="date" name="birth_date" class="form-control @error('birth_date') is-invalid @enderror" placeholder="Inserisci la tua data di nascita" value="" required>
                        @error('birth_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form_group">
                        <button type="submit" class="boo_btn btn_form create_btn">
                            <i class="far fa-save"></i>Salva
                        </button>
                    </div>
                </form>
            </div>
            {{-- fine Form --}}

            {{-- Sezione visualizzatione guest --}}
            <input type="checkbox" id="cart_toggle">
            <div class="dropdown">
                <label for="cart_toggle" type="button" class="btn btn-info">
                    Vedi gli utenti
                </label>
                <div class="drop_menu">
                    <?php 
                        function getAge($birthday)
                        {
                            list($year,$month,$day) = explode("-",$birthday);
                            $year_diff  = date("Y") - $year; 
                            $month_diff = date("m") - $month;
                            $day_diff   = date("d") - $day;
                            if ($day_diff < 0 || $month_diff < 0)       
                            $year_diff--;     
                            return $year_diff;  
                        };

                        function getDayLeft ($Date)
                        {
                            list($year,$month,$day) = explode("-",$Date);
                            $Mday = $month * 30;
                            $totalBDay = $Mday + $day;
                            $leftMday = date("m") * 30;
                            $leftTotalDay = $leftMday + date("d");
                            $dayLeft = $totalBDay - $leftTotalDay;
                            if ($dayLeft < 0)
                            {
                                $dayLeft = $dayLeft + 365;
                            };
                            return $dayLeft;
                        };
                    ?>
                        @foreach ($guests as $guest)
                        <div class="row">
                            <p class="inline_par"> Nome : {{$guest->name}} - </p>
                            <p class="inline_par">Eta' : {{getAge($guest->birth_date)}} - </p>
                            <p class="inline_par">Giorni mancanti al Compleanno : {{getDayLeft ($guest->birth_date)}} </p>
                        </div>
                        @endforeach
                </div>              
            </div>
        </div>
    </main>
</body>
</html>


