=== Helion Widget ===
Contributors: paulpela
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=63SBY4W2R42NW
Tags: helion, program partnerski, widget, zarabianie
Requires at least: 3.0
Tested up to: 3.0.1
Stable tag: 0.97

Helion Widget jest przeznaczony dla osób chcących promować na swoim blogu książki z księgarni Helion, Sensus, Onepress i Septem.

== Description ==

Helion Widget wyświetla na pasku bocznym okładkę połączoną z linkiem zawierającym kod referencyjny do losowo wybranej książki z dostarczonej przez ciebie listy.

Nie musisz wpisywać ani aktualizować często zmieniających się danych o książkach na bieżąco. Wystarczy, że wskażesz które książki chcesz promować. Widget pobierze pozostałe dane i okładkę automatycznie.

Sam(a) wybierasz rozmiar okładki. Dodatkowo, po najechaniu myszką nad okładkę wyświetla się opis książki.

Pod okładką wyświetlany jest tytuł oraz cena. Jeśli książka jest bestsellerem lub nowością, informacja o tym pojawia się także pod okładką książki.

Czytelnik po kliknięciu na tytuł lub okładkę zostanie przeniesiony na stronę odpowiedniej księgarni i jeśli w ciągu 30 dni dokona dowolnego zakupu, zostanie ci naliczona procentowa prowizja od sprzedaży.

Strona domowa: http://www.blogworkorange.net/helion-widget/

== Installation ==

Instalacja odbywa się przez panel administracyjny w trzech prostych krokach:

   1. Pobierz pakiet z najnowszą wersją Helion Widget
   2. Wejdź do menu Wtyczki->Dodaj nową
   3. Wgraj pakiet instalacyjny na swój serwer i aktywuj wtyczkę

Możesz też wgrać wtyczkę przez FTP do katalogu `/wp-content/plugins/`, a następnie aktywować ją w panelu administracyjnym w menu Wtyczki.

= Jak skonfigurować Helion Widget? =

Konfiguracja wtyczki jest dwustopniowa.

Pierwszym krokiem jest umiejscowienie widgetu w wybranym miejscu i wpisanie numeru uczestnika PP Helion. Odbywa się to w panelu administracyjnym za pośrednictwem menu Wygląd->Widgety.

Następnie, należy stworzyć listę książek, które mają być wyświetlane.

W menu Ustawienia->Helion Widget znajdują się pola, w które należy wpisać identyfikatory książek do wyświetlenia. Jeśli książek jest więcej, należy oddzielić identyfikatory przecinkiem bez spacji.

Widget jest gotowy do wyświetlania. Przy każdym odświeżeniu strony zostanie wylosowana książka, a jej okładka pojawi się na pasku bocznym w wybranym miejscu.

== Frequently Asked Questions ==

= Jak dołączyć do programu partnerskiego Helion? =

Należy zarejestrować się na stronie http://program-partnerski.helion.pl/

= Jakie wymagania ma ten widget? =

Helion Widget do poprawnego działania wymaga włączonej na serwerze opcji `allow_url_fopen` oraz modułu PHP SimpleXML (moduł ten jest domyślnie włączony, opcja nie zawsze, ale wtyczka spróbuje ją włączyć) lub, alternatywnie, zainstalowanego modułu cURL (bardzo popularny). Wtyczka sama wykryje, które opcje są dostępne.

== Screenshots ==

1. Helion Widget w działaniu

== Changelog ==

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

= 0.97 =
Zwiększona ochrona przed występowaniem błędów.

= 0.96 =
Dodatkowa metoda pobierania danych dla osób, które mają wyłączoną opcję allow_url_fopen.

= 0.95 =
Dodano informację o braku listy książek do wyświetlenia. W poprzednich wersjach powodowało to powstanie błędu.

