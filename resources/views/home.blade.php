@extends('layouts.app')
@section('content')
{{-- header  --}}
<header class="masthead">
    <div class="container">
            <div class="masthead-heading"> End-Of-Year PROJECT PLATFORM</div>
        <div class="icon-heading">
            <a href="https://www.facebook.com/FS.Tetouan.page.officielle/" target="_blank" class="facebook"> <i
                    class="fa fa-facebook-official"></i></a>
            <a href="http://www.fst.ac.ma/" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a>
            <a href="http://www.fst.ac.ma/" target="_blank" class="google"><i class="fa fa-google-plus-square"></i></a>
            <a href="http://www.fst.ac.ma/" target="_blank" class="linkedin"> <i class="fa fa-linkedin"></i></a>
        </div>

    </div>
</header>
{{-- faculté information  --}}
<section class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <img class="img-responsive  img-thumbnail " src="{{ asset('img/faculté.jpg') }}"
                    alt="faculté des sciences" weight="150em" height="150em">
            </div>
            <div class="col-sm-9 font-weight-bold">
                <div class="section1 ">Faculté</div><br>
                <div class="para-section">La Faculté des Sciences de Tétouan (FS - Tétouan) a été créée au sein
                    de
                    l'Université Sidi Mohammed
                    Ben
                    Abdellah par décret n°2-82-355 du 16 Rabia1403 (31janvier 1983). Depuis l'année universitaire
                    1989-90,
                    la Faculté des Sciences de Tétouan relève de L'université Abdelmalek Essaadi (UAE).
                </div>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-sm-3 text-center">
                <img class="img-responsive img-page-section  " src="{{ asset('img/doyen.jpg') }}" alt="mot du Doyen"
                    weight="120em" height="120em">
            </div>
            <div class="col-sm-9 font-weight-bold">
                <div class="section1">Mot du Doyen</div><br>
                <div class="para-section">
                    La Région Tanger - Tétouan - Al Hoceima connaît un développement économique et social
                    remarquable.
                    Elle est devenue un véritable chantier avec des projets structurants visant à assoir une
                    plateforme
                    propice aux investissements à même d’assurer un essor économique et social à l’échelle
                    régionale
                    et
                    nationale. </div>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-sm-3">
                <img class="img-responsive img-thumbnail" src="{{ asset('img/information.jpg') }}" alt="information"
                    weight="150em" height="150em">
            </div>
            <div class="col-sm-9 font-weight-bold">
                <div class="section1">formation</div><br>
                <div class="para-section"> Cycle Licence Bac + 3 ans :
                    Diplôme de Licence d'Etudes Fondamentales (LEF)-
                    Diplôme de Licence Professionnelle (LP)<br>
                    Cycle Master Bac + 5 ans :
                    Diplôme de Master (M)-
                    Diplôme de Master spécialisé (MS)<br>
                    Cycle Doctorat Bac + 8 ans :
                    Diplôme de Doctorat
                </div>
            </div>
        </div>
    </div>
</section>

{{-- contact --}}
<section class="page-section1">
    <div class="container">
        <div class="text-center section1">
            <h2 class="section-heading text-uppercase">Contact Us</h2>
        </div><br><br>
        <form id="contactForm" name="sentMessage" novalidate="novalidate">
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="name" type="text" placeholder="Your Name "
                            required="required" />
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="email" type="email" placeholder="Your Email "
                            required="required" />
                    </div>
                    <div class="form-group mb-md-0">
                        <input class="form-control form-control-lg" id="phone" type="tel" placeholder="Your Phone "
                            required="required" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-textarea mb-md-0">
                        <textarea class="form-control form-control-lg" id="message" placeholder="Your Message "
                            required="required" rows="5"></textarea>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <div id="success"></div>
                <button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="submit">Send
                    Message</button>
            </div>
        </form>
    </div>
</section>
<footer class="footer py-4">
    <div class="container ">
        <div class="row align-items-center ">
            Tous Droits Réservés FS Tetouan Copyright © 2020. Courriel:
            fs.tetouan.contact@gmail.com
            Faculté des Sciences, BP. 2121 M'Hannech II , 93030 Tétouan Maroc
        </div>
    </div>
</footer>
@endsection