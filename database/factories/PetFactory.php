<?php

namespace Database\Factories;

use App\Models\Pet;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pet::class;

    private $breeds = [
        'ENGLISH POINTER',
        'ENGLISH SETTER',
        'KERRY BLUE TERRIER',
        'CAIRN TERRIER',
        'ENGLISH COCKER SPANIEL',
        'GORDON SETTER',
        'AIREDALE TERRIER',
        'AUSTRALIAN TERRIER',
        'BEDLINGTON TERRIER',
        'BORDER TERRIER',
        'BULL TERRIER',
        'FOX TERRIER (SMOOTH)',
        'ENGLISH TOY TERRIER (BLACK &TAN)',
        'SWEDISH VALLHUND',
        'BELGIAN SHEPHERD DOG',
        'OLD ENGLISH SHEEPDOG',
        'GRIFFON NIVERNAIS',
        'BRIQUET GRIFFON VENDEEN',
        'ARIEGEOIS',
        'GASCON SAINTONGEOIS',
        'GREAT GASCONY BLUE',
        'POITEVIN',
        'BILLY',
        'ARTOIS HOUND',
        'PORCELAINE',
        'SMALL BLUE GASCONY',
        'BLUE GASCONY GRIFFON',
        'GRAND BASSET GRIFFON VENDEEN',
        'NORMAN ARTESIEN BASSET',
        'BLUE GASCONY BASSET',
        'BASSET FAUVE DE BRETAGNE',
        'PORTUGUESE WATER DOG',
        'WELSH CORGI (CARDIGAN)',
        'WELSH CORGI (PEMBROKE)',
        'IRISH SOFT COATED WHEATEN TERRIER',
        'YUGOSLAVIAN SHEPHERD DOG - SHARPLANINA',
        'JÄMTHUND',
        'BASENJI',
        'BERGER DE BEAUCE',
        'BERNESE MOUNTAIN DOG',
        'APPENZELL CATTLE DOG',
        'ENTLEBUCH CATTLE DOG',
        'KARELIAN BEAR DOG',
        'FINNISH SPITZ',
        'NEWFOUNDLAND',
        'FINNISH HOUND',
        'POLISH HOUND',
        'KOMONDOR',
        'KUVASZ',
        'PULI',
        'PUMI',
        'HUNGARIAN SHORT-HAIRED POINTER (VIZSLA)',
        'GREAT SWISS MOUNTAIN DOG',
        'SWISS HOUND',
        'SMALL SWISS HOUND',
        'ST. BERNARD',
        'COARSE-HAIRED STYRIAN HOUND',
        'AUSTRIAN BLACK AND TAN HOUND',
        'AUSTRIAN  PINSCHER',
        'MALTESE',
        'FAWN BRITTANY GRIFFON',
        'PETIT BASSET GRIFFON VENDEEN',
        'TYROLEAN HOUND',
        'LAKELAND TERRIER',
        'MANCHESTER TERRIER',
        'NORWICH TERRIER',
        'SCOTTISH TERRIER',
        'SEALYHAM TERRIER',
        'SKYE TERRIER',
        'STAFFORDSHIRE BULL TERRIER',
        'CONTINENTAL TOY SPANIEL',
        'WELSH TERRIER',
        'GRIFFON BRUXELLOIS',
        'GRIFFON BELGE',
        'PETIT BRABANÇON',
        'SCHIPPERKE',
        'BLOODHOUND',
        'WEST HIGHLAND WHITE TERRIER',
        'YORKSHIRE TERRIER',
        'CATALAN SHEEPDOG',
        'SHETLAND SHEEPDOG',
        'IBIZAN PODENCO',
        'BURGOS POINTING DOG',
        'SPANISH MASTIFF',
        'PYRENEAN MASTIFF',
        'PORTUGUESE SHEEPDOG',
        'PORTUGUESE WARREN HOUND-PORTUGUESE PODENGO',
        'BRITTANY SPANIEL',
        'RAFEIRO OF ALENTEJO',
        'GERMAN SPITZ',
        'GERMAN WIRE- HAIRED POINTING DOG',
        'WEIMARANER',
        'WESTPHALIAN DACHSBRACKE',
        'FRENCH BULLDOG',
        'KLEINER MÜNSTERLÄNDER',
        'GERMAN HUNTING TERRIER',
        'GERMAN SPANIEL',
        'FRENCH WATER DOG',
        'BLUE PICARDY SPANIEL',
        'WIRE-HAIRED POINTING GRIFFON KORTHALS',
        'PICARDY SPANIEL',
        'CLUMBER SPANIEL',
        'CURLY COATED RETRIEVER',
        'GOLDEN RETRIEVER',
        'BRIARD',
        'PONT-AUDEMER SPANIEL',
        'SAINT GERMAIN POINTER',
        'DOGUE DE BORDEAUX',
        'DEUTSCH LANGHAAR',
        'LARGE MUNSTERLANDER',
        'GERMAN SHORT- HAIRED POINTING DOG',
        'IRISH RED SETTER',
        'FLAT COATED RETRIEVER',
        'LABRADOR RETRIEVER',
        'FIELD SPANIEL',
        'IRISH WATER SPANIEL',
        'ENGLISH SPRINGER SPANIEL',
        'WELSH SPRINGER SPANIEL',
        'SUSSEX SPANIEL',
        'KING CHARLES SPANIEL',
        'SMÅLANDSSTÖVARE',
        'DREVER',
        'SCHILLERSTÖVARE',
        'HAMILTONSTÖVARE',
        'FRENCH POINTING DOG - GASCOGNE TYPE',
        'FRENCH POINTING DOG - PYRENEAN TYPE',
        'SWEDISH LAPPHUND',
        'CAVALIER KING CHARLES SPANIEL',
        'PYRENEAN MOUNTAIN DOG',
        'PYRENEAN SHEEPDOG - SMOOTH FACED',
        'IRISH TERRIER',
        'BOSTON TERRIER',
        'LONG-HAIRED PYRENEAN SHEEPDOG',
        'SLOVAKIAN CHUVACH',
        'DOBERMANN',
        'BOXER',
        'LEONBERGER',
        'RHODESIAN RIDGEBACK',
        'ROTTWEILER',
        'DACHSHUND',
        'BULLDOG',
        'SERBIAN HOUND',
        'ISTRIAN SHORT-HAIRED HOUND',
        'ISTRIAN WIRE-HAIRED HOUND',
        'DALMATIAN',
        'POSAVATZ HOUND',
        'BOSNIAN BROKEN-HAIRED HOUND - CALLED BARAK',
        'COLLIE ROUGH',
        'BULLMASTIFF',
        'GREYHOUND',
        'ENGLISH FOXHOUND',
        'IRISH WOLFHOUND',
        'BEAGLE',
        'WHIPPET',
        'BASSET HOUND',
        'DEERHOUND',
        'ITALIAN SPINONE',
        'GERMAN SHEPHERD DOG',
        'AMERICAN COCKER SPANIEL',
        'DANDIE DINMONT TERRIER',
        'FOX TERRIER (WIRE)',
        'CASTRO LABOREIRO DOG',
        'BOUVIER DES ARDENNES',
        'POODLE',
        'ESTRELA MOUNTAIN DOG',
        'FRENCH SPANIEL',
        'PICARDY SHEEPDOG',
        'ARIEGE POINTING DOG',
        'BOURBONNAIS POINTING DOG',
        'AUVERGNE POINTER',
        'GIANT SCHNAUZER',
        'SCHNAUZER',
        'MINIATURE SCHNAUZER',
        'GERMAN PINSCHER',
        'MINIATURE PINSCHER',
        'AFFENPINSCHER',
        'PORTUGUESE POINTING DOG',
        'SLOUGHI',
        'FINNISH LAPPONIAN DOG',
        'HOVAWART',
        'BOUVIER DES FLANDRES',
        'KROMFOHRLÄNDER',
        'BORZOI - RUSSIAN HUNTING SIGHTHOUND',
        'BERGAMASCO SHEPHERD DOG',
        'ITALIAN VOLPINO',
        'BOLOGNESE',
        'NEAPOLITAN MASTIFF',
        'ITALIAN ROUGH-HAIRED SEGUGIO',
        'CIRNECO DELL\'ETNA',
        'ITALIAN SIGHTHOUND',
        'MAREMMA AND THE ABRUZZES SHEEPDOG',
        'ITALIAN POINTING DOG',
        'NORWEGIAN HOUND',
        'SPANISH HOUND',
        'CHOW CHOW',
        'JAPANESE CHIN',
        'PEKINGESE',
        'SHIH TZU',
        'TIBETAN TERRIER',
        'CANADIAN ESKIMO DOG',
        'SAMOYED',
        'HANOVERIAN SCENT HOUND',
        'HELLENIC HOUND',
        'BICHON FRISE',
        'PUDELPOINTER',
        'BAVARIAN MOUNTAIN SCENT HOUND',
        'CHIHUAHUA',
        'FRENCH TRICOLOUR HOUND',
        'FRENCH WHITE & BLACK HOUND',
        'FRISIAN WATER DOG',
        'STABIJHOUN',
        'DUTCH SHEPHERD DOG',
        'DRENTSCHE PARTRIDGE DOG',
        'FILA BRASILEIRO',
        'LANDSEER (EUROPEAN CONTINENTAL TYPE)',
        'LHASA APSO',
        'AFGHAN HOUND',
        'SERBIAN TRICOLOUR HOUND',
        'TIBETAN MASTIFF',
        'TIBETAN SPANIEL',
        'DEUTSCH STICHELHAAR',
        'LITTLE LION DOG',
        'XOLOITZCUINTLE',
        'GREAT DANE',
        'AUSTRALIAN SILKY TERRIER',
        'NORWEGIAN BUHUND',
        'MUDI',
        'HUNGARIAN WIRE-HAIRED POINTER',
        'HUNGARIAN GREYHOUND',
        'HUNGARIAN HOUND - TRANSYLVANIAN SCENT HOUND',
        'NORWEGIAN ELKHOUND GREY',
        'ALASKAN MALAMUTE',
        'SLOVAKIAN HOUND',
        'BOHEMIAN WIRE-HAIRED POINTING GRIFFON',
        'CESKY TERRIER',
        'ATLAS MOUNTAIN DOG (AIDI)',
        'PHARAOH HOUND',
        'MAJORCA MASTIFF',
        'HAVANESE',
        'POLISH LOWLAND SHEEPDOG',
        'TATRA SHEPHERD DOG',
        'PUG',
        'ALPINE DACHSBRACKE',
        'AKITA',
        'SHIBA',
        'JAPANESE TERRIER',
        'TOSA',
        'HOKKAIDO',
        'JAPANESE SPITZ',
        'CHESAPEAKE BAY RETRIEVER',
        'MASTIFF',
        'NORWEGIAN LUNDEHUND',
        'HYGEN HOUND',
        'HALDEN HOUND',
        'NORWEGIAN ELKHOUND BLACK',
        'SALUKI',
        'SIBERIAN HUSKY',
        'BEARDED COLLIE',
        'NORFOLK TERRIER',
        'CANAAN DOG',
        'GREENLAND DOG',
        'NORRBOTTENSPITZ',
        'CROATIAN SHEPHERD DOG',
        'KARST SHEPHERD DOG',
        'MONTENEGRIN MOUNTAIN HOUND',
        'OLD DANISH POINTING DOG',
        'GRAND GRIFFON VENDEEN',
        'COTON DE TULEAR',
        'LAPPONIAN HERDER',
        'SPANISH GREYHOUND',
        'AMERICAN STAFFORDSHIRE TERRIER',
        'AUSTRALIAN CATTLE DOG',
        'CHINESE CRESTED DOG',
        'ICELANDIC SHEEPDOG',
        'BEAGLE HARRIER',
        'EURASIAN',
        'DOGO ARGENTINO',
        'AUSTRALIAN KELPIE',
        'OTTERHOUND',
        'HARRIER',
        'COLLIE SMOOTH',
        'BORDER COLLIE',
        'ROMAGNA WATER DOG',
        'GERMAN HOUND',
        'BLACK AND TAN COONHOUND',
        'AMERICAN WATER SPANIEL',
        'IRISH GLEN OF IMAAL TERRIER',
        'AMERICAN FOXHOUND',
        'RUSSIAN-EUROPEAN LAIKA',
        'EAST SIBERIAN LAIKA',
        'WEST SIBERIAN LAIKA',
        'AZAWAKH',
        'DUTCH SMOUSHOND',
        'SHAR PEI',
        'PERUVIAN HAIRLESS DOG',
        'SAARLOOS WOLFHOND',
        'NOVA SCOTIA DUCK TOLLING RETRIEVER',
        'DUTCH SCHAPENDOES',
        'NEDERLANDSE KOOIKERHONDJE',
        'BROHOLMER',
        'FRENCH WHITE AND ORANGE HOUND',
        'KAI',
        'KISHU',
        'SHIKOKU',
        'WIREHAIRED SLOVAKIAN POINTER',
        'MAJORCA SHEPHERD DOG',
        'GREAT ANGLO-FRENCH TRICOLOUR HOUND',
        'GREAT ANGLO-FRENCH WHITE AND BLACK HOUND',
        'GREAT ANGLO-FRENCH WHITE & ORANGE HOUND',
        'MEDIUM-SIZED ANGLO-FRENCH HOUND',
        'SOUTH RUSSIAN SHEPHERD DOG',
        'RUSSIAN BLACK TERRIER',
        'CAUCASIAN SHEPHERD DOG',
        'CANARIAN WARREN HOUND',
        'IRISH RED AND WHITE SETTER',
        'KANGAL SHEPHERD DOG',
        'CZECHOSLOVAKIAN WOLFDOG',
        'POLISH GREYHOUND',
        'KOREA JINDO DOG',
        'CENTRAL ASIA SHEPHERD DOG',
        'SPANISH WATER DOG',
        'ITALIAN SHORT-HAIRED SEGUGIO',
        'THAI RIDGEBACK DOG',
        'PARSON RUSSELL TERRIER',
        'SAINT MIGUEL CATTLE DOG',
        'BRAZILIAN TERRIER',
        'AUSTRALIAN SHEPHERD',
        'ITALIAN CANE CORSO',
        'AMERICAN AKITA',
        'JACK RUSSELL TERRIER',
        'PRESA CANARIO',
        'WHITE SWISS SHEPHERD DOG',
        'TAIWAN DOG',
        'ROMANIAN MIORITIC SHEPHERD DOG',
        'ROMANIAN CARPATHIAN SHEPHERD DOG',
        'AUSTRALIAN STUMPY TAIL CATTLE DOG',
        'RUSSIAN TOY',
        'CIMARRÓN URUGUAYO',
        'POLISH HUNTING DOG',
        'BOSNIAN AND HERZEGOVINIAN - CROATIAN SHEPHERD DOG',
        'DANISH-SWEDISH FARMDOG',
        'ROMANIAN BUCOVINA SHEPHERD',
        'THAI BANGKAEW DOG',
        'MINIATURE BULL TERRIER',
        'LANCASHIRE HEELER',
        'SEGUGIO MAREMMANO',
        'KINTAMANI-BALI DOG',
        'PRAGUE RATTER',
        'BOHEMIAN SHEPHERD DOG',
        'YAKUTIAN LAIKA',
        'ESTONIAN HOUND',
        'MINIATURE AMERICAN SHEPHERD',
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'          => $this->faker->name,
            'date_of_birth' => now()->subYears($this->faker->randomNumber(1)),
            'user_id'       => User::factory(),
            'breed'         => $this->faker->randomElement($this->breeds),
        ];
    }
}