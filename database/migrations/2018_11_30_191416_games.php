<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Games extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Games', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->string('publisher');
            $table->date('release_date')->nullable();
			$table->integer('genre_id');
			$table->string('image_url');
			$table->timestamps();
        });
		$this->addGames();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Games');
    }
	public function addGame($game){
		DB::table('games')->insert(['name' => $game[0],
        'publisher' => $game[1],
		'release_date' => $game[2],
		'genre_id' => $game[3],
		'image_url' => $game[4],
		'created_at' => $game[5],
		'updated_at' => $game[6],
		'description' => $game[7],
		]);
	}
	public function addGames(){
		$games[0]=['Grand Theft Auto 5','Rockstar Games','2015-04-05',7,'/storage/GTAV.jpg',now(),now(),
		"<p align='justify'>Grand Theft Auto V – kolejna odsłona kultowej serii gangsterskich gier akcji studia 
		Rockstar North – zabiera nas do świata wzorowanego na Kalifornii. W uniwersum Grand Theft Auto stan nosi nazwę San Andreas 
		i składa się między innymi z miasta Los Santos, które stanowi główne miejsce akcji piątki. Tworząc swój świat Rockstar 
		jeszcze raz postanowił sparodiować znaną nam rzeczywistość, ośmieszając ideologie, produkty, zjawiska i zachowania ludzi. 
		Jednocześnie twórcy GTA V postarali się o rozbudowanie swojej produkcji pod każdym względem w stosunku do poprzednich odsłon cyklu.</p>
		",];
		$games[1]=['StarCraft II: Wings of Liberty','Blizzard Entertainment','2010-07-27',5,'/storage/SCIIWoL.jpg',now(),now(),
		"<p align='justify'>
		StarCraft II: Wings of Liberty to pierwszy epizod kontynuacji jednej z najbardziej znanych strategii czasu rzeczywistego w historii gier komputerowych. Pierwsza część serii została wydana w 1998 roku i doczekała się dodatku pod tytułem Brood War. Na drugą odsłonę składają się w sumie trzy epizody: Wings of Liberty, Heart of the Swarm oraz Legacy of the Void. Za wszystkie odpowiada firma Blizzard.
		</p>
		<p align='justify'>
		StarCraft II w wielu aspektach przypomina pierwowzór, gdyż nie zmieniło się sedno zabawy. Autorzy zdecydowali się jednak podzielić całą grę na trzy wspomniane części, a w każdym z epizodów wcielamy się w jedną z trzech frakcji. Dowodząc Terranami, Zergami i Protossami naszym zadaniem jest doprowadzić każdą z tych ras do zwycięstwa, rozbudowując bazę, zbierając surowce, rozwijając własne możliwości technologiczne oraz oczywiście pokonując wroga. Poszczególne części gry składają się z szeregu misji, w których poznajemy pełną zwrotów akcji historię danej strony konfliktu.
		</p>
		",];
		$games[2]=['Minecraft','Mojang','2011-11-18',4,'/storage/minecraft.jpg',now(),now(),
		"<p align='justify'>Minecraft na PC, X360 itd. to przebojowa produkcja niezależnego studia Mojang Specifications. 
		Gracze wcielają się w górnika, który wpierw pozyskuje duże przypominające cegły bloki, a potem tworzy z nich różnego 
		rodzaju konstrukcje.
		</p>
		",];
		$games[3]=['Factorio','Wube Software','2012-12-24',4,'/storage/factorio.jpg',now(),now(),
		"<p align='justify'>Factorio to niezależna strategia ekonomiczna, w której zajmujemy się budowaniem fabryk i ich zarządzaniem. 
		Tytuł został stworzony przez dwóch programistów z Czech działających pod szyldem Wube Software, którzy od zawsze uwielbiali 
		produkcje typu Transport Tycoon, Civilization czy też SimCity, będące wzorem dla ich własnej gry. Projekt został sfinansowany 
		w serwisie Indiegogo w 2013 roku, a niedługo potem do sprzedaży trafiła grywalna wersja alfa.
		</p>
		",];
		$games[4]=['Counter-Strike: Global Offensive','Valve Corporation','2012-08-21',7,'/storage/csgo.jpg',now(),now(),
		"<p align='justify'>Counter-Strike: Global Offensive to kolejna, po Counter-Strike: Source, próba odświeżenia tej popularnej strzelanki, która zaczynała jako modyfikacja Half-Life. Mimo upływu lat, nie zmienia się filozofia rozgrywki - nadal do czynienia mamy z drużynową grą akcji. Naprzeciw stają dwa zespoły - terroryści oraz próbujące ich powstrzymać siły specjalne. Za każdego wyeliminowanego przeciwnika nagradzani jesteśmy gotówką, za którą na początku kolejnej rundy możemy kupić lepszą broń i uzbrojenie. W grze znajdziemy cztery tryby rozgrywki: wyścig zbrojeń, demolkę, turniejowy uproszczony oraz klasyczny uproszczony. Pierwszy to wariacja klasycznego deathmatchu – po zabiciu przeciwnika dostajemy nową broń. Drugim rządzi podobna zasada w kwestii otrzymywania nowego ekwipunku, ale zabawa podzielona jest na rundy, podobnie jak w klasycznych trybach. Trzeci, jak nazwa wskazuje, przeznaczony jest dla początkujących graczy i jego zadaniem jest wprowadzenie nowicjuszy w tajniki Counter-Strike, m.in. poprzez zrezygnowanie z ognia przyjacielskiego. Tryb klasyczny turniejowy został pozbawiony wszelkich udogodnień. W CS: GO dostępne jest pięć map typu de_ (rozbrajanie/podkładanie bomby) oraz dwie cs_ (odbijanie zakładników). Każda z siedmiu plansz jest wzorowana na klasycznych polach bitew znanych z poprzednich odsłon serii. Fani na pewno rozpoznają nazwy poszczególnych aren: Dust, Dust2, Aztec, Nuke, Inferno, Italy oraz Office. Oczywiście nie obyło się bez drobnych zmian, lecz służą one jedynie polepszeniu jakości rozgrywki. Lista dostępnego uzbrojenia została rozszerzona o kilka pozycji. Osiem nowych narzędzi zniszczenia to koktajl Mołotowa, granat-przynęta, IMI Negev, Tec-9, Mag-7, Sawed-Off, PP-Bizon oraz Taser. Szczególnie ciekawy jest ten ostatni gadżet - drogi, lecz pozwalający na zabicie przeciwnika jednym celnym strzałem. Przygotowany został także odświeżony system matchmakingu, który dobiera przeciwników według posiadanych umiejętności. Poza serwerami utrzymywanymi przez Valve możemy także hostować własne rozgrywki.
		</p>
		",];
		foreach($games as $game){
			$this->addGame($game);
		}
	}
}
