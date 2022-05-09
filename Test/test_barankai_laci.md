ID |Teszt helye| Tesztelt funkció | Várt eredmény | Eredmény
------------ | ------------- | ------------- | ------------- | ------------- |
1|Regisztráció - Dallgató|Hallgatói regisztráció CRUD|A regisztráció véglegesítése során az adatok elmentésre kerülnek az adatbázisba.|Megfelelt.
2|Regisztráció - Dolgozó|Dolgozói regisztráció CRUD|A regisztráció véglegesítése során az adatok elmentésre kerülnek az adatbázisba.|Megfelelt.
3|Regisztráció - Vendés|Vendég regisztráció CRUD|A regisztráció véglegesítése során az adatok elmentésre kerülnek az adatbázisba.|Nem felelt meg.
4|Bejelentkezés|Bejelentkezés (sikeres) CRUD - Sima felhasználó|A bejelentkezés helyes adatok megadása során rendben végbemegy, beengedi a felhasználót.|Megfelelt.
5|Bejelentkezés|Bejelentkezés (sikeres) CRUD - Admin felhasználó|A bejelentkezés helyes adatok megadása során rendben végbemegy, beengedi az admint a megfelelő jogosultságokkal.|Megfelelt.
6|Bejelentkezés|Bejelentkezés (sikeres) CRUD - Főadmin felhasználó|A bejelentkezés helyes adatok megadása során rendben végbemegy, beengedi a főadmint a saját oldalára.|Megfelelt.
7|Bejelentkezés|Bejelentkezés (hibás) CRUD|A bejelentkezés rossz adatok megadása során hibával tér vissza, a hibát jelzi, nem engedi be a felhasználót.|Megfelelt.
8|Rendezvények oldal - Sima felhasználó|Keresés a címben|A keresésben megadott kifejezés szerint kikeresi az ahhoz hasonlító rendezvényeket, és csak azokat jeleníti meg.|Megfelelt.
9|Rendezvények oldal - Sima felhasználó|Keresés a leírásban|A keresésben megadott kifejezés szerint kikeresi az ahhoz hasonlító rendezvények leírását, és csak azokat a rendezvényeket jeleníti meg.|Megfelelt.
10|Rendezvény információs oldal - Sima felhasználó|Jelentkezés az eseményre.|A gomb megnyomása során a felhasználó jelentkezése az eseményre rögzítésre kerül az adatbázisban.|Megfelelt.
11|Rendezvény információs oldal - Sima felhasználó|Jelentkezés törlése az eseményről.|A gomb megnyomása során a felhasználó jelentkezése törlésre kerül az adatbázisból.|Megfelelt.
12|QR-kód beolvasás|A rendezvényre való megjelenés rögzítése.|A QR-kód beolvasása során az adatbázisban elmentésre kerül, hogy a felhasználó megjelent a rendezvényen.|Megfelelt.
13|Rendezvényeny módosítása - Admin|Rendezvény módosítása|Az esemény módosítása végeztével a megváltozott adatok elmentésre kerülnek az adatbázisban.|Megfelelt.
14|Rendezvények oldal - Admin|Rendezvény adatainak letöltése|A "letöltés" gomb megnyomására a rendezvényre jelentkezett felhasználók adatai lekérésre kerülnek az adatbázisból, és elmentésre kerülnek egy excel fájlba.|Megfelelt.
15|Rendezvények oldal - Admin|Rendezvény QR-kódjának lekérése|A "QR-kód" gomb megnyomására a rendezvény QR-kódja a leírásával és a nevével együtt kimentésre kerülnek egy PDF dokumentumba.|Megfelelt.
16|Rendezvények oldal - Admin|Rendezvény törlése|A "törlés" gomb megnyomására a rendezvény törlésre kerül az adatbázisból.|Megfelelt.
17|Új rendezvény hozzáadása - Admin|Rendezvény hozzáadása|Az új rendezvény adatai a mentés gomb lenyomására elmentésre kerülnek az adatbázisba.|Megfelelt.
16|Főadmin oldal|Felhasználók listázása|A főadmin oldalán megfelelően megjelenik az összes adatbázisban található felhasználó.|Megfelelt.
17|Főadmin oldal|Keresés|A keresésben megadott kifejezéshez hasonlító felhasználók listázásra kerülnek.|Megfelelt
18|Főadmin oldal|Admin jog adása|Az "admin jog adása" gombra kattintva a megfelelő felhasználó jogosultsági köre megváltozik az adatbázisban.|Megfelelt.
19|Főadmin oldal|Admin jog visszavonása|Az "admin jog elvétele" gombra kattintva a felhasználótól megvonásra kerül az admin jogosultság, mentésre kerül az adatbázisban.|Megfelelt.
20|Navigációs menü|Kijelentkezés|A "kijelentkezés" gomb megnyomására a felhasználó kijelentkeztetésre kerül.|Megfelelt.
21||||
22||||
23||||
24||||