<?php

use Illuminate\Database\Seeder;

class PaisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paises = array(
                        array('id' => '1','name' => 'Venezuela','nacionalidad' => 'Venezolana'),
                        array('id' => '2','name' => 'Afganistán','nacionalidad' => 'Afgana'),
                        array('id' => '3','name' => 'Albania','nacionalidad' => 'Albanesa'),
                        array('id' => '4','name' => 'Alemania','nacionalidad' => 'Alemana'),
                        array('id' => '5','name' => 'Alto volta','nacionalidad' => 'Alto volteña'),
                        array('id' => '6','name' => 'Andorra','nacionalidad' => 'Andorrana'),
                        array('id' => '7','name' => 'Angola','nacionalidad' => 'Angoleña'),
                        array('id' => '8','name' => 'Argelia','nacionalidad' => 'Argelina'),
                        array('id' => '9','name' => 'Argentina','nacionalidad' => 'Argentina'),
                        array('id' => '10','name' => 'Australia','nacionalidad' => 'Australiana'),
                        array('id' => '11','name' => 'Austria','nacionalidad' => 'Austriaca'),
                        array('id' => '12','name' => 'Bahamas','nacionalidad' => 'Bahamesa'),
                        array('id' => '13','name' => 'Bahrein','nacionalidad' => 'Bahreina'),
                        array('id' => '14','name' => 'Bangladesh','nacionalidad' => 'Bangladesha'),
                        array('id' => '15','name' => 'Barbados','nacionalidad' => 'Barbadesa'),
                        array('id' => '16','name' => 'Belgica','nacionalidad' => 'Belga'),
                        array('id' => '17','name' => 'Belice','nacionalidad' => 'Beliceña'),
                        array('id' => '18','name' => 'Bermudas','nacionalidad' => 'Bermudesa'),
                        array('id' => '19','name' => 'Birmania','nacionalidad' => 'Birmana'),
                        array('id' => '20','name' => 'Bolivia','nacionalidad' => 'Boliviana'),
                        array('id' => '21','name' => 'Botswana','nacionalidad' => 'Botswanesa'),
                        array('id' => '22','name' => 'Brasil','nacionalidad' => 'Brasileña'),
                        array('id' => '23','name' => 'Bulgaria','nacionalidad' => 'Bulgara'),
                        array('id' => '24','name' => 'Burundi','nacionalidad' => 'Burundesa'),
                        array('id' => '25','name' => 'Butan','nacionalidad' => 'Butana'),
                        array('id' => '26','name' => 'Khemer Rep de Camboya ','nacionalidad' => 'Camboyana'),
                        array('id' => '27','name' => 'Camerun','nacionalidad' => 'Camerunesa'),
                        array('id' => '28','name' => 'Canada','nacionalidad' => 'Canadiense'),
                        array('id' => '29','name' => 'Rep Centroafricana','nacionalidad' => 'Centroafricana'),
                        array('id' => '30','name' => 'Chad','nacionalidad' => 'Chadeña'),
                        array('id' => '31','name' => 'Rep. Checa','nacionalidad' => 'Checoslovaca'),
                        array('id' => '32','name' => 'Chile','nacionalidad' => 'Chilena'),
                        array('id' => '33','name' => 'China','nacionalidad' => 'China'),
                        array('id' => '34','name' => 'Taiwan','nacionalidad' => 'China'),
                        array('id' => '35','name' => 'Chipre','nacionalidad' => 'Chipriota'),
                        array('id' => '36','name' => 'Colombia','nacionalidad' => 'Colombiana'),
                        array('id' => '37','name' => 'Congo','nacionalidad' => 'Congoleña'),
                        array('id' => '38','name' => 'Costa Rica','nacionalidad' => 'Costarricense'),
                        array('id' => '39','name' => 'Cuba','nacionalidad' => 'Cubana'),
                        array('id' => '40','name' => 'Dahoney','nacionalidad' => 'Dahoneya'),
                        array('id' => '41','name' => 'Dinamarca','nacionalidad' => 'Danes'),
                        array('id' => '42','name' => 'Rep. Dominicana','nacionalidad' => 'Dominicana'),
                        array('id' => '43','name' => 'Ecuador','nacionalidad' => 'Ecuatoriana'),
                        array('id' => '44','name' => 'Egipto','nacionalidad' => 'Egipcia'),
                        array('id' => '45','name' => 'Emiratos Arabes Udo.','nacionalidad' => 'Emirata'),
                        array('id' => '46','name' => 'Escocia','nacionalidad' => 'Escosesa'),
                        array('id' => '47','name' => 'Rep. Eslovaca','nacionalidad' => 'Eslovaca'),
                        array('id' => '48','name' => 'España','nacionalidad' => 'Española'),
                        array('id' => '49','name' => 'Estonia','nacionalidad' => 'Estona'),
                        array('id' => '50','name' => 'Etiopia','nacionalidad' => 'Etiope'),
                        array('id' => '51','name' => 'Fiji','nacionalidad' => 'Fijena'),
                        array('id' => '52','name' => 'Filipinas','nacionalidad' => 'Filipina'),
                        array('id' => '53','name' => 'Finlandia','nacionalidad' => 'Finlandesa'),
                        array('id' => '54','name' => 'Francia','nacionalidad' => 'Francesa'),
                        array('id' => '55','name' => 'Gambia','nacionalidad' => 'Gabiana'),
                        array('id' => '56','name' => 'Gabon','nacionalidad' => 'Gabona'),
                        array('id' => '57','name' => 'Gales','nacionalidad' => 'Galesa'),
                        array('id' => '58','name' => 'Ghana','nacionalidad' => 'Ghanesa'),
                        array('id' => '59','name' => 'Granada','nacionalidad' => 'Granadeña'),
                        array('id' => '60','name' => 'Grecia','nacionalidad' => 'Griega'),
                        array('id' => '61','name' => 'Guatemala','nacionalidad' => 'Guatemalteca'),
                        array('id' => '62','name' => 'Guinea Ecuatorial','nacionalidad' => 'Guinesa Ecuatoriana'),
                        array('id' => '63','name' => 'Guinea','nacionalidad' => 'Guinesa'),
                        array('id' => '64','name' => 'Guyana','nacionalidad' => 'Guyanesa'),
                        array('id' => '65','name' => 'Haiti','nacionalidad' => 'Haitiana'),
                        array('id' => '66','name' => 'Holanda','nacionalidad' => 'Holandesa'),
                        array('id' => '67','name' => 'Honduras','nacionalidad' => 'Hondureña'),
                        array('id' => '68','name' => 'Hungria','nacionalidad' => 'Hungara'),
                        array('id' => '69','name' => 'India','nacionalidad' => 'India'),
                        array('id' => '70','name' => 'Indonesia','nacionalidad' => 'Indonesa'),
                        array('id' => '71','name' => 'Inglaterra','nacionalidad' => 'Inglesa'),
                        array('id' => '72','name' => 'Irak','nacionalidad' => 'Iraki'),
                        array('id' => '73','name' => 'Iran','nacionalidad' => 'Irani'),
                        array('id' => '74','name' => 'Irlanda','nacionalidad' => 'Irlandesa'),
                        array('id' => '75','name' => 'Islandia','nacionalidad' => 'Islandesa'),
                        array('id' => '76','name' => 'Israel','nacionalidad' => 'Israeli'),
                        array('id' => '77','name' => 'Italia','nacionalidad' => 'Italiana'),
                        array('id' => '78','name' => 'Jamaica','nacionalidad' => 'Jamaiquina'),
                        array('id' => '79','name' => 'Japon','nacionalidad' => 'Japonesa'),
                        array('id' => '80','name' => 'Jordania','nacionalidad' => 'Jordana'),
                        array('id' => '81','name' => 'Katar','nacionalidad' => 'Katensa'),
                        array('id' => '82','name' => 'Kenia','nacionalidad' => 'Keniana'),
                        array('id' => '83','name' => 'Kwait','nacionalidad' => 'Kuwaiti'),
                        array('id' => '84','name' => 'Laos','nacionalidad' => 'Laosiana'),
                        array('id' => '85','name' => 'Sierra leona','nacionalidad' => 'Leonesa'),
                        array('id' => '86','name' => 'Lesotho','nacionalidad' => 'Lesothensa'),
                        array('id' => '87','name' => 'Letonia','nacionalidad' => 'Letonesa'),
                        array('id' => '88','name' => 'Libano','nacionalidad' => 'Libanesa'),
                        array('id' => '89','name' => 'Liberia','nacionalidad' => 'Liberiana'),
                        array('id' => '90','name' => 'Libia','nacionalidad' => 'Libeña'),
                        array('id' => '91','name' => 'Liechtenstein','nacionalidad' => 'Liechtenstein'),
                        array('id' => '92','name' => 'Lituania','nacionalidad' => 'Lituana'),
                        array('id' => '93','name' => 'Luxemburgo','nacionalidad' => 'Luxemburgo'),
                        array('id' => '94','name' => 'Madagascar','nacionalidad' => 'Madagascar'),
                        array('id' => '95','name' => 'Fede. de Malasia','nacionalidad' => 'Malaca'),
                        array('id' => '96','name' => 'Malawi','nacionalidad' => 'Malawi'),
                        array('id' => '97','name' => 'Maldivas','nacionalidad' => 'Maldivas'),
                        array('id' => '98','name' => 'Mali','nacionalidad' => 'Mali'),
                        array('id' => '99','name' => 'Malta','nacionalidad' => 'Maltesa'),
                        array('id' => '100','name' => 'Costa de Marfil','nacionalidad' => 'Marfilesa'),
                        array('id' => '101','name' => 'Marruecos','nacionalidad' => 'Marroqui'),
                        array('id' => '102','name' => 'Mauricio','nacionalidad' => 'Mauricio'),
                        array('id' => '103','name' => 'Mauritania','nacionalidad' => 'Mauritana'),
                        array('id' => '104','name' => 'México','nacionalidad' => 'Mexicana'),
                        array('id' => '105','name' => 'Monaco','nacionalidad' => 'Monaco'),
                        array('id' => '106','name' => 'Mongolia','nacionalidad' => 'Mongolesa'),
                        array('id' => '107','name' => 'Nauru','nacionalidad' => 'Nauru'),
                        array('id' => '108','name' => 'Nueva Zelandia','nacionalidad' => 'Neozelandesa'),
                        array('id' => '109','name' => 'Nepal','nacionalidad' => 'Nepalesa'),
                        array('id' => '110','name' => 'Nicaragua','nacionalidad' => 'Nicaraguense'),
                        array('id' => '111','name' => 'Niger','nacionalidad' => 'Nigerana'),
                        array('id' => '112','name' => 'Nigeria','nacionalidad' => 'Nigeriana'),
                        array('id' => '113','name' => 'Corea del Norte','nacionalidad' => 'Norcoreana'),
                        array('id' => '114','name' => 'Irlanda del norte','nacionalidad' => 'Norirlandesa'),
                        array('id' => '115','name' => 'Estados unidos','nacionalidad' => 'Norteamericana'),
                        array('id' => '116','name' => 'Noruega','nacionalidad' => 'Noruega'),
                        array('id' => '117','name' => 'Oman','nacionalidad' => 'Omana'),
                        array('id' => '118','name' => 'Pakistan','nacionalidad' => 'Pakistani'),
                        array('id' => '119','name' => 'Panama','nacionalidad' => 'Panameña'),
                        array('id' => '120','name' => 'Paraguay','nacionalidad' => 'Paraguaya'),
                        array('id' => '121','name' => 'Peru','nacionalidad' => 'Peruana'),
                        array('id' => '122','name' => 'Polonia','nacionalidad' => 'Polaca'),
                        array('id' => '123','name' => 'Puerto Rico','nacionalidad' => 'Portoriqueña'),
                        array('id' => '124','name' => 'Portugal','nacionalidad' => 'Portuguesa'),
                        array('id' => '125','name' => 'Rhodesia','nacionalidad' => 'Rhodesiana'),
                        array('id' => '126','name' => 'Ruanda','nacionalidad' => 'Ruanda'),
                        array('id' => '127','name' => 'Rumania','nacionalidad' => 'Rumana'),
                        array('id' => '128','name' => 'Russia','nacionalidad' => 'Rusa'),
                        array('id' => '129','name' => 'El Salvador','nacionalidad' => 'Salvadoreña'),
                        array('id' => '130','name' => 'Samoa Occidental','nacionalidad' => 'Samoa Occidental'),
                        array('id' => '131','name' => 'San Marino','nacionalidad' => 'San marino'),
                        array('id' => '132','name' => 'Arabia Saudita','nacionalidad' => 'Saudi'),
                        array('id' => '133','name' => 'Senegal','nacionalidad' => 'Senegalesa'),
                        array('id' => '134','name' => 'Sikkim','nacionalidad' => 'Sikkim'),
                        array('id' => '135','name' => 'Singapur','nacionalidad' => 'Singapur'),
                        array('id' => '136','name' => 'Siria','nacionalidad' => 'Siria'),
                        array('id' => '137','name' => 'Somalia','nacionalidad' => 'Somalia'),
                        array('id' => '138','name' => 'Union Sovietica','nacionalidad' => 'Sovietica'),
                        array('id' => '139','name' => 'Sri Lanka (Ceylan) ','nacionalidad' => 'Sri Lanka'),
                        array('id' => '140','name' => 'Suazilandia','nacionalidad' => 'Suazilandesa'),
                        array('id' => '141','name' => 'Sudafrica','nacionalidad' => 'Sudafricana'),
                        array('id' => '142','name' => 'Sudan','nacionalidad' => 'Sudanesa'),
                        array('id' => '143','name' => 'Suecia','nacionalidad' => 'Sueca'),
                        array('id' => '144','name' => 'Suiza','nacionalidad' => 'Suiza'),
                        array('id' => '145','name' => 'Corea del Sur','nacionalidad' => 'Surcoreana'),
                        array('id' => '146','name' => 'Tailandia','nacionalidad' => 'Tailandesa'),
                        array('id' => '147','name' => 'Tanzania','nacionalidad' => 'Tanzana'),
                        array('id' => '148','name' => 'Tonga','nacionalidad' => 'Tonga'),
                        array('id' => '149','name' => 'Tongo','nacionalidad' => 'Tongo'),
                        array('id' => '150','name' => 'Trinidad y Tobago','nacionalidad' => 'Trinidad y Tobago'),
                        array('id' => '151','name' => 'Tunez','nacionalidad' => 'Tunecina'),
                        array('id' => '152','name' => 'Turquia','nacionalidad' => 'Turca'),
                        array('id' => '153','name' => 'Uganda','nacionalidad' => 'Ugandesa'),
                        array('id' => '154','name' => 'Uruguay','nacionalidad' => 'Uruguaya'),
                        array('id' => '155','name' => 'Vaticano','nacionalidad' => 'Vaticano'),
                        array('id' => '156','name' => 'Vietnam','nacionalidad' => 'Vietnamita'),
                        array('id' => '157','name' => 'Yemen Rep. Arabe','nacionalidad' => 'Yemen Rep Arabe'),
                        array('id' => '158','name' => 'Yemen Rep. Dem','nacionalidad' => 'Yemen Rep Dem'),
                        array('id' => '159','name' => 'Yugoslavia','nacionalidad' => 'Yugoslava'),
                        array('id' => '160','name' => 'Zaire','nacionalidad' => 'Zaire')
        );

  		\DB::table('paises')->insert($paises);
    }
}
