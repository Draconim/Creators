## 1. A rendszer célja

A rendszer célja, hogy a Követelmény és Funkcionális specifikációban meghatározott megrendelői folyamatok megvalósuljanak. Egy olyan weboldalt szeretnénk megvalósítani, amelyen keresztül a sportrendezvényeken megjelenő emberek (mind nézők és aktív résztvevők) regisztrálhat az oldalra, és az oldal felhasználásával megkönnyítsük az eseményeken történő adminisztrációs feladatokat.

## 2. Projektterv

Dátum | Tevékenység | Résztvevők
------|-------------|---------------
2022.02.22-03.08 | Dokumentációk elkészítése | Benedek Péter, Barankai László Ferenc
2022.03.08 | Fejlesztés megkezdése | Benedek Péter, Barankai László Ferenc
2022.03.22 | Demó bemutatása | Benedek Péter, Barankai László Ferenc
2022.04.19 | Project átadása | Benedek Péter, Barankai László Ferenc

## 3. Üzleti folyamatok modellje

Üzleti szereplők:
    - Tulajdonos
    - Project készítői

Támogatandó üzleti folyamatok:
    - Rendezvények hozzáadása
    - Rendezvényre való regisztráció
    - Adatok lekérése

## 4. Követelmények

- Funkcionális követelmények
    - Csak regisztrált fehasználók tekinthessék meg az eseményeket
- Nem funkcionális követelmények:
    - Letisztult, egyszerű kinézet (könnyű átláthatóság)

## 5. Funkcionális terv

- Rendszerszereplők:
    - Főadmin
    - Admin
    - Felhasználó
- Rendszer használati esetek és lefutásaik:
    - Felhasználó
        - Regisztráció
        - Bejelentkezés
        - Események megtekintése
        - Jelentkezés a rendezvényre
        - Rendezvény QR-kódjának beolvasása
    - Admin
        - Események kiírása
        - Eseményen részvevők listájának exportálása (excel fájlba)
    - Főadmin
        - Adminok hozzáadása, felfüggesztése, törlése
## 6. Implementációs terv

    A webes felület HTML és CSS nyelven fog készülni. Ezeket a technológiákat külön fájlokba írva készítjük, és egymáshoz csatoljuk a jobb átláthatóság, könnyebb fejlesztés érdekében. Az alkalmazs szerver oldalát PHP technológiával készítjük. Segítségünkre lesz továbbá a Laravel keretrendszer.

## 7. Karbantartási terv

A szoftveren a későbbiekben az igények alapján lehet karbantartani, amely a következőkből áll:
    - Új funkciók hozzáadása
    - A kiszolgáló szerver státuszának ellenőrzése, offline szerver esetén újraindítás.