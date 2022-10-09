-- TODO(4) to be evaluated the truncate operation

-- SET FOREIGN_KEY_CHECKS = 0;
-- TRUNCATE TABLE `llx_dolifarm_crops`;
-- SET FOREIGN_KEY_CHECKS = 1;
--
-- Dump THe table  `llx_dolifarm_crops`  is inizialized only if it is empty. This is to avoid lost of data. The table is used to create a dictionary
--
IF EXISTS (select * from `llx_dolifarm_crops`)
-- SELECT 'Table is not empty'
ELSE
INSERT INTO `llx_dolifarm_crops` (`code`,  `label`, `family`, `latingenus`, `localname`,  `species`, `photo`, `plantingrate`, `def_plantingunit`, `estimatedyield`, `def_estimatedyield`, `note_public`, `active`, `status` ) VALUES
('ALMOND','Almonds', 'Rosaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('APPLE','Apple', 'Rosaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('APRICOT','Apricot', 'Rosaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('ARABLE-S','Arable Silage', 'Other', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('ARABLE-SU', 'Arable Silage Undersown', 'Other', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('ARITCHOKE','Artichoke', 'Asteraceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('ARITCHOKE-G','Artichoke / Globe', 'Asteraceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('ARITCHOKE-J', 'Artichoke / Jerusalem', 'Asteraceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('ASPARAGUS','Asparagus', 'Liliaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('AUBERGINE', 'Aubergine', 'Solanaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('AVOCADO', 'Avocado', 'Lauraceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('BANANA','Banana', 'Musaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('BARLEY', 'Barley', 'Gramineae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('BEANS', 'Beans', 'Leguminosae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('BEANS-B', 'Beans / Broad', 'Leguminosae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('BEANS-D', 'Beans / Dwarf French', 'Leguminosae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('BEANS-R', 'Beans / Runner', 'Leguminosae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('BEETROOT', 'Beetroot', 'Chenopodiaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('BLACKBERRY', 'Blackberry', 'Rosaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('BLUEBERRY', 'Blueberry', 'Ericaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('BROCCOLI', 'Broccoli', 'Cruciferae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('BROCCOLI-M', 'Broccoli / Marathon', 'Cruciferae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('BROCCOLI-P', 'Broccoli / Purple sprouting', 'Cruciferae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('BROCCOLI-B', 'Brussels Sprouts', 'Cruciferae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('BUCKWHEAT', 'Buckwheat', 'Polygonaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('CABBAGE', 'Cabbage', 'Cruciferae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('CABBAGE-G', 'Cabbage / Green', 'Cruciferae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('CABBAGE-GP', 'Cabbage / Green / Pointed', 'Cruciferae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('CABBAGE-GR', 'Cabbage / Green / Round', 'Cruciferae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('CABBAGE-GT', 'Cabbage / Green / Tundra', 'Cruciferae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('CABBAGE-GW', 'Cabbage / Green / Winter', 'Cruciferae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('CABBAGE-R', 'Cabbage / Red', 'Cruciferae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('CABBAGE-S','Cabbage / Savoy', 'Cruciferae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('CABBAGE-W', 'Cabbage / White', 'Cruciferae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('CASPICUM', 'Capsicum', 'Solanaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('CASPICUM-CA', 'Capsicum / Californian', 'Solanaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('CASPICUM-C', 'Capsicum / Chili', 'Solanaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('CASPICUM-G', 'Capsicum / Green', 'Solanaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('CASPICUM-R', 'Capsicum / Red', 'Solanaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('CASPICUM-Y', 'Capsicum / Yellow', 'Solanaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('CARROT', 'Carrot', 'Umbellifera', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('CARROT-N', 'Carrot / New', 'Umbellifera', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('CATCH', 'Catch Crop', 'Other', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('CAULIFLOWER', 'Cauliflower', 'Cruciferae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('CELERIAC', 'Celeriac', 'Umbellifera', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('CELERY', 'Celery', 'Apiaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('CAHRD', 'Chard', 'Chenopodiaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('CHARD-R', 'Chard / Red', 'Chenopodiaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('CHERRY', 'Cherry', 'Rosaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('CHESTNUTS', 'Chestnuts', 'Fagaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('CHINESE-LEAF', 'Chinese leaf', 'Cruciferae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('CHIVE', 'Chive', 'Liliaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('CLEMENTINE', 'Clementine', 'Rutaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('CLOVER', 'Clover', 'Leguminosae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('COURGETTE', 'Courgette', 'Cucurbitaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('CRANBERRY', 'Cranberry', 'Ericaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('CUCUMBER', 'Cucumber', 'Cucurbitaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('CURRANT', 'Currant', 'Saxifragaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('CURRANT-B', 'Currant / Black', 'Saxifragaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('CURRANT-R', 'Currant / Red', 'Saxifragaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('DILL', 'Dill', 'Umbellifera', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('ENDIVE', 'Endive', 'Compositae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('ENDIVE-S', 'Endive / Sacrole', 'Compositae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('ENDIVE-SC', 'Endive / Sacrole / Curly', 'Compositae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('FENNEL', 'Fennel', 'Umbellifera', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('FIG', 'Fig', 'Moraceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('FODDER', 'Fodder Beet', 'Chenopodiaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('GARLIC', 'Garlic', 'Liliaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('GRAPEFRUIT', 'Grapefruit', 'Rutaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('GRAPEFRUIT-R', 'Grapefruit / Rubystar', 'Rutaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('GRAPEFRUIT-Y', 'Grapefruit / Yellow', 'Rutaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('GRAPE', 'Grapes', 'Vitaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('GRAPE-A', 'Grapes / AGLIANICO', 'Vitaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('GRAPEC', 'Grapes / CABERNET', 'Vitaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('GRAPE-DT', 'Grapes / DI TROIA', 'Vitaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('GRAPE-I', 'Grapes / Italia', 'Vitaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('GRAPE-K', 'Grapes / King Ruby', 'Vitaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('GRAPE-L', 'Grapes / Leopold', 'Vitaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('GRAPE-MO', 'Grapes / MONTEPULCIANO', 'Vitaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('GRAPE-MA', 'Grapes / Matilde', 'Vitaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('GRAPE-P', 'Grapes / Perlon', 'Vitaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('GRAPE-RG', 'Grapes / Red Globe', 'Vitaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('GRAPE-S', 'Grapes / SUGRAONE', 'Vitaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('GRAPE-T', 'Grapes / Tomson', 'Vitaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('GRAPE-V', 'Grapes / Viltoria', 'Vitaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('GRASSE', 'Grass Ley', 'Gramineae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('GRASSE-C', 'Grass Ley / Grass & Clover Mix', 'Gramineae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('HORSERADISH', 'Horse Radish', 'Cruciferae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('KAKI', 'Kaki', 'Ebenaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('KALE', 'Kale', 'Cruciferae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('KALE-B', 'Kale / Black', 'Cruciferae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('KALE-C', 'Kale / Curly', 'Cruciferae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('KALE-R', 'Kale / Red Curly', 'Cruciferae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('KIWI', 'Kiwifruit', 'Actinidiaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('KOHL', 'Kohl rabi', 'Cruciferae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('KUMQUAT', 'Kumquat', 'Rutaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('LEEK', 'Leek', 'Liliaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('LEMON', 'Lemon', 'Rosaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL, 1,1),
('LEMON-V', 'Lemon / Verdelli', 'Rosaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL, 1,1),
('LETTUCE', 'Lettuce', 'Compositae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL, 1,1),
('LIME', 'Lime', 'Rutaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL, 1,1),
('LITCHI', 'Litchi', 'Sapindaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('LUCERNE', 'Lucerne', 'Leguminosae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('LUPINE', 'Lupine', 'Fabaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('MAIZE', 'Maize', 'Gramineae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('MANDARIN', 'Mandarin', 'Rutaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('MANDARIN-A', 'Mandarin / Avana', 'Rutaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('MANDARIN-L', 'Mandarin / Late', 'Rutaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('MANDARIN-T', 'Mandarin / Tardivo', 'Rutaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('MANGO', 'Mango', 'Anacardiaseae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('MARROW', 'Marrow', 'Cucurbitaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('MEDLAR', 'Medlar', 'Rosaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('MELON', 'Melon', 'Cucurbitaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('MELON-C', 'Melon / Cantalupo', 'Cucurbitaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('MELON-W', 'Melon / Water', 'Cucurbitaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('MIXED-C', 'Mixed Crops', 'Other', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('MEXIED-GC', 'Mixed Grazing Crops', 'Other', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('MIXEDGCU', 'Mixed Grazing Crops Undersown', 'Other', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('MOOLI', 'Mooli', 'Cruciferae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('MULBERRRY', 'Mulberry', 'Moraceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('MUSTARD', 'Mustard', 'Cruciferae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('NECTARINE', 'Nectarine', 'Rosaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('OATS', 'Oats', 'Gramineae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('OLIVE', 'Olive', 'Oleaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('ONION', 'Onion', 'Liliaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('ONION-R', 'Onion / Red', 'Liliaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('ONION-S', 'Onion / Spring', 'Liliaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('ONION-W', 'Onion / White', 'Liliaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('ONION-Y', 'Onion / Yellow', 'Liliaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('ORANGE', 'Orange', 'Rutaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('ORANGE-M', 'Orange / Moro', 'Rutaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('ORANGE-N', 'Orange / Naveline', 'Rutaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('ORANGE-O', 'Orange / Ovale', 'Rutaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('ORANGE-SA', 'Orange / Salustiana', 'Rutaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('ORANGE-S', 'Orange / Sanguinello', 'Rutaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('ORANGE-T', 'Orange / Tarocco', 'Rutaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('ORANGE-TN', 'Orange / Tarocco / Nucellare', 'Rutaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('ORANGE-V', 'Orange / Valencia', 'Rutaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('ORANGE-W', 'Orange / Washington Navel', 'Rutaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('PAKCHOI', 'Pak choi', 'Cruciferae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('PARSLEY', 'Parsley', 'Umbellifera', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('PARSNIP', 'Parsnip', 'Umbellifera', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
( 'PEACH','Peach', 'Rosaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('PEAR', 'Pear', 'Rosaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('PEAR-C', 'Pear / Cosia', 'Rosaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('PEAS', 'Peas', 'Leguminosae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('PEAS-G', 'Peas / Garden', 'Leguminosae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('PASTURE', 'Permanent Pasture', 'Other', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('PINEAPPLE', 'Pineapple', 'Bromeliaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('PLUM', 'Plum', 'Rosaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('PLUM-R', 'Plum / Red', 'Rosaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('PLUM-Y', 'Plum / Yellow', 'Rosaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('POMGRANATE', 'Pomegranate', 'Punicaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('POTATO', 'Potato', 'Solanaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
( 'POTATO-','Potato / Arinda', 'Solanaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('POTATO-', 'Potato / Bissextile', 'Solanaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('POTATO-', 'Potato / New', 'Solanaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('POTATO-', 'Potato / Nicola', 'Solanaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('POTATO-', 'Potato / Spunta', 'Solanaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('PEAR-P', 'Prickly Pear', 'Cactaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('RADICCHIO', 'Radicchio', 'Compositae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('RADISH', 'Radish', 'Cruciferae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('RAPE', 'Rape', 'Cruciferae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('RASPBERRY', 'Raspberry', 'Rosaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('RHUBARB', 'Rhubarb', 'Chenopodiaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('RICE', 'Rice', 'Gramineae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('RYE', 'Rye', 'Gramineae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('SARSUMA', 'Satsuma', 'Rutaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('SHALLOT', 'Shallot', 'Liliaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('SHAMROCK', 'Shamrock', 'Oxalidaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('SOYA', 'Soya', 'Aspergillus', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('SPINACH', 'Spinach', 'Chenopodiaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('SQUASH', 'Squash', 'Cucurbitaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('STRABERRY', 'Strawberry', 'Rosaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('STRABERRY-S', 'Strawberry / Senga Sengana', 'Rosaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('STUBBLE', 'Stubble Turnip', 'Other', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('SUGARBEET', 'Sugar beet', 'Chenopodiaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('SUNFLOWER', 'Sunflower', 'Asteraceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('SWEDE', 'Swede', 'Cruciferae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('SWEDE-Y', 'Swede / Yellow', 'Cruciferae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('TANGELO', 'Tangelo', 'Rutaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('TANGERINE', 'Tangerine', 'Rutaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('TOMATO', 'Tomato', 'Solanaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('TOMATO-B', 'Tomato / Beef', 'Solanaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('TOMATO-C', 'Tomato / Cherry', 'Solanaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('TOMATO-P', 'Tomato / Plum', 'Solanaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('TOMATO-R', 'Tomato / Round', 'Solanaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('TOMATO-V', 'Tomato / Vine', 'Solanaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('TRITICALE', 'Triticale', 'Gramineae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('TURNIP', 'Turnip', 'Cruciferae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('WHEAT', 'Wheat', 'Gramineae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,1,1),
('YAM', 'Yam', 'Diosoreaceae', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL, 1,1);

