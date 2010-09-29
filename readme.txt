=== Helion Widget ===
Contributors: paulpela
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=63SBY4W2R42NW
Tags: helion, program partnerski, widget, zarabianie, książki, księgarnia, onepress, sensus, septem
Requires at least: 3.0
Tested up to: 3.0.1
Stable tag: 0.99

Helion Widget jest przeznaczony dla osób chcących promować na swoim blogu książki z księgarni Helion, Sensus, Onepress i Septem.

== Description ==

Helion Widget wyświetla na pasku bocznym okładkę z linkiem do losowo wybranej książki z dostarczonej przez ciebie listy. Uczestnicy Programu Partnerskiego Grupy Helion mogą umieścić w linku swój identyfikator uczestnika i zarabiać prowizję od sprzedaży.

Nie musisz wpisywać ani aktualizować często zmieniających się danych o książkach na bieżąco. Wystarczy, że wskażesz które książki chcesz promować. Widget pobierze pozostałe dane i okładkę automatycznie.

Sam(a) wybierasz rozmiar okładki. Dodatkowo, po najechaniu myszką nad okładkę wyświetla się opis książki.

Pod okładką wyświetlany jest tytuł oraz cena. Jeśli książka jest bestsellerem lub nowością, informacja o tym pojawia się także pod okładką książki.

Czytelnik po kliknięciu na tytuł lub okładkę zostanie przeniesiony na stronę odpowiedniej księgarni. Umieszczenie własnego identyfikatora uczestnika PP Helion sprawi, że jeśli w ciągu 30 dni klikająca osoba dokona dowolnego zakupu, zostanie ci naliczona procentowa prowizja od sprzedaży.

Strona domowa: http://www.blogworkorange.net/helion-widget/

== Installation ==

*Automatyczna instalacja* odbywa się przez panel administracyjny. W menu Wtyczki->Dodaj nową wpisz w wyszukiwarce nazwę tej wtyczki, czyli *Helion Widget*, a następnie kliknij `Zainstaluj`.

*Instalacja półautomatyczna* odbywa się przez panel administracyjny w trzech prostych krokach:

   1. Pobierz pakiet z najnowszą wersją Helion Widget
   2. Wejdź do menu Wtyczki->Dodaj nową
   3. Wgraj pakiet instalacyjny na swój serwer i aktywuj wtyczkę

Możesz też *wgrać wtyczkę przez FTP* do katalogu `/wp-content/plugins/`, a następnie aktywować ją w panelu administracyjnym w menu Wtyczki.

= Jak skonfigurować Helion Widget? =

Konfiguracja wtyczki jest dwustopniowa.

Pierwszym krokiem jest umiejscowienie widgetu w wybranym miejscu i ewentualnie wpisanie numeru uczestnika PP Helion. Odbywa się to w panelu administracyjnym za pośrednictwem menu Wygląd->Widgety.

Następnie, należy stworzyć listę książek, które mają być wyświetlane.

W menu Ustawienia->Helion Widget znajdują się pola, w które należy wpisać identyfikatory książek do wyświetlenia. Jeśli książek jest więcej, należy oddzielić identyfikatory przecinkiem bez spacji.

Identyfikator znajduje się w linku do książki, np. dla książki "Joomla! Biblia" o adresie:

`http://helion.pl/ksiazki/joomla_biblia_ric_shreves,joombi.htm`,

identyfikator to: `joombi`.

Widget jest gotowy do wyświetlania. Przy każdym odświeżeniu strony zostanie wylosowana książka, a jej okładka pojawi się na pasku bocznym w wybranym miejscu.

== Frequently Asked Questions ==

= Czy muszę być uczestniczką/kiem Programu Partnerskiego, by korzystać z Helion Widget? =

Nie musisz. Jeśli nie posiadasz identyfikatora uczestnika, możesz odpowiednie pole zostawić puste. 

Ale na pewno warto brać udział w tym programie :)

= Jak dołączyć do programu partnerskiego Helion? =

Należy zarejestrować się na stronie http://program-partnerski.helion.pl/

= Co to jest identyfikator książki "ident"? =

Jest to zazwyczaj 5- lub 6-literowy kod, który znajduje się w adresie każdej książki, zwykle na końcu. Tylko ten kod należy podać w ustawieniach widgetu, pomijając inne części adresu.

= Jakie wymagania ma ten widget? =

Helion Widget do poprawnego działania wymaga włączonej na serwerze opcji `allow_url_fopen` oraz modułu PHP SimpleXML (moduł ten jest domyślnie włączony, opcja nie zawsze, ale wtyczka spróbuje ją włączyć) lub, alternatywnie, zainstalowanego modułu cURL (bardzo popularny i zazwyczaj domyślnie włączony). Wtyczka sama wykryje, które opcje są dostępne.

= Jak zmienić wygląd widgetu? =

Wygląd Helion Widget z łatwością możesz dodatkowo dostosować za pomocą CSS. Widget posiada własną klasę `.helion_widget`, dzięki której możesz nadać mu odpowiedni wygląd.

== Screenshots ==

1. Helion Widget w działaniu

== Changelog ==

= 0.99 =
* Zmiana nazwy klasy CSS widgetu na bardziej unikalną

= 0.98 =
* Rozmiar okładki w konfiguracji widgetu wyświetla się poprawnie po zapisaniu zmian
* Widget jest dostępny także dla osób, które nie są uczestnikami PP Helion
* Kilka drobnych zmian w kodzie

= 0.97 =
* Dodano walidację kodów książek (`ident`) oraz obsługę błędów związanych z XML

= 0.96 =
* Dodano obsługę cURL jako alternatywnej metody pobierania danych z serwera Helion dla osób, które mają wyłączone `allow_url_fopen`

= 0.95 =
* Informacja o braku listy książek do wyświetlenia

= 0.94 =
* Problem z poprawnym wyświetlaniem wersji

= 0.93 =
* Poprawiono błędy w pliku readme.txt

= 0.92 =
* Poprawiono błędy w pliku readme.txt

= 0.91 =
* Pierwsza wersja publiczna.

== Upgrade Notice ==

= 0.99 =
Jeżeli korzystasz z CSS, by dostosować widget, informuję, że zmieniła się nazwa klasy na .helion_widget

= 0.98 =
Rozmiar okładki wyświetla się poprawnie. Nie trzeba być już uczestnikiem PP, aby korzystać z widgetu.

= 0.97 =
Zwiększona ochrona przed występowaniem błędów.

= 0.96 =
Dodatkowa metoda pobierania danych dla osób, które mają wyłączoną opcję allow_url_fopen.

= 0.95 =
Dodano informację o braku listy książek do wyświetlenia. W poprzednich wersjach powodowało to powstanie błędu.

