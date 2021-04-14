@yield('header')
<nav>
    <div class="container">
        <section id="top_row" class="row">
            <div class="col-md-1 col-4">
                <img src="/img/logo.png" alt="logo">
            </div>
            <div class="col-md-2 offset-md-4 col-4 offset-3">
                <a href="">Kontakty a čísla na oddelenia</a>
            </div>
            <div class="col-1">
                <select name="" id="">
                    <option value="">SK</option>
                    <option value="">EN</option>
                </select>
            </div>
            <div class="col-md-2 col-8">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <span class="fa fa-search"></span>
                        </span>                    
                    </div>
                </div>
            </div>
            <div class="col-1">
                <button type="button" class="btn" id="login_btn">Prihlásenie</button>
            </div>
        </section>
        <section id="bottom_row" class="row">
            <div class="navbar navbar-expand-md col-sm-12">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">O nás</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Zoznam miest</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Inšpekcia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="#">Kontakt</a>
                    </li>
                </ul>
            </div>
        </section>
    </div>
</nav>
@yield('content')
<footer>
    <section class="container-fluid py-5" id="foot">
        <div class="row">
            <div class="col-md-3">
                <div class="row">
                    <ul>
                        <li>ADRESA A KONTAKT</li>
                        <li>ŠÚKL</li>
                        <li>Kvetná 11</li>
                        <li>825 08 Bratislava 26</li>
                        <li>Ústredňa:</li>
                        <li>+421-2-50701 111</li>
                    </ul>
                </div>
                <div class="row">
                    <ul>
                        <li>KONKTAKTY</li>
                        <li><a href="#">telefónne čísla</a></li>
                        <li><a href="#">adresa</a></li>
                        <li><a href="#">úradné hodiny</a></li>
                        <li><a href="#">bankové spojenie</a></li>
                    </ul>
                </div>
                <div class="row">
                    <ul>
                        <li>INFORMÁCIE PRE VEREJNOSŤ</li>
                        <li><a href="#">Zoznam vyvezených liekov</a></li>
                        <li><a href="#">MZ SR</a></li>
                        <li><a href="#">Národný portál zdravia</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3">
                <ul>
                    <li>O NÁS</li>
                    <li><a href="#">Dotazníky</a></li>
                    <li><a href="#">Hlavní predstavitelia</a></li>
                    <li><a href="#">Základné dokumenty</a></li>
                    <li><a href="#">Zmluvy za ŠÚKL</a></li>
                    <li><a href="#">História a súčastnošť</a></li>
                    <li><a href="#">Národná spolupráca</a></li>
                    <li><a href="#">Medzinárodná spolupráca</a></li>
                    <li><a href="#">Poradné orgány</a></li>
                    <li><a href="#">Legislatíva</a></li>
                    <li><a href="#">Priestupky a iné správne delikty</a></li>
                    <li><a href="#">Zoznam dlžníkov</a></li>
                    <li><a href="#">Sadzobník ŠÚKL</a></li>
                    <li><a href="#">Verejné obstarávanie</a></li>
                    <li><a href="#">Vzdelávacie akcie a prezentácie</a></li>
                    <li><a href="#">Konzultácie</a></li>
                    <li><a href="#">Voľné pracovné miesta (0)</a></li>
                    <li><a href="#">Poskytovanie informácií</a></li>
                    <li><a href="#">Sťažnosti a petície</a></li>
                </ul>
            </div>

            <div class="col-md-3">

                <div class = "row">
                    <ul>
                        <li>MÉDIÁ</li>
                        <li><a href="#">Tlačové správy</a></li>
                        <li><a href="#">Lieky v médiách</a></li>
                        <li><a href="#">Kontakt pre médiá</a></li>
                    </ul>
                </div>

                <div class = "row">
                    <ul>
                        <li>DATABÁZY A SERVIS</li>
                        <li><a href="#">Databáza liekov a zdravotníckych pomôcok</a></li>
                        <li><a href="#">Iné zoznamy</a></li>
                        <li><a href="#">Kontaktný formulár</a></li>
                        <li><a href="#">Mapa stránok</a></li>
                        <li><a href="#">A-Z index</a></li>
                        <li><a href="#">Linky</a></li>
                        <li><a href="#">RSS</a></li>
                        <li><a href="#">Doplnok pre internetový prehliadač</a></li>
                        <li><a href="#">Prehliadače formátov</a></li>
                    </ul>
                </div>

            </div>

            <div class="col-md-3">
                <div class = "row">
                    <ul>
                        <li>DROGOVÉ PREKURZORY</li>
                        <li><a href="#">Aktuality</a></li>
                        <li><a href="#">Legislatíva</a></li>
                        <li><a href="#">Pokyny</a></li>
                        <li><a href="#">Kontakt</a></li>
                    </ul>
                </div>

                <div class = "row">
                    <ul>
                        <li>Iné</li>
                        <li><a href="#">Linky</a></li>
                        <li><a href="#">Mapa stránok</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Podmienky používania</a></li>
                    </ul>
                </div>

                <div class = "row" id="alert_sys">
                    <ul>
                        <li>RAPID ALERT SYSTEM</li>
                        <li><a href="#">Rýchla výstraha vyplývajúca z nedostatov v kvalite liekov</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</footer>
@yield('bottom')