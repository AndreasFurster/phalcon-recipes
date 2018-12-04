USE `recipes`;

-- Trick to show a comment
select 'This seed method only works on a clean databases with autoincrements on 0' AS '';


-- Username: oma.biesheuvel@hetnet.nl, Password: nietmeervergetenoma
INSERT INTO `user` (`email`, `password`) VALUES ( 'oma.biesheuvel@hetnet.nl', '$2y$10$IjYJYHCYK0JVnjfcQbQuxeiMdeMtZ/mRqLifPc9w5t19FMilmDy7y' );

INSERT INTO `ingredient` (`name`) VALUES ( 'Kaas' );
INSERT INTO `ingredient` (`name`) VALUES ( 'Appels' );
INSERT INTO `ingredient` (`name`) VALUES ( 'Basterd suiker' );
INSERT INTO `ingredient` (`name`) VALUES ( 'Bloem' );
INSERT INTO `ingredient` (`name`) VALUES ( 'Boter' );
INSERT INTO `ingredient` (`name`) VALUES ( 'Ei' );
INSERT INTO `ingredient` (`name`) VALUES ( 'Kaneel' );
INSERT INTO `ingredient` (`name`) VALUES ( 'Melk' );
INSERT INTO `ingredient` (`name`) VALUES ( 'Suiker' );
INSERT INTO `ingredient` (`name`) VALUES ( 'Vanille suiker' );
INSERT INTO `ingredient` (`name`) VALUES ( 'Water' );
INSERT INTO `ingredient` (`name`) VALUES ( 'Zout' );

INSERT INTO `recipe` (`title`, `image`, `subtitle`, `instruction`) VALUES (
    'Appeltaart',
    'https://images.unsplash.com/photo-1541016798630-d0563e0c6017?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=70675521389b2a4d6faf515b996c0e70&auto=format&fit=crop&w=2000&q=90',
    'Heerlijke omas appeltaart',
    '<p>Klop het ei losverdeel in twee delen.&nbsp;De ene is voor het deeg, de ander voor hetbestrijken.</p><p>Meng boter,basterdsuiker, zelfrijzend bakmeel, het halve ei, vanillesuiker en een snufjezout tot een stevig deeg en verdeel in 3 delen. Is jouw deeg nog te droog, ofjuist te plakkerig? Lees dan hier hoe je er eenvoudig een&nbsp;<a href="http://www.handigebaktips.nl/droog-of-plakkerig-deeg-werkbaar-maken/" target="_blank">mooi deeg van maakt</a>.</p><p>Schil nu de appels en snij deze in plakjes. Vermeng in eenkopje de suiker met kaneel.</p><p>Vet de springvorm in en bestuif met bloem.</p><p>Gebruik &eacute;&eacute;n deel deeg om de bodem van de vorm mee tebedekken. Een tweede deel deeg gebruik je voor de randen. Strooi het paneermeelop de bodem van de beklede vorm. De paneermeel neemt het vocht van de appelsop.</p><p>Doe de helft van de appels in de vorm en strooi hier 1/3 vanhet kaneel-suiker mengsel overheen. De overige appelschijfjes kun je nu ook inde vorm doen, strooi de rest van het kaneel-suiker mengsel erover.</p><p>Rol het laatste deel deeg uit tot een dunne lap en snijstroken van ongeveer 1 cm breed.</p><p>Leg de stroken kruislings op de appeltaart. Met watextra deegstroken werk je de rand rondom af. Gebruik het halve ei om de strokenin te smeren.</p><p>Zet de taart iets onder het midden van de oven. Bak in 60minuten op 170 graden gaar en goudbruin.</p><p>Laat de taart afkoelen in de vorm voordat je de ringverwijdert.</p><p>Nog een klein beetje warm met een toef slagroom is dezetaart heel erg lekker. Maar de volgende dag is hij eigenlijk n&oacute;g lekkerder, alsde smaken lekker zijn doorgetrokken.</p><p>Deze post had ik al een poosje terug gepland voor deze dag.Wat wil het toeval nou? Mijn opa en oma zouden vandaag 58 jaar getrouwd zijn!Zonder dat ik het wist heb ik deze post dus op een mooie dag geplaatst.</p><p>Opa en Oma Reijken, deze appeltaart is voor jullie!</p>'
);


INSERT INTO `recipe` (`title`, `image`, `subtitle`, `instruction`) VALUES (
    'Boterkoek',
    'https://kookidee.nl/wp-content/uploads/2015/07/makkelijke-boterkoek.jpg',
    'Een hele makkelijke en lekkere boterkoek',
    '<p>Verwarm de oven voor op 180 graden en haal de roomboter van tevoren uit de koelkast zodat deze op kamertemperatuur is.</p><p>Snijd de roomboter in kleine blokjes en doe deze in een beslagkom, voeg hier de suiker en de vanillesuiker aan toe en mix met een handmixer tot een luchtige substantie. Breek nu &eacute;&eacute;n ei boven de beslagkom en voeg een snufje zout toe, nogmaals mengen met de handmixer tot alles goed door elkaar is gemengd.</p><p>Voeg nu beetje bij beetje de bloem toe terwijl je de mixer laat draaien, je ziet dat je nu een klonterig deeg in je beslagkom krijgt. Roer alles nog even goed door met een eetlepel zodat ook de bloem die nog onderin ligt goed door het beslag wordt gemengd.</p><p>Vet de vorm in met boter en lepel het beslag in je vorm, druk alles goed plat met de achterkant van een lepel tot het deeg goed over de vorm is verdeeld. Klop het andere ei in een apart kommetje en smeer de bovenkant van het deeg in je vorm nu in met het eiermengsel, je hebt niet alles nodig dus smeer het er niet te dik op.</p><p>Eventueel kan je nu met een scherp mesje vast dunne streepjes trekken ter grootte van de uiteindelijke punten, of gebruik een vork om er een leuk patroon in te trekken. Zet de vorm nu ongeveer 25 minuten in je voorverwarmde oven en kijk aan het einde of je boterkoek mooi bruin is geworden. Zo niet dan verleng je de oventijd nog een paar minuutjes.</p><p>Haal de boterkoek uit de oven om af te laten koelen en snijd hem vast los van de vorm met het schuifje van je boterkoekvorm. Gebruik je een taartvorm dan kan je de zijkanten even met een dunne spatel lossnijden van de vorm, laat de koek in je vorm verder afkoelen omdat deze anders snel breekt.</p><h3>Variatie met citroen</h3><p>Wil je een&nbsp;<strong>wat frissere smaak</strong>&nbsp;dan is het ook erg lekker om&nbsp;<strong>citroenrasp</strong>&nbsp;aan je boterkoek toe te voegen. Rasp de schil van een citroen en vang dit op in een bakje of op een bord, doe dan tegelijk met de boter en suiker&nbsp;<strong>twee theelepels citroenrasp</strong>&nbsp;in je beslagkom en bereid verder zoals hierboven.</p>'
);



INSERT INTO `recipe_ingredient` (`recipe_id`, `ingredient_id`, `amount`) VALUES (1, 1, '10');
INSERT INTO `recipe_ingredient` (`recipe_id`, `ingredient_id`, `amount`) VALUES (1, 2, '100 gr');
INSERT INTO `recipe_ingredient` (`recipe_id`, `ingredient_id`, `amount`) VALUES (1, 3, '400 gr');
INSERT INTO `recipe_ingredient` (`recipe_id`, `ingredient_id`, `amount`) VALUES (1, 4, 'Beetje');
INSERT INTO `recipe_ingredient` (`recipe_id`, `ingredient_id`, `amount`) VALUES (1, 5, '1');
INSERT INTO `recipe_ingredient` (`recipe_id`, `ingredient_id`, `amount`) VALUES (1, 6, 'Snufje');


INSERT INTO `recipe_ingredient` (`recipe_id`, `ingredient_id`, `amount`) VALUES (2, 4, '300 gr');
INSERT INTO `recipe_ingredient` (`recipe_id`, `ingredient_id`, `amount`) VALUES (2, 5, '200 gr');
INSERT INTO `recipe_ingredient` (`recipe_id`, `ingredient_id`, `amount`) VALUES (2, 9, '200 gr');
INSERT INTO `recipe_ingredient` (`recipe_id`, `ingredient_id`, `amount`) VALUES (2, 10, '8 gr');
INSERT INTO `recipe_ingredient` (`recipe_id`, `ingredient_id`, `amount`) VALUES (2, 6, '2x');
INSERT INTO `recipe_ingredient` (`recipe_id`, `ingredient_id`, `amount`) VALUES (2, 7, 'Snufje');

