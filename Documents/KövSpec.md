## 1. Bevezetés

Az alkalmazás célja, hogy segítse, modernizálja az Eszterházy Károly Katolikus Egyetem sportrendezvényein megjelent személyek nyilvántartását. Az alkalmazás webes felületen valósul meg, mely biztosítja a könnyű elérést és a széleskörű kompatibilitást. Fő funkciója az egyes rendezvényeken megjelent személyek nyilvántartása, mely egy egyszerűen használható, QR kódos megoldással valósul meg. Az adminisztrátoroknak a rendezvények meghirdetése mellett lehetőségük nyílik az adatok letöltésére is.

## 2. Jelenlegi helyzet

Az Eszterházy Károly Katolikus Egyetemen sok és sokféle sportesemény kerül megrendezésre. Ám ezek adminisztrációja papíralapon történik, ami elavult, drága, helyigényes és nehezen kezelhető.

## 3. Vágyálom rendszer

A megrendelőnek egy olyan szoftverre van szüksége, ami kiváltja a fentebb említett, elvault, papír alapú adminisztrációt. A szoftver egyszerű, könnyen kezelhető felületet bizotsít a felhasználók számára, valamint egy QR kódos megoldással gyorsítja az adatfogadást. Az adminisztrátorok az egyes események adatait letölthetik egy, a táblázatkezelők számára ideális formátumban, így könnyen lehet azokkal műveleteket végezni.

## 4. Jelenlegi üzleti folyamatok modellje

A megrendelő a sportrendezvények adminisztrálását jelenleg egy elavult módszerrel, papír alapon végzi. Ez a módszer nagy helyigényű, lassú, és az adatokkal nehéz műveleteket végezni. Valamint a digitális rendszerbe való esetleges bevitel egy külön, hosszadalmas folyamat.

## 5. Igényelt üzleti folyamatok modellje

A cél egy olyan webes felület létrehozása, ami digitalizálja a papíralapú adminisztrációt. Az alkalmazás adminisztrátorai meghirdethetnek rendezvényeket, melyek az oldal látogatói számára láthatóak lesznek egy listában. A rendezvények látogatói beregisztrálhatnak a programba, majd a rendezvényeken kihelyezett QR kódot leolvasva másodpercek alatt bekerülnek egy online nyilvántartásba. Az események létrehozásakor automatikusan generálódik egy azonosító, abból pedig egy QR kód, melyet képfájlként le lehet tölteni. Az adatokat szükség esetén az adminisztrátorok le is tudják tölteni. Az adminisztrátorokat egy főadmin tudja kinevezni. Ez a felhasználói fiók kizárólag az adminok kezelésére lesz alkalmas.

Elvárások a főadmin részére:
- A főadmin a regisztrált felhasználóknak adminisztrátori jogosultságot tud adni,
- jogkörüket szerkeszteni.
- Másra nem képes.

Elvárások az adminok számára:
- Az adminok képesek események kiírására,
- a létrehozott események szerkesztésére,
- és az események adatainak letöltésére.

Elvárások a userek számára:
- A userek többféleképpen tudnak regisztrálni attól függően, hogy éppen hallgatók, dolgozók, vagy külsős vendégek. A rendszer ettől függően kér be tőlük bizonyos adatokat.
- A regisztrálást és bejelentkezést követően a userek láthatják a rendezvények listáját, megtekinthetik az információkat.
- Egy adott eseményen az előre elkészített QR kódot beolvasva a userek jelezhetik, hogy megjelentek az eseményen.

## 6. Követelménylista

Modul | ID | Név | Követelményről bővebben | Kifejtés 
--- | --- | --- | -------------------------|---------------------------------------------
Felület | F001 | Bejelentkezés | 5. fejezet | A regisztrált felhasználó legyen képes bejelentkezni a programba!
Felület | F002 | Regisztráció hallgatóként | 5. fejezet | Az új felhasználó legyen képes hallgatóként regisztrálni a nevének, neptun kódjának és e-mail címének megadásával!
Felület | F003 | Regisztráció dolgozóként | 5. fejezet | Az új felhasználó legyen képes dolgozóként regisztrálni a nevének, e-mail címének és szervezeti egységének megadásával!
Felület | F004 | Regisztráció külsősként | 5. fejezet | Az új felhasználól egyen képes külsősként regisztrálni nevének, e-mail címének és lakóhelyének megadásával.
Felület | F005 | Események megtekintése | 5. fejezet | A felhasználó a belépés után legyen képes kilistázni az aktuális eseményeket!
Felület | F006 | Esemény részleteinek megjelenítése | 5. fejezet | A felhasználó legyen képes egy eseményre kattintva megnézni annak részleteit (pl.: időpont, helyszín).
Felület | F007 | QR-kód olvasó | 5. fejezet | A felhasználó legyen képes bejelentkezés után megnyitni egy, az alkalmazásba beépített QR-kód olvasót.
Alkalmazás| A008 | Beléptetés | 5. fejezet | A felhasználó legyen képes a QR-kód olvasó segítségével a rendezvényeken kirakott QR-kódokat beolvasni, a neve kerüljön be a nyilvántartásba, mint az adott rendezvény látogatója!
Admin felület | AF009 | Esemény létrehozása | 5. fejezet | Egy admin legyen képes új eseményt hozzáadni az adatbázishoz!
Admin felület | AF010 | Esemény módosítása | 5. fejezet | Egy admin legyen képes a létező események részleteit módosítani!
Admin felület | AF011 | Esemény törlése | 5. fejezet | Egy admin legyen képes létező eseményeket törölni!
Admin felület | AF012 | Résztvevők adatainak lekérése | 5. fejezet | Egy admin legyen képes létező eseményen résztvevők adatainak lekérésére!
Fő admin felület | FAF013 | Adminok kinevezése | 5. fejezet | A fő admin legyen képes a regisztrált felhasználóknak admin jogot adni!
Fő admin felület | FAF014 | Adminok törlése | 5. fejezet | A fő admin legyen képes a felhasználókat megfosztani admin joguktól!

## 7. Forgatókönyvek

- Felhasználói oldal: A felhasználónak az oldalra való első látogatáskor regisztrálnia kell. Ezt háromféle módon teheti meg, különböző adatok megadásával. A regisztráció után a felhasználó bejelentkezik az előbb megadott adatokkal. Ezután hozzáférhet a meghirdetett programok listájához, megnézheti a programok részleteit. Egy programra való látogatáskor a felhasználó megnyitja az alkalmazásban elhelyezett QR-kód olvasót (ekkor az lakalmazást valamilyen kamerával rendelkező eszközről, például okostelefonról kell futtatni), majd leolvassa az erre a célra kihelyezett QR-kódot. Ekkor automatikusan nyilvántartásba lesz véve, hogy megjelent az eseményen.
- Admin oldal: Az adminok képesek bejelentkezés után események kezelésére. Az admin felhasználók elérnek egy plusz oldalt, aminek a segítségével új eseményeket tudnak a listához adni, valamint a meglévő események listájában is jú gombok jelennek meg számukra, amivel tudják az eseményt szerkeszteni és törölni. Az eseményeken megjelent szemények adatait szükség esetén letölthetik.
- Fő admin oldal: A fő admin egy speciális fiók: A regisztrált felhasználóknak admin jogot tud adni és el is veheti azt. Más tevékenységre nem alkalmas.

## 8. Használati esetek
Felhasználó:
- Tud regisztrálni.
- Be tud jelentkezni a regisztrált adataival.
- Meg tudja nézni az aktuális események listáját és az események részleteit.
- QR-kód olvasóval be tud jelentkezni egy eseményre.
Admin:
- Tud regisztrálni.
- Be tud jelentkezni a regisztrált adataival.
- Képes eseményeket létrehozni, módosítani törölni.
- Képes az eseményeken megjelent személyek adatait letölteni.
Fő admin:
- Képes a felhasználóknak admin jogot adni és elvenni.