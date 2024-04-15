<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
</head>

<body>
    <article>
        <header>
            <h1>
                AcVis (Actors Smart Visualiser)
            </h1>
        </header>
        <h2>Cuprins</h2>
        <ul>
            <li>
                <a href="#authors">Autori</a>
            </li>
            <li>
                <a href="#introduction">1. Introducere</a>
                <ul>
                    <li><a href="#introduction-purpose">1.1 Scop</a></li>
                    <li><a href="#conventions">1.2 Convenție de
                            scriere</a></li>
                    <li><a href="#audience">1.3 Publicul țintă</a></li>
                    <li><a href="#product-scope">1.4 Scopul
                            produsului</a></li>
                    <li><a href="#references">1.5 Referințe</a></li>
                </ul>
            </li>
            <li><a href="#overall">2. Descriere Generală</a>
                <ul>
                    <li><a href="#product-perspective">2.1 Perspectiva
                            produsului</a></li>
                    <li><a href="#product-functions">2.2 Funcțiile
                            produsului</a></li>
                    <li><a href="#users">2.3 Clase și caracteristici ale
                            utilizatorilor</a></li>
                    <li><a href="#operating-environment">2.4 Mediul de
                            operare</a></li>
                    <li><a href="#documentation">2.5 Documentația pentru
                            utilizator</a></li>
                </ul>
            </li>
            <li><a href="#external">3. Interfețele aplicației </a>
                <ul>
                    <li><a href="#user-interface">3.1 Interfața
                            utilizatorului </a>
                        <ul>
                            <li><a href="#nav-bar">3.1.1 Bara de navigație
                                </a></li>
                            <li><a href="#login-page">3.1.2 Pagina de
                                    autentificare </a></li>
                            <li><a href="#signup-page">3.1.3 Pagina de
                                    înregistrare </a></li>
                            <li><a href="#home-page">3.1.4 Pagina de acasă
                                </a></li>
                            <li><a href="#about">3.1.5 Pagina informativa
                                </a></li>
                            <li><a href="#profile">3.1.6 Pagina de profil
                                </a></li>
                        </ul>
                    </li>
                    <li><a href="#hardware-interface">3.2 Interfața Hardware
                        </a></li>
                    <li><a href="#software-interface">3.3 Interfața
                            Software</a></li>
                    <li><a href="#communication-interface">3.4 Interfața de
                            comunicare</a></li>
                </ul>
            </li>
            <li><a href="#system-features">4. Caracteristici ale
                    sistemului</a>
                <ul>
                    <li><a href="#management">4.1 Gestionarea contului </a>
                        <ul>
                            <li><a href="#management-1">4.1.1 Descriere și
                                    generalități </a></li>
                            <li><a href="#management-2">4.1.2 Actualizarea
                                    informațiilor</a></li>
                            <li><a href="#management-3">4.1.3 Condiții de
                                    funcționare</a></li>
                        </ul>
                    </li>
                    <li><a href="#utilizatori">4.2 Secțiunea Utilizatori</a>
                        <ul>
                            <li><a href="#utilizatori-1">4.2.1 Descriere și
                                    generalități</a></li>
                            <li><a href="#utilizatori-2">4.2.2 Actualizarea
                                    informațiilor</a></li>
                            <li><a href="#utilizatori-3">4.2.3 Condiții de
                                    funcționare</a></li>
                        </ul>
                    </li>
                    <li><a href="#administrator">4.3 Secțiunea Admin</a>
                        <ul>
                            <li><a href="#administrator-1">4.3.1 Descriere
                                    și generalități</a></li>
                            <li><a href="#administrator-2">4.3.2
                                    Actualizarea informațiilor</a></li>
                            <li><a href="#administrator-3">4.3.3 Condiții de
                                    funcționare</a></li>
                        </ul>
                    </li>
                    <li><a href="#logout">4.4 Secțiunea Logout</a>
                        <ul>
                            <li><a href="#logout-1">4.4.1 Descriere și
                                    generalități</a></li>
                            <li><a href="#logout-2">4.4.2 Actualizarea
                                    informațiilor</a></li>
                            <li><a href="#logout-3">4.4.3 Condiții de
                                    funcționare</a></li>
                        </ul>
                    </li>
                    <li><a href="#other">4.5 Alte funcționalități </a>
                        <ul>
                            <li><a href="#other-1">4.5.1 Descriere și
                                    generalități</a></li>
                            <li><a href="#other-2">4.5.2 Actualizarea
                                    informațiilor</a></li>
                            <li><a href="#other-3">4.5.3 Condiții de
                                    funcționare</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="#non-functional">5.Funcționalități pentru protecție
                    și securitate</a>
                <ul>
                    <li><a href="#safety">5.1 Protecția datelor</a></li>
                    <li><a href="#security">5.2 Securizarea datelor</a></li>
                    <li><a href="#software-attributes">5.3 Calitățile
                            Software </a></li>
                </ul>
            </li>
        </ul>
        <div role="contentinfo">
            <section id="authors" typeof="sa:AuthorsList">
                <h2>Autori</h2>
                <ul>
                    <li property="schema:author" typeof="sa:ContributorRole">
                        <span typeof="schema:Person">
                            <meta content="Raluca" property="schema:givenName">
                            <meta content="Andreea" property="schema:additionalName">
                            <meta content="Bocăneț" property="schema:familyName">
                            <span property="schema:name">Bocăneț
                                Raluca-Andreea</span>
                        </span>
                        <ul>
                            <li property="schema:roleContactPoint" typeof="schema:ContactPoint">
                                <a href="mailto:ralucaandreea313@gmail.com"
                                    property="schema:email">ralucaandreea313@gmail.com</a>
                            </li>
                        </ul>
                    </li>
                    <li property="schema:author" typeof="sa:ContributorRole">
                        <span typeof="schema:Person">
                            <meta content="Ionela" property="schema:givenName">
                            <meta content="Elena" property="schema:additionalName">
                            <meta content="Daniela" property="schema:additionalName">
                            <meta content="Cîrjonțu" property="schema:familyName">
                            <span property="schema:name">Cîrjonțu
                                Ionela-Elena-Daniela</span>
                        </span>
                        <ul>
                            <li property="schema:roleContactPoint" typeof="schema:ContactPoint">
                                <a href="mailto:ionelacirjontu7@gmail.com"
                                    property="schema:email">ionelacirjontu7@gmail.com</a>
                            </li>
                        </ul>
                </ul>
            </section>
        </div>
        <section id="introduction">
            <h3>1. Introducere</h3>
            <section id="introduction-purpose">
                <h4>1.1 Scop</h4>
                <p>
                    AcVis (Actors Smart Visualiser) este o aplicație web
                    dezvoltată de studentele menționate în secțiunea
                    de Autori de la Facultatea de
                    Informatică a Universității Alexandru Ioan Cuza.
                    Scopul acestui document este acela de a prezenta o
                    descriere detaliată a funcționalităților aplicației
                    web. Această aplicație
                    va oferi utilizatorilor posibilitatea de a vizualiza
                    informații despre actori, filme, seriale, dar și
                    despre premiile și nominalizările acestora.
                    De asemenea, utilizatorii vor putea să își creeze un
                    cont pentru a beneficia de funcționalitățile oferite
                    de aplicație.
                </p>
            </section>
            <section id="conventions">
                <h4> 1.2 Convenția documentului</h4>
                <ul>
                    <li>
                        Acest document urmează șablonul de documentație
                        a cerințelor software conform IEEE Software
                        Requirements
                        Specification.
                    </li>
                    <li>
                        Textul <b>îngroșat</b> este folosit pentru a
                        defini noțiuni personalizate sau pentru a
                        accentua
                        concepte
                        importante.
                    </li>
                </ul>
            </section>
            <section id="audience">
                <h4>1.3 Publicul țintă</h4>
                <p>
                    Acest document este destinat profesorilor,
                    sau studenților, însă orice
                    utilizator,
                    indiferent
                    de cunoștințele lor tehnologice,
                    poate consulta secțiunile de <b>Interfeța
                        utilizatorului</b> și <b>Caracteristici ale
                        sistemului</b>
                    pentru a
                    obține o mai bună înțelegere a ceea ce oferă
                    aplicația.
                </p>
            </section>
            <section id="product-scope">
                <h4>1.4 Scopul Produsului</h4>
                <p>
                    Scopul aplicației este de a oferi utilizatorilor o
                    sursă de informații despre actori, filme, seriale,
                    dar și despre premiile și nominalizările acestora.
                    Utilizatorii nu vor primi informatii personalizate
                    in functie de istoric deoarece nu vor avea cont,
                    de fiecare data cand vor intra pe pagina vor fi
                    priviti ca utilizatori noi.
                </p>
            </section>
            <section id="references">
                <h4>1.5 Bibliografie</h4>
                <ul>
                    <li>Andrei Panu, Site-ul Tehnologii Web,
                        FII UAIC</li>
                    <li>H Rick. IEEE-Template - GitHub</li>
                </ul>
            </section>
        </section>
        <section id="overall">
            <h3>2. Descriere Generală</h3>
            <section id="product-perspective">
                <h4>2.1 Perspectiva produsului</h4>
                <p>AcVis (Actors Smart Visualiser) este o aplicație
                    dezvoltată în cadrul cursului de Tehnologii Web,
                    menită să
                    ofere un mod de vizualizare a informațiilor
                    despre SAG Awards din anul 1995 până în anul
                    2022.
            </section>
            <section id="product-functions">
                <h4>2.2 Funcționalitățile produsului</h4>
                Fiecare utilizator va avea acces la urmatoarele
                funcționălități:
                <ul>
                    <li>să consulte pagină "Home" și noutățile
                        disponibile;</li>
                    <li>să acceseze câștigătorii ultimului an
                        (2022) și să-și caute actorul
                        favorit;</li>
                    <li>să acceseze prin filtrarile puse la
                        dispoziție nominalizările și
                        câștigătorii fiecărei categorii din
                        perioada 1995-2022;</li>
                    <li>să acceseze pagina "About" pentru a
                        accesa
                        scurtă descriere a paginii web;</li>
                    <li>dacă utilizatorul are rol de
                        <b>admin</b>,
                        acesta poate șterge utilizatori din baza
                        de
                        date;
                    </li>
                    <li>dacă utilizatorul are rol de
                        <b>admin</b>,
                        acesta poate modifica informații deja
                        existente;
                    </li>
                    <li>dacă utilizatorul are rol de
                        <b>admin</b>,
                        acesta poate actualiza informațiile din
                        aplicația web.
                    </li>
                </ul>
            </section>
            <section id="users">
                <h4>2.3 Clase și caracteristici ale
                    utilizatorilor</h4>
                <h5>2.3.1 Utilizator principal</h5>
                <ul>
                    <li>utilizatorii pot fi:</li>
                    <li style="list-style: none">
                        <ul>
                            <li>orice categorie de oameni care
                                doresc să afle informații despre
                                SAG Awards(1995-2022) și doresc
                                să știe mai mult despre actorii
                                preferați;
                            </li>
                        </ul>
                    </li>
                </ul>
                <h5>2.3.2 Caracteristici</h5>
                <ul>
                    <li>Utilizatorii pot să acceseze toate paginile aplicației web cum ar fi:
                        <ul>
                            <li> pagina "Home" unde poate vedea o galerie foto de la ultima ediție a premiile SAG și informații despre ultimele persoane căutate;</li>
                            <li> pagina "About" care oferă informații despre SAG Awards;</li>
                            <li> pagina "Login" unde se poate autentifica în contul său pentru a vizualiza cele mai recente actualizări ale actorilor preferați;</li>
                            <li> prin intermediul meniului lateral, utilizatorii vor putea vizualiza informații specifice despre o anumită categorie, an sau actor.</li>
                        </ul>
                    </li>
                    </li>
                </ul>
            </section>
            <section id="operating-environment">
                <h4>2.4 Mediul de operare</h4>
                <p>
                    Produsul dezvoltat poate fi utilizat pe
                    orice
                    dispozitiv cu un browser web care suportă
                    HTML,
                    CSS și
                    PHP.
                </p>
            </section>
            <section id="documentation">
                <h4>2.5 Documentația pentru utilizator</h4>
                <p>
                    Utilizatorii pot consulta acest document
                    pentru
                    explicații detaliate despre
                    funcționalitățile
                    aplicației
                    web.
                </p>
            </section>
        </section>
        <section id="external">
            <h3>3. Interfețele aplicației</h3>
            <section id="user-interface">
                <h4>3.1 Interfața utilizatorului</h4>
                Mai jos, puteți vedea o prezentare generală a
                fiecărei pagini a aplicației și
                funcționalităților
                pe care le
                oferă:
                <ul>
                    <li id="nav-bar"><b>Bara de
                            navigație</b></li>
                    <li style="list-style: none">
                        <ul>
                            <li>Aceasta reprezintă meniul de navigare către fiecare pagina a
                                aplicației, prezent pe fiecare pagină totodată.
                            </li>
                            <li class="pictures" style="list-style: none"><img alt="login" src="baraNavigatie.png"
                                    width=900></li>
                        </ul>
                    </li>
                    <li id="login-page"><b>Pagina de
                            autentificare</b></li>
                    <li style="list-style: none">
                        <ul>
                            <li>Pagina are rolul de a realiza autentificarea utilizatorilor la AcVis.</li>
                            <li>Pentru a se autentifica, utilizatorul trebuie să completeze câmpurile de "email address" și "password" cu
                                credențiale <b>valide</b>, urmând să acționeze butonul
                                <b>Submit</b>.
                            </li>
                            <li> În cazul în care utilizatorul nu are cont pe site, acesta își
                                poate crea unul prin accesarea pagini de
                                înregistrare, ce se face prin
                                apăsarea butonului <b>Create an account</b>.
                            </li>
                            <li class="pictures" style="list-style: none"><img alt="login"
                                    src="loginPoza.png" width=700>
                            </li>
                        </ul>
                    </li>
                    <li id="signup-page"><b>Pagina de
                            înregistrare</b></li>
                    <li style="list-style: none">
                        <ul>
                            <li>Pagina oferă funcționalitatea de
                                înregistrare a utilizatorilor,
                                pentru a putea beneficia de
                                toate funcționalitățile AcVis.
                            </li>
                            <li>Pentru a se înregistra,
                                utilizatorul trebuie să completeze câmpurile
                                <b>First Name</b>,
                                <b>Last Name</b>,
                                <b>Email</b>, <b>Password</b>,
                                <b>Re-type Password</b> și <b>Contact</b> .
                                Mai mult, câmpurile <b>Email</b> și <b>Contact</b> trebuie să fie <b>unice</b>.
                            </li>
                            <li>În cazul în care utilizatorul își amintește că are un cont
                                existent, acesta poate apasă
                                butonul <b>Login</b> din
                                mijlocul paginii, pentru a reveni la meniul de autentificare.
                            </li>
                            <li class="pictures" style="list-style: none"><img alt="signup"
                                    src="autentificarePoza.png" width=800>
                        </ul>
                    </li>
                    <li id="home-page"><b> Pagina de
                            acasă</b></li>
                    <li style="list-style: none">
                        <ul>
                            <li>Pagina are rolul de prezența
                                ultimele imagini de la SAG Awards și informații despre ultimele persoane căutate.</li>
                            <li class="pictures" style="list-style: none"><img alt="overview" src="homePage1.png"
                                    width=800> <img alt="overview" src="homePage2.png" width=800>
                            </li>
                        </ul>
                    </li>
                    <li id="about"><b>Pagina
                            informativa</b></li>
                    <li style="list-style: none">
                        <ul>
                            <li>Pagina are rolul de a prezenta câteva informații despre SAG Awards.</li>
                            <li class="pictures" style="list-style: none"><img alt="overview" src="aboutPoza.png"
                                    width=800>
                            </li>
                        </ul>
                    </li>
                    <li id="profile"><b>Pagina de profil</b></li>
                    <li style="list-style: none">
                        <ul>
                            <li>Pagina prezintă informații despre utilizator.</li>
                            <li>Utilizatorul
                                <b>autentificat</b> își va vedea la profil detalii despre cont,
                                activitatea sa și lista cu actorii favoriți.
                            </li>
                            <li>Mai mult, utilizatorul va avea la dispoziție un buton <b>Logout</b>
                                prin care poate ieși din cont, dar is unul
                                <b>Change Password</b>,
                                în cazul în care își dorește acest lucru.
                            </li>
                        </ul>
                    </li>
                </ul>
                <section id="hardware-interface">
                    <h4>3.2 Interfața
                        Hardware</h4>
                    <p>
                        Acest produs nu
                        necesită
                        interfețe hardware,
                        funcționând pe orice
                        platformă
                        (calculatoare,
                        laptopuri,
                        telefoane etc.),
                        care
                        are instalat un
                        browser.
                    </p>
                </section>
                <section id="software-interface">
                    <h4>3.3 Interfața
                        Software</h4>
                    <p>
                        Cerințele minime de
                        software includ un
                        browser funcțional,
                        compatibil cu HTML, 
                        CSS și
                        cu PHP. Aplicația web 
                        AcVis are o interfață 
                        grafică intuitivă și
                        ușor de folosit, care
                        ajută un utilizator 
                        neprofesionist să
                        primească informații
                        despre actorii preferați
                        prin aplicarea mai multor 
                        filtre în raport cu
                        nominalizările lor la SAG 
                        AWARDS.
                </section>
                <section id="communication-interface">
                    <h4>3.4 Interfața de
                        comunicare</h4>
                    <p>
                        Aplicația
                        necesită o
                        conexiune la
                        internet.
                        Standardul
                        de comunicare
                        care
                        va fi utilizat
                        este
                        HTTP.
                        Interfața de comunicare
                        a aplicației AcVis include 
                        mai multe funcționalități care 
                        permit utilizatorilor să afle
                        știri și informații despre
                        actorii preferați:
                        <ul>
                       <li>Bara de căutare: Permite 
                           vizualizarea informațiilor după 
                           numele actorului.
                       </li>
                             <li>Profilurile actorilor: Când un
                       actor este selectat din baza de date,
                       se deschide pagina profilului său.
                             </li>
                       <li>Filtre de căutare: În partea stângă 
                       a paginii HOME se află un slide menu care
                       permite filtrarea după anumite criterii 
                       ale actorilor.</li>
                        <li>Secțiunea de ultimii actori
                        căutați: Pentru vizualizarea actorilor 
                        virali în rândul utilizatorilor.
                        </li>
                        </ul>
                    </p>
                </section>
                <section id="system-features">
                    <h3>4.
                        Caracteristici
                        ale
                        sistemului</h3>
                    <section id="management">
                        <h4>4.1
                            Gestionarea
                            contului</h4>
                        <h5 id="management-1">4.1.1
                            Descriere și
                            generalități</h5>
                        Un utilizator se
                        poate înregistra
                        alegându-și un
                        nume
                        de utilizator,
                        un
                        email, o parola,
                        numele si
                        prenumele.
                        Acesta se poate
                        autentifica
                        având
                        nevoie doar de
                        numele de
                        utilizator
                        și de parolă.
                        <h5 id="management-2">4.1.2
                            Actualizarea
                            informațiilor</h5>
                        <ul>
                            <li>
                                În
                                momentul
                                în care
                                un
                                utilizator
                                nou este
                                creat,
                                credențialele
                                acestuia
                                sunt
                                introduse
                                în
                                baza de
                                date. De
                                asemenea,
                                când
                                utilizatorul
                                decide
                                să-și
                                modifice
                                credențialele,
                                noile
                                valori
                                sunt
                                și ele
                                actualizate
                                în baza
                                de
                                date.
                            </li>
                        </ul>
                        <h5 id="management-3">4.1.3
                            Condiții de
                            funcționare</h5>
                        <ul>
                            <li>
                                Pentru
                                a-și
                                modifica
                                credențialele
                                utilizatorul,
                                trebuie
                                să
                                fie
                                autentificat.
                            </li>
                            <li>
                                Pentru a
                                se
                                autentifica,
                                utilizatorul
                                are
                                nevoie
                                de un
                                cont
                                care
                                este
                                înregistrat
                                în baza
                                de
                                date.
                            </li>
                        </ul>
                    </section>
                    <section id="utilizatori">
                        <h4>4.2
                            Secțiunea de
                            utilizatori</h4>
                        <h5 id="utilizatori-1">4.2.1
                            Descriere și
                            generalități</h5>
                        Secțiunea
                        <b>Utilizatori</b>
                        este destinată
                        <b>adminului</b>,
                        și
                        aceasta îi oferă
                        posibilitatea
                        de a vizualiza o
                        listă cu toți
                        utilizatorii din
                        baza de date. De
                        asemenea, acesta
                        are
                        posibilitatea
                        de a elimina
                        utilizatori din
                        baza
                        de date, dacă
                        dorește acest
                        lucru.
                        <h5 id="utilizatori-2">4.2.2
                            Actualizarea
                            informațiilor</h5>
                        <ul>
                            <li>
                                La
                                apăsarea
                                butonului
                                de
                                ștergere
                                din
                                dreptul
                                fiecărui
                                utilizator,
                                credențialele
                                utilizatorului
                                care a
                                fost
                                selectat,
                                sunt
                                șterse
                                din baza
                                de
                                date.
                            </li>
                        </ul>
                        <h5 id="utilizatori-3">4.2.3
                            Condiții de
                            funcționare</h5>
                        <ul>
                            <li>
                                Utilizatorul
                                trebuie
                                să
                                fie
                                autentificat.
                            </li>
                            <li>
                                Utilizatorul
                                trebuie
                                să
                                dețină
                                drepturi
                                de
                                admin.
                            </li>
                        </ul>
                    </section>
                    <section id="administrator">
                        <h4>4.3
                            Secțiunea
                            Admin</h4>
                        <h5 id="administrator-1">4.3.1
                            Descriere și
                            generalități</h5>
                        Secțiunea
                        <b>Admin</b>
                        este
                        destinată
                        utilizatorilor
                        ce au
                        drepturi de
                        <b>administrator</b>
                        și
                        această
                        oferă facilități
                        pe
                        care un
                        utilizator
                        normal nu le
                        are. În
                        momentul în care
                        adminul
                        accesează
                        panoul de
                        control,
                        va putea
                        adaugă/modifică
                        întrebări și
                        chestionare
                        direct
                        de pe platforma.
                        Totodată, acesta
                        este
                        capabil să
                        șteargă
                        conturi ale
                        utilizatorilor.
                        <h5 id="administrator-2">4.3.2
                            Actualizare
                            informațiilor</h5>
                        <ul>
                            <li>
                                În
                                momentul
                                în care
                                adminul
                                adaugă o
                                întrebare
                                sau un
                                chestionar,
                                informațiile
                                despre
                                acestea
                                sunt
                                inserate
                                în baza
                                de
                                date.
                            </li>
                            <li>
                                În
                                momentul
                                în care
                                adminul
                                modifica
                                o
                                întrebare
                                sau un
                                chestionar,
                                informațiile
                                despre
                                acestea
                                sunt
                                actualizate
                                în baza
                                de
                                date.
                            </li>
                        </ul>
                        <h5 id="administrator-3">4.3.3
                            Condiții de
                            funcționare</h5>
                        <ul>
                            <li>
                                Utilizatorul
                                trebuie
                                să
                                fie
                                autentificat.
                            </li>
                            <li>
                                Utilizatorul
                                trebuie
                                să
                                dețină
                                drepturi
                                de
                                admin.
                            </li>
                        </ul>
                    </section>
                    <section id="logout">
                        <h4>4.4
                            Secțiunea de
                            Logout</h4>
                        <h5 id="logout-1">4.4.1
                            Descriere și
                            generalități</h5>
                        Secțiunea de
                        <b>Logout</b>
                        are
                        rolul de a
                        deconecta
                        utilizatorul de
                        pe
                        cont și îl
                        redirecționează
                        către
                        pagina acasă.
                        <h5 id="logout-2">4.4.2
                            Actualizare
                            informațiilor</h5>
                        <ul>
                            <li>
                                Tokenul
                                de
                                autentificare
                                este
                                eliminat,
                                prin
                                intermediul
                                JWT.
                            </li>
                        </ul>
                        <h5 id="logout-3">4.4.3
                            Condiții de
                            funcționare</h5>
                        <ul>
                            <li>
                                Utilizatorul
                                trebuie
                                să
                                fie
                                autentificat.
                            </li>
                        </ul>
                    </section>
                    <section id="other">
                        <h4>4.5 Alte
                            funcționalități</h4>
                        <h5 id="other-2">4.5.1
                            Actualizarea
                            informațiilor</h5>
                        <ol>
                            <li>
                                Sectiune din pagina de Home,
                                care ilustreaza ultimii actori 
                                vizualizati este actualizata
                                periodic.
                            </li>
                        </ol>
                        <h5 id="other-3">4.5.2
                            Cerințe de
                            funcționare</h5>
                        <ul>
                            <li>
                                Utilizatorul nu trebuie să fie 
                                autentificat, informațiile și
                                statisticile sunt disponibile
                                oricărui utilizator cu o conexiune
                                la internet și un browser compatibil 
                                cu aplicația.
                            </li>
                        </ul>
                    </section>
                </section>
                <section id="non-functional">
                    <h3>5.
                        Funcționalități
                        pentru protecție
                        și
                        securitate</h3>
                    <section id="safety">
                        <h4>5.1
                            Protecția
                            datelor</h4>
                        <p>
                            Aplicația va
                            asigura
                            confidențialitatea
                            datelor prin
                            intermediul
                            unei
                            criptări.
                        </p>
                    </section>
                    <section id="security">
                        <h4>5.2
                            Securizarea
                            datelor</h4>
                        <p>
                            Autorizarea
                            utilizatorilor
                            se face pe
                            baza
                            standardului
                            JWT.
                            Utilizatorii
                            au
                            acces doar
                            la
                            informații
                            legate
                            de progresul
                            in
                            cadrul
                            site-ului,
                            celelalte
                            informații
                            fiind
                            ascunse.
                            Token-ul
                            folosit
                            pentru
                            autorizare
                            este
                            stocat
                            intr-un
                            cookie de
                            tip
                            HTTP-only,
                            lucru
                            care previne
                            atacurile de
                            tip
                            XSS. Mai
                            mult,
                            toate
                            datele sunt
                            introduse
                            in baza de
                            date
                            prin
                            intermediul
                            unor
                            <b>prepared
                                statements</b>,
                            care asigura
                            prevenirea
                            SQL
                            Injection.
                        </p>
                    </section>
                    <section id="software-attributes">
                        <h4>5.3
                            Calitățile
                            Software</h4>
                        <ul>
                            <li>Adaptabilitate</li>
                            <li>Ușurință
                                în
                                utilizare</li>
                            <li>Flexibilitate</li>
                        </ul>
                    </section>
                </section>
            </section>
        </section>
    </article>
</body>

</html>
