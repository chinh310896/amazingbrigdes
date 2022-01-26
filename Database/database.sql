-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.11-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for amazingbridge
DROP DATABASE IF EXISTS `amazingbridge`;
CREATE DATABASE IF NOT EXISTS `amazingbridge` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `amazingbridge`;

-- Dumping structure for table amazingbridge.admins
DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `adminID` int(11) NOT NULL AUTO_INCREMENT,
  `adminName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  PRIMARY KEY (`adminID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table amazingbridge.admins: ~3 rows (approximately)
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` (`adminID`, `adminName`, `email`, `password_hash`) VALUES
	(1, 'thuanh', 'thuanhh96@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab'),
	(3, 'xuanchinh', 'tranxuanchinh@gmail.com', 'da4b9237bacccdf19c0760cab7aec4a8359010b0'),
	(4, 'duc anh', 'ducanh@gmail.com', '8b2716d49104484e39cb97131c837e6ba493ba69');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;

-- Dumping structure for table amazingbridge.bridges
DROP TABLE IF EXISTS `bridges`;
CREATE TABLE IF NOT EXISTS `bridges` (
  `bridgeID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `official name` varchar(255) DEFAULT NULL,
  `other name(s)` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `construction begin` varchar(10) DEFAULT NULL,
  `construction end` varchar(10) DEFAULT NULL,
  `opened` varchar(10) NOT NULL DEFAULT '',
  `country` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `crossed` varchar(255) DEFAULT NULL,
  `structure` varchar(255) DEFAULT NULL,
  `material` varchar(255) DEFAULT NULL,
  `total length` float NOT NULL DEFAULT 0,
  `height` float DEFAULT NULL,
  `clerance below` float DEFAULT NULL,
  `width` float DEFAULT NULL,
  `span` float DEFAULT NULL,
  `designer` varchar(255) DEFAULT NULL,
  `maintained by` varchar(255) DEFAULT NULL,
  `heritage status` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `map url` varchar(255) NOT NULL,
  PRIMARY KEY (`bridgeID`),
  UNIQUE KEY `bridgeName` (`name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table amazingbridge.bridges: ~28 rows (approximately)
/*!40000 ALTER TABLE `bridges` DISABLE KEYS */;
INSERT INTO `bridges` (`bridgeID`, `name`, `official name`, `other name(s)`, `status`, `construction begin`, `construction end`, `opened`, `country`, `location`, `crossed`, `structure`, `material`, `total length`, `height`, `clerance below`, `width`, `span`, `designer`, `maintained by`, `heritage status`, `description`, `map url`) VALUES
	(1, 'Trift Bridge', '', 'Triftbrucke', 'In use', '2009', '2009', '2009', 'Switzerland ', 'Gadmen, Berne, Switzerland', 'Triftsee', 'Simple (primitive) suspension bridge', 'Steel bridge', 170, 100, NULL, 0.8, NULL, 'Hans Pfaffen Ingenieurburo', '', '', 'The Trift Bridge (German: Triftbrücke) is a pedestrian-only suspension bridge in the Swiss Alps. Spanning 170 metres (560 ft) at a height of 100 metres (330 ft), it is poised above the region of the Trift Glacier, with spectacular views guaranteed for those with a head for heights. The Trift Bridge stretches over an arm of Lake Triftsee, near Gadmen, Switzerland, an area that receives approximately 20,000 visitors per year to see the Trift Glacier.\r\n\r\nAn earlier bridge was built in 2004, to allow workers from the Trift hydroelectric plant to access a power plant that was built below the glacier to collect and use the run off. The Trift Bridge, modelled after Nepalese high wire bridges, turned out to be a tourist magnet, and was replaced in 2009 with a safer, more accessible bridge. The second, sturdier model was hung across the wide ravine and the site was opened to the public, which is considered to be one of the longest and highest pedestrian suspension bridges in the Alps. Currently the bridge spans a vertigo-inducing almost 560 foot gap in the mountains, suspended over 300 feet from the valley floor. Unlike some of its more primitive inspirations, the Trift bridge is made of thick steel cables over which wooden planks have been bolted. Despite the modern construction it still looks like a death trap, it looks like it could blow over with one stray wind, but is in fact quite safe. The old bridge stands today in the canton of Uri with the name Salbitbrücke.\r\n\r\nA cable car that was originally built as a freight gondola takes passengers up to the area near the bridge. Reaching the bridge requires taking a cable car in Meiringen, followed by a gondola. Finally, a difficult 1.5 hour uphill hike leads to the bridge. The journey there is truly an adventure in itself.', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2736.5860417436975!2d8.3552273!3d46.6941706!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478562bdf0ac9de3%3A0xf78db3a090c436b4!2sTrift%20Bridge!5e0!3m2!1svi!2s!4v1595934512882!5m2!1svi!2s'),
	(2, 'Forth Bridge', '', 'Forth Rail Bridge', 'In use', '1882', '1889', '1889', 'Scotland', 'Edinburgh, Inchgarvie and Fife, Scotland', 'Firth of Forth', 'Cantilever truss bridge', 'Steel bridge', 2467, 110, NULL, 37, 521, 'Sir John Fowler and Sir Benjamin Baker', 'Balfour Beatty under contract to Network Rail', '', 'The Forth Bridge is a cantilever railway bridge across the Firth of Forth in the east of Scotland, 9 miles (14 kilometres) west of central Edinburgh. It is considered as a symbol of Scotland (having been voted Scotland\'s greatest man-made wonder in 2016), and is a UNESCO World Heritage Site. It was designed by the English engineers Sir John Fowler and Sir Benjamin Baker. It is sometimes referred to as the Forth Rail Bridge (to distinguish it from the adjacent Forth Road Bridge), although this has never been its official name. The bridge and its associated railway infrastructure are owned by Network Rail.\r\n\r\nConstruction of the bridge began in 1882 and it was opened on 4 March 1890 by the Duke of Rothesay, the future Edward VII. The bridge carries the Edinburgh–Aberdeen line across the Forth between the villages of South Queensferry and North Queensferry and has a total length of 8,094 feet (2,467 m). When it opened it had the longest single cantilever bridge span in the world, until 1919 when the Quebec Bridge in Canada was completed. It continues to be the world\'s second-longest single cantilever span, with a span of 1,709 feet (521 m). A full-scale restoration project to return the bridge to its original construction condition was completed in 2012.\r\n\r\nThe Forth Bridge is a Scottish icon that is recognised the world over as the most famous of cantilever designs. The world\'s first major steel structure, the Forth Bridge represents a key milestone in the history of modern railway civil engineering.\r\n\r\nThe Forth Bridge was inscribed as a World Heritage Site by United Nations body UNESCO in July 2015 at its meeting in Bonn, Germany. It becomes Scotland’s sixth World Heritage Site and now enjoys the same status as the Taj Mahal and the Great Wall of China.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2231.0404458597754!2d-3.3906278844832407!3d56.000652080316875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4887cf9285ad0a07%3A0xe15e532beaaea823!2zQ-G6p3UgRm9ydGg!5e0!3m2!1svi!2s!4v1595935727379'),
	(3, 'Millau Viaduct', '', 'Viaduc de Millau', 'In use', ' 2001', ' 2004', '2004', 'France', 'Millau-Creissels, Aveyron, France', 'Gorge valley of the river Tarn', '	Cable-stayed bridge with semi-fan system', 'Concrete, steel', 2460, 336.4, 270, 32.05, 204, 'Dr Michel Virlogeux', '', '', 'Located in Southern France, the Millau Viaduct is the tallest bridge in the world. Constructed in three short years, the bridge is an engineering and architectural marvel. At its highest point, the bridge soars 343 meters (1,125 ft) above ground, that’s 19 meters (62 ft) taller than the Eiffer Tower! Check out the incredible photographs below along with a timeline of the project’s major milestones and notable records and figures.\r\n\r\nBridges are often considered to belong to the realm of the engineer rather than that of the architect. But the architecture of infrastructure has a powerful impact on the environment and the Millau Viaduct, designed in close collaboration with structural engineers, illustrates how the architect can play an integral role in the design of bridges. It follows the Millennium Bridge over the River Thames, in expressing a fascination with the relationships between function, technology and aesthetics in a graceful structural form.\r\n\r\nLocated in southern France, it connects the motorway networks of France and Spain, opening up a direct route from Paris to Barcelona. The bridge crosses the River Tarn, which runs through a spectacular gorge between two high plateaux. Interestingly, alternative readings of the topography suggested two possible structural approaches: to celebrate the act of crossing the river or to articulate the challenge of spanning the 2.46 kilometres from one plateau to the other in the most economical manner. Although historically the river was the geological generator of the landscape, it is very narrow at this point, and so it was the second reading that suggested the most appropriate structural solution.\r\n\r\nA cable-stayed, masted structure, the bridge is delicate, transparent, has the optimum span between columns. Each of its sections spans 342 metres and its columns range in height from 75 metres to 245 metres (equivalent to the height of the Eiffel Tower), with the masts rising a further 90 metres above the road deck. To accommodate the expansion and contraction of the concrete deck, each column splits into two thinner, more flexible columns below the roadway, forming an A-frame above deck level. The tapered form of the columns both expresses their structural loads and minimises their profile in elevation. The bridge not only has a dramatic silhouette, but crucially, it also makes the minimum intervention in the landscape. Lit at night, it traces a slender ribbon of light across the valley.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2866.2856307076263!2d3.020650115043293!3d44.077457932911344!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12b24a26901e27d1%3A0xd68c6a0fa2bec6e4!2zQ-G6p3UgY-G6oW4gTWlsbGF1!5e0!3m2!1svi!2s!4v159593'),
	(4, 'Golden Bridge', '', 'Cau Vang', 'In use', '2017', '2018', '2018', 'Vietnam', 'Ba Na Hills resort, near Da Nang', 'mountain road', '', 'Steel painted gold', 148.6, 67, 1414, 5, NULL, 'Vu Viet Anh, Nguyen Quang Huu Tuan, Tran Quang Hung', '', '', 'Golden Bridge is located in Thien Thai Garden of Sun World Ba Na Hills. It is located 1,414m above the sea level. The bridge is connected to the Marseille and Bordeaux stations. So it is to take guests from the foot of the mountain or the French village to visit the flower garden. In the middle of the air, the bridge looks like a brilliant silk. Its length is 150m, including 8 spans, the longest span is 21.2m. The exact Golden bridge Da Nang location resides is An Son village, Hoa Ninh commune, Hoa Vang district, Danang. \r\n\r\nIts attraction is the unique architecture. There are giant hands holding the bridge. The hands have a gray color. Contrary to the elegance of the bridge, moss hands make up the old, nostalgic atmosphere. The yellow color of this bridge is more prominent and distinctive between the forest and the giant hands. According to TA Landscape Architecture – the design firm of Golden Bridge – the image represents the hands of the God of Mountain, supporting the villages to get to Thien Thai garden.\r\n\r\nMany people will think that the hands lift the Golden Bridge looks like stone carvings, but actually, it is not. Bored Panda, a famous website for designing, also provides interesting information on how giant stone hands were created. The designers created the skeleton hand and covered with steel mesh, then, finished with fine fiberglass and decorated it. The entire construction of the bridge takes about a year.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3835.3557546901593!2d107.9943842143653!3d15.994985745673109!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3141f7c21d46cfc5%3A0x6571ac07781169a0!2zR29sZGVuIEJyaWRnZSAtIEPhuqd1IFbDoG5nIELDoCBOw6AgS'),
	(5, 'Westminster Bridge', '', '', 'In use', '1854', '1862', '1862', 'United Kingdom', 'Lambeth, London, England', 'River Thames', 'Deck arch bridge', 'Iron bridge', 250, 5.4, NULL, 26, 35, 'Thomas Page', '', '', 'Westminster Bridge is a road-and-foot-traffic bridge over the River Thames in London, linking Westminster on the west side and Lambeth on the east side.\r\n\r\nThe bridge is painted predominantly green, the same colour as the leather seats in the House of Commons which is on the side of the Palace of Westminster nearest to the bridge, but a natural shade similar to verdigris. This is in contrast to Lambeth Bridge, which is red, the same colour as the seats in the House of Lords and is on the opposite side of the Houses of Parliament.\r\n\r\nIn 2005–2007, it underwent a complete refurbishment, including replacing the iron fascias and repainting the whole bridge. It links the Palace of Westminster on the west side of the river with County Hall and the London Eye on the east and was the finishing point during the early years of the London Marathon.\r\n\r\nThe next bridge downstream is the Hungerford footbridge and upstream is Lambeth Bridge. Westminster Bridge was designated a Grade II* listed structure in 1981.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2483.6730460236545!2d-0.1241531846728791!3d51.50086711900246!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487604c693fca1a1%3A0xd697942be6dd609e!2sWestminster%20Bridge!5e0!3m2!1svi!2s!4v159593602'),
	(6, 'New River Gorge Bridge', '', '', 'In use', '1974', '1977', '1977', 'United States', 'Fayette County, West Virginia, U.S.', 'New River,  CR 82, CSX Transportation', 'Deck arch bridge', 'Steel', 924, 267, NULL, 21.1, 518, 'Michael Baker', 'West Virginia Division of Highways', '', 'The New River Gorge Bridge is a steel arch bridge 3,030 feet (924 m) long over the New River Gorge near Fayetteville, West Virginia, in the Appalachian Mountains of the eastern United States. With an arch 1,700 feet (518 m) long, the New River Gorge Bridge was the world\'s longest single-span arch bridge for 26 years; it is now the fourth longest. Part of U.S. Route 19, its construction marked the completion of Corridor L of the Appalachian Development Highway System. The bridge is crossed by an average of 16,200 motor vehicles per day.\r\n\r\nThe roadway of the New River Gorge Bridge is 876 feet (267 m) above the New River, making the bridge one of the highest vehicular bridges in the world; it is currently the third highest in the United States. At the time it was built, it was the world\'s highest bridge carrying a regular roadway, a title it held until the 2001 opening of the Liuguanghe Bridge in China. Because of its height, the bridge has attracted daredevils since its construction. It is now the centerpiece of the annual "Bridge Day", during which hundreds of people, with appropriate equipment, are permitted to climb on or jump from the bridge. In 2005, the structure gained additional attention when the US Mint issued the West Virginia state quarter with the bridge depicted on one side. In 2013, the bridge was listed on the National Register of Historic Places.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6282.126797080036!2d-81.08786157551614!3d38.068904615336265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x884eb9511715f55d%3A0x9b1513d9c5fe9c46!2sNew%20River%20Gorge%20Bridge!5e0!3m2!1svi!2s!4v15'),
	(7, 'Akashi Kaikyo Bridge', '明石海峡大橋 (Akashi-Kaikyō Ōhashi)', 'Pearl Bridge, Akashi Straits Bridge', 'In use', '1988', '1998', '1998', 'Japan', 'Awaji Island and Kobe', 'Akashi Strait', 'Suspension bridge', 'Steel', 3911, 282.8, 65.72, 36, 1991, 'Satoshi Kashima', 'Honshu-Shikoku Bridge Expressway Company Limited (JB Honshi Kōsoku)', '', 'Akashi Strait Bridge, also called Akashi Kaikyo Bridge or Pearl Bridge, suspension bridge across the Akashi Strait (Akashi-kaikyo) in west-central Japan. It was the world’s longest suspension bridge when it opened on April 5, 1998. The six-lane road bridge connects the city of Kōbe, on the main island of Honshu, to Iwaya, on Awaji Island, which in turn is linked (via the Ōnaruto Bridge over the Naruto Strait) to the island of Shikoku to the southwest. These two bridges—together with the Seto Great Bridge between Kojima (Honshu) and Sakaide (Shikoku)—are the main components of the Honshu-Shikoku Bridge Project across Japan’s Inland Sea.\r\n\r\nThe Akashi Strait Bridge is 12,831 feet long (3,911 metres) and has three spans. The central span is 6,532 feet (1,991 metres) long, and each of the two side spans measures 3,150 feet (960 metres). The two main supporting towers stand 975 feet (297 metres) above the strait’s surface, making it one of the tallest bridges in the world. The central span was originally designed to be 6,529 feet (1,990 metres) long, but the Kōbe earthquake of 1995 forced the two towers, which were still under construction, more than 3 feet (1 metre) farther apart.\r\n\r\nThe Akashi Strait Bridge stands in a seismically unstable region that also experiences some of the Earth’s most severe storms. Thus, engineers thus used a complex system of counterweights, pendulums, and steel-truss girders to allow the bridge to withstand winds of up to 180 miles (290 km) per hour. Despite these buffers, the bridge can expand and contract several feet in a single day. The challenges posed by the bridge inspired innovations in wind-tunnel and cable-fabrication technology.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3283.47350418943!2d135.0194864147404!3d34.61747269517969!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6000824134f53bcd%3A0xaeaac1c733d78c3f!2sC%E1%BA%A7u%20Akashi-Kaikyo!5e0!3m2!1svi!2s!4v159593'),
	(8, 'Brooklyn Bridge', '', 'Great East River Bridge; New York and Brooklyn Bridge', 'In use', '1870', '1883', '1883', 'United States', 'New York City (Civic Center, Manhattan – Dumbo/Brooklyn Heights, Brooklyn)', 'East River', 'Suspension bridge with cable-stays', 'Steel', 1825, 85, 38.7, 2625.9, 487, 'John Augustus Roebling', 'New York City Department of Transportation', '', 'The Brooklyn Bridge is a hybrid cable-stayed/suspension bridge in New York City, spanning the East River between the boroughs of Manhattan and Brooklyn. Opened on May 24, 1883, the Brooklyn Bridge was the first fixed crossing across the East River. It was also the longest suspension bridge in the world at the time of its opening, with a main span of 1,595.5 feet (486.3 m) and a deck located 127 ft (38.7 m) above mean high water. The span was originally called the New York and Brooklyn Bridge or the East River Bridge but was officially renamed the Brooklyn Bridge in 1915.\r\n\r\nProposals for a bridge connecting Manhattan and Brooklyn were first made in the early 19th century, which eventually led to the construction of the current span, designed by John A. Roebling. His son Washington Roebling oversaw the construction and contributed further design work, assisted by the latter\'s wife, Emily Warren Roebling. While construction started in 1870, numerous controversies and the novelty of the designed construction process caused the actual construction to be prolonged over thirteen years. Since opening, the Brooklyn Bridge has undergone several reconfigurations, having carried horse-drawn vehicles and elevated railway lines until 1950. To alleviate increasing traffic flows, additional bridges and tunnels were built across the East River. Following gradual deterioration, the Brooklyn Bridge has been renovated several times, including in the 1950s, 1980s, and 2010s.\r\n\r\nThe Brooklyn Bridge is the southernmost of four toll-free vehicular bridges connecting Manhattan Island and Long Island, with the Manhattan, Williamsburg, and Queensboro bridges to the north. Only passenger vehicles and pedestrian and bicycle traffic are permitted. A major tourist attraction since its opening, the Brooklyn Bridge has become an icon of New York City. Over the years, the bridge has been used as the location of various stunts and performances, as well as several crimes and attacks. The Brooklyn Bridge has been designated a National Historic Landmark, a New York City landmark, and a National Historic Civil Engineering Landmark.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6049.108165227782!2d-74.0003509251775!3d40.70581745053751!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a2343ce7b2b%3A0x2526ddba7abd465c!2zQ-G6p3UgQnJvb2tseW4!5e0!3m2!1svi!2s!4v1595936224100'),
	(9, 'Alexandre III Bridge', 'Pont Alexandre III', '', 'In use', '1986', '1990', '1900', 'France', 'Paris, France', 'The Seine River', 'Three-hinged arch bridge', 'Steel', 160, NULL, NULL, 40, 107.5, 'Gaston Cousin', '', '', 'The Pont Alexandre III is a deck arch bridge that spans the Seine in Paris. It connects the Champs-Élysées quarter with those of the Invalides and Eiffel Tower. The bridge is widely regarded as the most ornate, extravagant bridge in the city. It is classified as a French monument historique since 1975.\r\n\r\nThe Beaux-Arts style bridge, with its exuberant Art Nouveau lamps, cherubs, nymphs and winged horses at either end, was built between 1896 and 1900. It is named after Tsar Alexander III, who had concluded the Franco-Russian Alliance in 1892. His son Nicholas II laid the foundation stone in October 1896. The style of the bridge reflects that of the Grand Palais, to which it leads on the right bank.\r\n\r\nThe construction of the bridge is a marvel of 19th century engineering, consisting of a 6 metres (20 ft) high single span steel arch. The design, by the architects Joseph Cassien-Bernard and Gaston Cousin, was constrained by the need to keep the bridge from obscuring the view of the Champs-Élysées or the Invalides.\r\n\r\nThe bridge was built by the engineers Jean Résal and Amédée Alby. It was inaugurated in 1900 for the Exposition Universelle (universal exhibition) World\'s Fair, as were the nearby Grand Palais and Petit Palais.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.7014585586576!2d2.3113703152219642!3d48.86390300827328!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66fd057a1f0b9%3A0xeb0032bf06974d4f!2sC%E1%BA%A7u%20Alexandre-III!5e0!3m2!1svi!2s!4v159'),
	(10, 'Sydney Harbour Bridge', '', '', 'In use', '1923', '1932', '1932', 'Australia', 'Sydney, New South Wales, Australia', 'Port Jackson (Sydney Harbour)', 'Two-hinged arch bridge', 'Steel', 1149, 134, 49, 48.8, 503, 'Sir Ralph Freeman ', 'Roads and Maritime Services', '', 'The Sydney Harbour Bridge is an Australian heritage-listed steel through arch bridge across Sydney Harbour that carries rail, vehicular, bicycle, and pedestrian traffic between the Sydney central business district (CBD) and the North Shore. The view of the bridge, the harbour, and the nearby Sydney Opera House is widely regarded as an iconic image of Sydney, and of Australia itself. The bridge is nicknamed "The Coathanger" because of its arch-based design.\r\n\r\nUnder the direction of John Bradfield of the New South Wales Department of Public Works, the bridge was designed and built by British firm Dorman Long of Middlesbrough (who based the design on their 1928 Tyne Bridge in Newcastle upon Tyne) and opened in 1932.] The bridge\'s general design, which Bradfield tasked the NSW Department of Public Works with producing, was a rough copy of the Hell Gate Bridge in New York City. This general design document, however, did not form any part of the request for tender, which remained sufficiently broad as to allow cantilever (Bradfield\'s original preference) and even suspension bridge proposals. The design chosen from the tender responses was original work created by Dorman Long, who leveraged some of the design from their own Tyne Bridge which, though superficially similar, does not share the graceful flares at the ends of each arch which make the harbour bridge so distinctive. It is the sixth longest spanning-arch bridge in the world and the tallest steel arch bridge, measuring 134 m (440 ft) from top to water level. It was also the world\'s widest long-span bridge, at 48.8 m (160 ft) wide, until construction of the new Port Mann Bridge in Vancouver was completed in 2012.\r\n\r\nThe Sydney Harbour Bridge was added to the Australian National Heritage List on 19 March 2007 and to the New South Wales State Heritage Register on 25 June 1999.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3313.449615230982!2d151.20859841494735!3d-33.852301825633596!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12ae5d25ead5e3%3A0x68948eb717c0c43e!2zQ-G6p3UgY-G6o25nIFN5ZG5leQ!5e0!3m2!1svi!2s!4v159'),
	(11, 'Tower Bridge', '', '', 'In use', '1886', '1894', '1894', 'United Kingdom', 'London boroughs: – north side: Tower Hamlets – south side: Southwark', 'River Thames', 'Bascule bridge', 'Steel', 244, 65, 42.5, NULL, 79, 'Sir Horace Jones ', 'Bridge House Estates', '', 'Tower Bridge, one of the London’s most famous landmarks, is a bascule and suspension bridge on River Thames. It has two towers, in Victorian Gothic style, that are connected with two walkways that are constructed so they can resist horizontal forces from suspended parts of the bridge. Base of each tower holds machines that lift two parts of the bridge so bridge can allow passing of river traffic beneath it. Tower Bridge is located close to the Tower of London from which it got its name.\r\n\r\nEast End of London reached so high commercial development in the second half of 19th that it demanded one more river crossing. In the 1876, a “Special Bridge or Subway Committee” was formed to find a solution. Some 50 designs were submitted, but because of much controversy, it took eight years for one design to be approved. It was a design submitted by Sir Horace Jones, the City Architect that he designed in collaboration with John Wolfe Barry. Construction began in 1886 and lasted until 1894. Five companies and 432 workers worked on it. It has 70,000 tons of concrete in foundations only and some 10,000 tons of steel and is covered in Cornish granite and Portland stone as means of protection for steel structure and as an esthetic element. Victorian Gothic style is used to esthetically integrate Tower Bridge with nearby Tower of London. Prince and Princess of Wales officially opened the bridge on 30th of June 1894. The bridge connected Horselydown Lane, today Tower Bridge Road, with Iron Gate, today Tower Bridge Approach.\r\n\r\nThe bridge is close to the harbor so it was necessary for it to be made in a way that it can allow passing of ships. Machines that lift bascules were hydraulic steam machines until 1974 when they were replaced with electro-hydraulic drive system. Some of the old steam machines are left as a tourist attraction and is a part of the museum tour of a Tower Bridge.\r\n\r\nTower Bridge is still in function and is still a major crossing of the Thames. Daily, some 40,000 people cross it in both directions. While it was controlled manually from the beginning, in 2000, a computer controls system was installed so bascules could be raised and lowered remotely. Bascules are raised around 3 times a day and a 24 hours\' notice is needed from a ship that needs pass.\r\n\r\nAfter they were closed in 1910, walkways were reopened in 1982 as a part of a Tower Bridge Exhibition. The Exhibition shows photos, displays and films to tell a history of Tower Bridge and is housed in bridge’s towers, walkways of the bridge and in Victorian engine rooms.\r\n\r\nIn 2008, Bridge Tower entered renovations that lasted four years. Metal parts were stripped of original paint and are repainted in white and blue. New lights, that are both functional and atmospheric, were installed in walkways and suspension chains were repainted with six layers of protective paint. Next renovations are planned in 25 years.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2483.422750824505!2d-0.07754518467269784!3d51.50545971866673!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487603438b65db49%3A0x9e78421a085a6f2d!2zQ-G6p3UgVGjDoXAgTHXDom4gxJDDtG4!5e0!3m2!1svi!2s!'),
	(12, 'Pont du Gard', '', '', 'Out of service', '', '', '40 AD', 'France', 'Vers-Pont-du-Gard, Gard, France', 'Gardon River', 'Three-story semi-circular arch bridge', 'Shelly limestone', 275, 48.8, NULL, 6.4, 24.4, 'Henri Pitot', 'Public Association of Cultural Cooperation (since 2003)', '', 'The Pont du Gard is an ancient Roman aqueduct bridge built in the first century AD to carry water over 50 km (31 mi) to the Roman colony of Nemausus (Nîmes).[4] It crosses the river Gardon near the town of Vers-Pont-du-Gard in southern France. The Pont du Gard is the highest of all Roman aqueduct bridges, and one of the best preserved. It was added to UNESCO\'s list of World Heritage Sites in 1985 because of its historical importance.\r\n\r\nThe bridge has three tiers of arches, stands 48.8 m (160 ft) high, and descends a mere 2.5 centimetres (1 in) – a gradient of only 1 in 18,241 – while the whole aqueduct descends in height by only 12.6 m (41 ft) over its entire length, indicative of the great precision that Roman engineers were able to achieve using simple technology.\r\n\r\nThe aqueduct formerly carried an estimated 40,000 m3 (8,800,000 imp gal) of water a day to the fountains, baths and homes of the citizens of Nîmes. It may have been in use as late as the 6th century, with some parts used for significantly longer, but a lack of maintenance after the 4th century led to clogging by mineral deposits and debris that eventually stopped the flow of water.\r\n\r\nAfter the Roman Empire collapsed and the aqueduct fell into disuse, the Pont du Gard remained largely intact due to the importance of its secondary function as a toll bridge. For centuries the local lords and bishops were responsible for its upkeep, in exchange for the right to levy tolls on travellers using it to cross the river. Over time, some of its stone blocks were looted, and serious damage was inflicted on it in the 17th century. It attracted increasing attention starting in the 18th century, and became an important tourist destination. It underwent a series of renovations between the 18th and 21st centuries, commissioned by the local authorities and the French state, which culminated in 2000 with the opening of a new visitor centre and the removal of traffic and buildings from the bridge and the area immediately around it. Today it is one of France\'s most popular tourist attractions, and has attracted the attention of a succession of literary and artistic visitors.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2872.5701086472004!2d4.532771315038687!3d43.947569841364384!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12b5c8c248e704d5%3A0x26b17319f386eae2!2sPont%20du%20Gard!5e0!3m2!1svi!2s!4v1595936525630!'),
	(13, 'Magdeburg Water Bridge', 'Kanalbrücke Magdeburg', '', 'In use', '1998', '2003', '2003', 'Germany', 'Hohenwarthe, Möser, Jerichower Land, Saxony-Anhalt, Germany', 'Elbe River', 'Truss bridge', 'Steel', 918, NULL, 90, 34, 106.2, '', '', '', 'The Magdeburg Water Bridge (German: Kanalbrücke Magdeburg) is a large navigable aqueduct in central Germany, located near Magdeburg. The largest canal underbridge in Europe, it spans the river Elbe and directly connects the Mittellandkanal to the west and Elbe-Havel Canal to the east of the river, allowing large commercial ships to pass between the Rhineland and Berlin without having to descend into and then climb out of the Elbe itself.\r\n\r\nIt’s not often that you’ll find a large navigable water way that is an aqueduct that is strong enough to handle commercial transportation, but that’s exactly what the Magdeburg Water Bridge does. Located in Germany, this bridge spans the Elbe River and allows commercial water transportation to cross without the use of locks.\r\n\r\nIt’s located about 100 miles west of Berlin and it connects two different canal system. The initial concepts for this water bridge were started as early as 1905 and work continued on the project through the start of the second world war. It wasn’t completed, however, until 2003. What makes it truly unique, however, is the fact that it is a water bridge that crosses water, making it one of the world’s most amazing bridges.\r\n\r\nHow does the engineering work for this bridge? After all, isn’t water displaced when large, heavy objects go through a contained space? This is why the bridge itself is so long, measuring out at over 3,000 feet. The entire length of the bridge helps to control the water displacement so there isn’t any major splashing happening. You can even walk alongside the bridge if you wish on two built-in pedestrian ways!\r\n\r\nIt may have been a €500 million investment, but the value in connecting Berlin’s inland harbors with the ports along the Rhine is invaluable to the nation is immeasurable. It’s also one of most unique bridges you’ll ever see!', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2443.691328192941!2d11.698722815357021!3d52.23082556537226!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47af5b8c9d3c7f47%3A0x771d97dbe5fda138!2sMagdeburg%20Water%20Bridge!5e0!3m2!1svi!2s!4v15959'),
	(14, 'Pont Jacques ChabanDelmas Bridge', '', 'Bacalan-Bastide Bridge', 'In use', '2009', '2012', ' 2013', 'France', 'Bordeaux', 'Garonne river', 'Vertical lift bridge; Girder bridge', 'Concrete and steel', 572, 77, 55, 45, NULL, 'Nabil Yazbeck ', '', '', 'An architectural feat, the Jacques Chaban-Delmas bridge is a fine example of modern technical know-how Its graceful shape can be seen as a continuation of the quays and fits in perfectly with its surroundings. The bridge is a very successful combination of technological prowess and aesthetics. It confers a very welcome modern touch to the city\'s urban development.\r\n\r\nLocated between the Pont d’Aquitaine and the Pont de Pierre, this is the fifth bridge over the Garonne. 575 metres long and 77 metres high, it is the tallest lift bridge in France, and even in Europe!\r\nHardesty & Hanover was a member of the winning design-build team for the Jacques Chaban-Delmas Lift Bridge over the Garonne River in Bordeaux, France. The bridge spans approximately 383 feet long, an out-to-out width of approximately 141 feet, and a design lift height of 164 feet.\r\n\r\nH&H provided conceptual design, detailed final design construction support and supervision documents working in conjunction with the Vinci Group, the design-build contractor, and the design consortium of EGIS Jean Muller International; Michel Virlogeux; and Lavigne-Cheron Architects. The lift span has a symmetric cross section and carries four traffic lanes—two monorail tracks and two outboard sidewalk/bikeways. Four, independent pylon towers – one at each corner of the lift span – will allow a counterweight (a quarter of the total lift span weight) to travel vertically inside each pylon.\r\n\r\nOperation of the lift span is achieved via high strength wire ropes passing over sheaves that connect the lift span to the counterweights. A wire rope winch drive operating system with electric motor and flux vector regenerative drives hauls in and payout the counterweights, thereby raising and lowering the lift span.\r\n\r\nThe bridge was dedicated on March 16th, 2013 by the President of France, Francois Hollande. It will handle 43,000 vehicles a day and will reduce traffic congestion in the Bordeaux region.\r\n\r\nWhen night falls, the bridge is illuminated and constitutes yet another beautiful facet of the Port of the Moon, to the delight of Bordelais and photographers. The blue colour of the pylons corresponds to high tide, whereas the green indicates low tide.\r\n\r\nThe bridge is not to be missed during your trip to Bordeaux. We suggest discovering it during a night-time walk along the quays. And please don\'t hesitate to share your photos on social networks!', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2828.1980476464128!2d-0.5536451849286672!3d44.85826283169095!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd5528907a85cb75%3A0xb2eef1731c23d853!2sJacques%20Chaban-Delmas%20Bridge!5e0!3m2!1svi!2s!'),
	(15, 'Capilano Suspension Bridge Park', '', '', '', '', '', '1903', 'Canada', 'North Vancouver (district), British Columbia', 'Capilano River', 'Simple (primitive) suspension bridge', 'Steel', 140, 70, NULL, NULL, 140, 'George Grant Mackay', '', '', 'The Capilano Suspension Bridge is a simple suspension bridge crossing the Capilano River in the District of North Vancouver, British Columbia, Canada. The current bridge is 140 metres (460 ft) long and 70 metres (230 ft) above the river. It is part of a private facility with an admission fee, and draws over 1.2 million visitors per year.\r\nThe bridge was originally built in 1889 by George Grant Mackay, a Scottish civil engineer and park commissioner for Vancouver. It was originally made of hemp ropes with a deck of cedar planks, and was replaced with a wire cable bridge in 1903. In 1910 Edward Mahon purchased the Capilano Suspension Bridge. "Mac" MacEachran purchased the Bridge from Mahon in 1935 and invited local natives to place their totem poles in the park, adding a native theme. In 1945, he sold the bridge to Henri Aubeneau.\r\n\r\nThe bridge was completely rebuilt in 1956.\r\n\r\nThe park was sold to Nancy Stibbard, the current owner, in 1983. Annual attendance increased, and in May 2004, Treetops Adventures was opened, consisting of seven footbridges suspended between old-growth Douglas Fir trees on the west side of the canyon, forming a walkway up to 30 metres (98 ft) above the forest floor.\r\n In June 2011, a new attraction called Cliffwalk was added to the park.\r\n', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2599.490489844963!2d-123.11711308475923!3d49.34286437442629!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54866fd200dcde49%3A0xf350b3ec85130f5e!2sC%E1%BA%A7u%20treo%20Capilano!5e0!3m2!1svi!2s!4v1'),
	(16, 'Confederation Bridge', 'Pont de la Confédération', 'The Fixed Link', 'In use', '1994', '1997', '1997', 'Canada', 'Borden-Carleton, Prince Edward Island Cape Jourimain, New Brunswick', 'Northumberland Strait', 'Single-cell box girder bridge', 'Prestressed concrete bridge', 12900, NULL, 60, 11, 250, 'Jean Muller ', 'Strait Crossing Bridge Limited (SCBL)', '', 'The Confederation Bridge joins the eastern Canadian provinces of Prince Edward Island and New Brunswick, making travel throughout the Maritimes easy and convenient. The curved, 12.9 kilometre (8 mile) long bridge is the longest in the world crossing ice-covered water, and continues to endure as one of Canada’s top engineering achievements of the 20th century.\r\n\r\nThe decision to replace the existing ferry service with a fixed link followed a heated debate throughout the 1980’s. Farmers, fishermen, tourism operators, and residents of Prince Edward Island had sharply contrasting opinions about how year-round access to the mainland would affect their way of life and livelihood. Eventually, it was decided that the debate would be settled at the polls. The federal department of Public Works and Government Services selected its favourite bridge design out of several proposals from the private sector, and on January 18, 1988, Premier Joseph Ghiz asked Prince Edward Islanders to make the final decision in a plebiscite. At the polls, 59.4% of Islanders voted “Yes” to a fixed link.\r\n\r\nAfter four years of construction using crews of more than five thousand local workers, the Confederation Bridge opened to traffic on May 31, 1997.\r\n\r\nToday, the Confederation Bridge is operated by Strait Crossing Bridge Limited, headquartered in the shadow of the bridge in Borden-Carleton, Prince Edward Island.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2761.5160869965775!2d-63.767422984879445!3d46.20018759205309!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4b5f7363098c2cf3%3A0x2c6411b8d74d8d7b!2sConfederation%20Bridge!5e0!3m2!1svi!2s!4v1595936'),
	(17, 'Danyang-Kunshan Grand Bridge', '', '', '', '2006', '2010', '2011', 'China', 'Jiangsu', 'Pearl River Delta', 'Haunched girder bridge; Box girder bridge', 'Prestressed concrete bridge', 164800, 30.48, NULL, 79.25, NULL, 'China Road and Bridge Corporation', '', '', 'China constructed the Danyang–Kunshan Grand Bridge in just 4 years, employing 10,000 workers, at a cost of about $8.5 million. It was completed in 2010 and opened in 2011. It crosses low rice paddies, part of the Yangtze River Delta, with just a few miles of the bridge actually crossing the open water of Yangcheng Lake in Suzhou. The bridge averages about 100 feet (31 meters) off the ground. The Danyang–Kunshan Grand Bridge currently holds the Guinness World Record for the longest bridge in the world in any category as of June 2011.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3405.9147434851525!2d120.70275601465366!3d31.38891426076313!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x35b3a5648a925cdf%3A0xb3f9c060049264c4!2z5Li55piG54m55aSn5qGl!5e0!3m2!1svi!2s!4v1595936658'),
	(18, 'Pingtang', '', '', 'In use', '', '2019', '2019', 'China', 'Pingtang, Guizhou, China', 'Caodu River', 'Cable-stayed bridge', '', 2.135, 332, 310, NULL, NULL, '', '', '', 'With Guizhou having more high bridges then any other region on earth, few might not have noticed the mountainous Chinese Province never really had a giant "viaduct" like the Millau Bridge in France. That will all change in 2019 when the Pingtang Bridge opens as the second largest viaduct in the world with the second tallest bridge structure ever built at 328 meters. Originally called the Caoduhe Bridge after the river it crosses, this gargantuan structure will have two back to back cable stayed spans of 550 meters supported on three of the world\'s tallest bridge towers measuring 328, 320 and 298 meters. Like many wide river valleys in Guizhou, the first plans of a bridge crossing of the Caodu River revolved around suspension bridge schemes with a main span between 1,100 to 1,400 meters. But unlike most wide river valleys in Guizhou, the terrain in the center of the Caodu valley rose considerably from the river level up to a small ridge or hill midway between the high sides of the canyon. This small hill meant that a tower could be placed in the center of the valley and allow a multi-span cable stayed design to work in a manner not unlike the Chishi Bridge in nearby Hunan Province. The deck is at 891 meters elevation over the river surface which is at 586 meters during normal river flow. With so much attention being paid to the three skyscraping support towers, the designers made considerable effort to give these structures a dynamic sculptural quality that emphasize a slimmer profile with less bulk one might expect from such a large mass of concrete. Also not to be overlooked on the Pingtang to Luodian expressway is the spectacular Daxiaojing Bridge that will have Guizhou\'s longest arch span of 450 meters when it is completed in 2019.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3696.774525505825!2d113.18964771442558!3d22.096426255849458!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x340199df5f3913c3%3A0x92914c688700e8b9!2sPing%20Tang%20Da%20Qiao%2C%20Jinwan%20Qu%2C%20Zhu'),
	(19, 'Ponte Vecchio', '', 'Old Bridge', 'In use', '1335', '', '1345', 'Italy', 'Florence, Italy', 'Arno River', 'Segmental arch bridge', 'Masonry bridge', 30, NULL, NULL, 32, 30, 'Romans, Taddeo Gaddi, Neri di Fioravante', '', '', 'Ponte Vecchio is closed-spandrel segmental arch bridge in Florence, Italy. It spans Arno River, it is made of stone and it is placed at the location where Romans built first bridge in Florence before 994 AD when it was mentioned for the first time.\r\n\r\nFlood destroyed the bridge for the first time in 1117 and after reconstruction again in 1333 only for it to be rebuilt in today’s shape in 1345. It is not known who is the designer of today’s bridge but it is believed that it is Taddeo Gaddi or Neri di Fioravanti.\r\n\r\nBecause of its age it is called Ponte Vecchio which means “Old Bridge”. One of its characteristics are shops that are placed on the both sides of the bridge in Medieval style. They are there since the beginning and were first populated with butcher shops and tanners but in 1593 duke Ferdinand I decided to allow only goldsmiths and jewelers to hold shops on Ponte Vecchio because former tenants produced too much garbage and foul smells. In 16th century Cosimo I de\' Medici ordered that a corridor is built above Ponte Vecchio, so-called “Vasari Corridor” after a Giorgio Vasari who built it. Its purpose was to connect Palazzo Vecchio with Palazzo Pitti. At the end of World War II, While Germans retreated from North Africa through Italy, Ponte Vecchio was only bridge in Florence that Germans did not destroy (it is said that bridge was spared by personal order from Hitler). They just closed it by destroying nearby buildings on both ends of the bridge, which were reconstructed at the end of the war. In 1966, another great flood threatened to destroy the bridge. It severely damaged it but Ponte Vecchio resisted and it is standing today and it is still beloved by the tourists.\r\n\r\nIn recent history a tradition appeared that if lovers attach a padlock somewhere on the Ponte Vecchio and then throw away the key in water, their love will last forever. It is believed that “tradition” is an idea of a local locksmith as a means to increase sales although it is known to be practiced in Russia and Asia. In time, large number of padlocks began to damage the structure of a bridge so the government decided to remove many of the padlock and place a law that charged penalty of 50€ for anyone caught locking anything to the bridge.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2881.237672282991!2d11.25095481495425!3d43.767924979117495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132a56aaa2dcb667%3A0x40310ae830e702e8!2sPonte%20Vecchio!5e0!3m2!1svi!2s!4v1596030728389!5m'),
	(20, 'Changhua Kaohsiung Viaduct', '', '', 'In use', '', '2007', '2007', 'Taiwan', 'The bridge goes from Baguashan (八卦山) in Changhua County to Zuoying in Kaohsiung.', '', 'Viaduct', '', 157, NULL, NULL, NULL, NULL, '', '', '', 'The Changhua–Kaohsiung Viaduct is one the world\'s longest bridges. The bridge acts as a viaduct for part of the railway line of the Taiwan High Speed Rail network. Over 200 million passengers had been carried over it by December 2012.\r\n\r\nTHSR Changhua, Yunlin, Chiayi, Tainan stations are built along this viaduct.\r\nCompleted in 2007,the bridge is 157,317m (516,132 ft) or 97.8 miles in length. The railway is built across a vast series of viaducts, as they were designed to be earthquake resistant to allow for trains to stop safely during a seismic event and for repairable damage following a maximum design earthquake. Bridges built over known fault lines were designed to survive fault movements without catastrophic damage.', 'https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14569.121431721755!2d120.58806705409344!3d24.091634288729978!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1596076154591!5m2!1svi!2s'),
	(21, 'Rialto Bridge', '', 'Ponte di Rialto', '', '1588', '1591', '1591', 'Italy', 'Venice, Italy', 'Grand Canal', 'Vaulted arch bridge', 'Stone', 48, 7.32, NULL, 22.9, 28.8, 'Michelangelo, Antonio da Ponte, Vincenzo Scamozzi', '', '', 'Rialto Bridge (Ponte di Rialto) is a stone arch bridge over a Grand Canal in Venice, Italy. It is the oldest bridge in Venice and still in use.\r\n\r\nFirst bridge on that place was Ponte della Moneta, named for mint that grew at one of its entrances. It was built in 1181 and it was a pontoon bridge built on ships and designed by Nicolò Barattieri. Pontoon bridge was replaced in 1255 with a wooden bridge because nearby Realto market increased traffic over it. That bridge had two ramps on each side and a movable platform in the middle that could be raised to allow passing of the ships underneath the bridge. It also had two rows of shops built whose renting and taxes helped maintain the bridge in working order. Because it was close to Realto market, in time it changed the name into Realto Bridge. Maintenance of the bridge was a problem because of the material that was used for its construction.\r\n\r\nDuring the revolt led by Bajamonte Tiepolo in 1310 the bridge was damaged by fire and it collapsed first time in 1444 under the weight of crowd that gathered to watch boat parade in celebration of wedding of the marquis Ferrara. It was rebuilt as a drawbridge but it collapsed once again in 1524. After that it was decided to rebuild the bridge in stone.\r\n\r\nWhen, in 1551, authorities requested ideas for design of the stone bridge on the same place, some of the most famous architects of that time answered the call with their ideas. Some of the architects that applied were Vignola, Palladio and even Michelangelo. Problem with their ideas was that they all designed bridges with several arches, which would hinder the river traffic so they were all rejected. Single span design by Antonio da Ponte, Swiss-born Venetian architect and engineer, was approved and construction began in 1588. It lasted until 1591. The bridge that stands today still, was designed like the bridge from 1255. It has two inclined ramps with stairs that lead to central portico, has shops on both sides and three walkways. Single span allows for easy passing of ships. Although doubted that it would last because of its brave design Rialto Bridge stands the test of time and is still one of the main attractions of Venice.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2799.5791573792553!2d12.333709315024903!3d45.43798417910069!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x477eb1c7faa33a3b%3A0x732011a1298ecc89!2zQ-G6p3UgUmlhbHRv!5e0!3m2!1svi!2s!4v1596077152966!'),
	(22, 'Golden Gate Bridge', '', '', 'In use', '1933', '1937', '1937', 'United States', 'United States, San Francisco, California, Marin County', 'Golden Gate', 'Suspension bridge, Truss arch bridge, Truss causeways bridge', 'Steel', 2735, 227.4, 64, 27.4, 1280.2, 'Joseph Strauss, Irving Morrow, and Charles Ellis', 'Golden Gate Bridge, Highway and Transportation District', '', 'Golden Gate Bridge is a suspension bridge across the place the where San Francisco Bay opens into the Pacific Ocean, so-called Golden Gate (hence the name). It connects San Francisco with Marin County and it is 2737 meters long and 227 meters high. Some 45 million of vehicles cross Golden Gate Bridge in a year. Golden Gate Bridge is one of the landmarks of San Francisco and, until 1964, it was a bridge with longest suspension bridge main span in the world.\r\n\r\nBefore Golden Gate Bridge was built, the shortest route between San Francisco and the Marin County was by ship. First ferry service was established in 1820. In time automobile ferries, which were once used only by costumers of the railroad, became very profitable and San Francisco became largest city in United States largely supplied by ferries. Because the ferries didn’t provide constant connection with the nearby regions, the city’s growth began to drop.\r\n\r\nThen appeared the idea of the bridge that would span the Golden Gate and give San Francisco much-needed link. In 1916, James Wilkins wrote an article in San Francisco Bulletin that estimated cost of building a bridge across Golden Gate is $100 million and asked a question whether it could be done for less. One Joseph Strauss responded with the idea that cantilever bridge could be made for $17 million. Local authorities agreed to expand on the idea but only if design is changed to suspension bridge and if Strauss cooperates with other designers and engineers because of his low experience with jobs of such type and magnitude. Designer Leon Moisseiff and Senior engineer Charles Alton Ellis were joined to the project on the general engineering while Irving Morrow designed look of towers, lightning and Art Deco details of the bridge. Construction of the bridge started in 1933 and ended in 1937. It is not known how many workers worked on the bridge but it was built by some 10 prime contractors, it cost some $35 million, it was finished before the schedule and $1.3 million under budget. Deck has a weight of 1500.000 tonnes and cables that hold it are 90cm thick and made from 130.000 kilometers of wire.\r\n\r\nWhen it was opened on May 27, 1937, opening celebrations lasted a week. The day before bridge was opened for vehicles some 200.000 pedestrian crossed it by foot. For a 50th anniversary, bridge was close again and pedestrians were allowed on it. But this time some 1.000.000 people gathered and caused the middle of the bridge to flatten out. Because of that pedestrian walk was not allowed for a 75th anniversary.\r\n\r\nGolden Gate Bridge is considered one of the most beautiful bridges in the world and is a true feat of engineering of its time. It was built on a fault line that presents constant danger of earthquakes. Strong winds from Pacific can sway the bridge but it is built so it can swing sideways 8 meters and withstand blows of wind that are up to 160 km/h.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.724019518842!2d-122.48044378516482!3d37.81993281733395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808586deffffffc3%3A0xcded139783705509!2zQ-G6p3UgQ-G7lW5nIFbDoG5n!5e0!3m2!1svi!2s!4v159617'),
	(23, 'Alcantara Bridge', '', 'Trajan\'s Bridge at Alcantara', 'In use', '104', '106', '106', 'Spain', 'Alcantara, Cáceres, Extremadura, Spain', 'Tagus River', 'Semi-circular arch bridge', 'Masonry bridge', 194, 71, NULL, 8, 28.8, 'Caius Julius Lacer', '', '', 'Alcántara Bridge is another Imperial Roman bridge that still exists today. The stone arch bridge was built over the Tagus River after the Roman Emperor Trajan issued an order in 98 CE. Construction of  Alcántara Bridge began in 104 CE and ended two years later.\r\n\r\nAlthough the bridge is currently in good condition, it has had to be repaired several times throughout its history. Most of the bridge’s damage was due to wars rather than the elements. Various parts of Alcántara Bridge were destroyed at different time periods until the main pillars were completely repaired in 1969.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3068.7689238231314!2d-6.894554185104763!3d39.72237550549902!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd1626444f3a8e57%3A0xe0284af6b47ca729!2zQ-G6p3UgQWxjw6FudGFyYQ!5e0!3m2!1svi!2s!4v159617267'),
	(24, 'Cendere Bridge', 'Cendere Köprüsü', 'Chabinas Bridge; Septimius Severus Bridge; Severan Bridge', 'In use', '', '', '200', 'Turkey', 'Kâhta, Adıyaman, Turkey', 'Cendere (Chabinas)', 'Vaulted arch bridge', 'Masonry bridge', 123, NULL, NULL, 7, 34.2, '', '', '', 'The Severan Bridge (also known as Chabinas Bridge or Cendere Bridge or Septimius Severus Bridge; Turkish: Cendere Köprüsü) is a late Roman bridge located near the ancient city of Arsameia (today Eskikale), 55 km (34 mi) north east of Adıyaman in southeastern Turkey. It spans the Cendere Çayı (Chabinas Creek), a tributary of Kâhta Creek, on provincial road 02-03 from Kâhta to Sincik in Adıyaman Province. This bridge was described and pictured in 1883 by archeologists Osman Hamdi Bey and Osgan Efendi.\r\n\r\nThe bridge is constructed as a simple, unadorned, single arch on two rocks at the narrowest point of the creek. At 34.2 m (112 ft) clear span, the structure is quite possibly the second largest extant Roman arch bridge. It is 120 m (390 ft) long and 7 m (23 ft) wide.\r\n\r\nRoadway flanked by ancient columns\r\nThe bridge was rebuilt by the Legio XVI Gallica, garrisoned in the ancient city of Samosata (today Samsat) to begin a war with Parthia. Commagenean cities built four Corinthian columns on the bridge, in honor of the Roman Emperor Lucius Septimius Severus (193–211), his second wife Julia Domna, and their sons Caracalla and Publius Septimius Geta as stated on the inscription in Latin on the bridge.[3] Two columns on the Kâhta side are dedicated to Septimius Severus himself and his wife, and two more on the Sincik side are dedicated to Caracalla and Geta, all in 9–10 m in height. Geta\'s column, however, was removed after his assassination by his brother Caracalla, who damned Geta\'s memory and ordered his name to be removed from all inscriptions.\r\n\r\nThe Severan Bridge is situated within one of the most important national parks in Turkey, which contains Nemrut Dağı with the famous remains of Commagene civilization on top, declared as World Cultural Heritage site by UNESCO. In 1997, the bridge was restored. Vehicular traffic was restricted to 5 tons or less. The bridge is now closed to vehicles, and a new road bridge has been built 500 m (550 yd) east of the old bridge.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3146.8936761357604!2d38.60630111475294!3d37.93291427973098!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15335686cb161a4f%3A0x2224afbf47f2e8ff!2sCendere%20Bridge!5e0!3m2!1svi!2s!4v1596173649991!5'),
	(25, 'Lake Pontchartrain Causeway', '', '', 'In use', '', '', '1969', 'United States', 'Metairie and Mandeville, Louisiana, U.S.', 'Lake Pontchartrain', 'Girder bridge', '', 38420, NULL, NULL, NULL, NULL, '', 'Causeway Commission', '', 'The Lake Pontchartrain Causeway, sometimes only the causeway, is a fixed link composed of two parallel bridges crossing Lake Pontchartrain in southern Louisiana, United States. The longer of the two bridges is 23.83 miles (38.35 km) long. The southern terminus of the causeway is in Metairie, Louisiana, a suburb of New Orleans. The northern terminus is at Mandeville, Louisiana.\r\n\r\nSince 1969, it was listed by Guinness World Records as the longest bridge over water in the world; in 2011, in response to the opening of the longer Jiaozhou Bay Bridge in China, Guinness World Records created two categories for bridges over water: continuous and aggregate lengths over water. Lake Pontchartrain Causeway then became the longest bridge over water (continuous) while Jiaozhou Bay Bridge the longest bridge over water (aggregate).\r\n\r\nThe bridges are supported by 9,500 concrete pilings. The two bridges feature a bascule, which spans the navigation channel 8 miles (13 km) south of the north shore.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3448.4486443703668!2d-90.12543288537626!3d30.195740118365414!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x862752ee2d94f1b1%3A0x43e3b1fd254ec41d!2sLake%20Pontchartrain%20Causeway%2C%20Louisiana%2'),
	(26, 'Yavuz Sultan Selim Bridge', 'Yavuz Sultan Selim Köprüsü', 'Third Bosphorus Bridge', 'In use', '2013', '', '2016', 'Turkey', 'Istanbul, Turkey', 'Bosphorus', 'Suspension bridge with cable-stays', 'Steel', 1875, 322, NULL, 59, 1408, 'Michel Virlogeux', 'İçtaş-Astaldi consortium', '', 'The Yavuz Sultan Selim Bridge (Turkish: Yavuz Sultan Selim Köprüsü) is a bridge for rail and motor vehicle transit over the Bosphorus strait, to the north of two existing suspension bridges in Istanbul, Turkey. It was initially named the Third Bosphorus Bridge (with Bosphorus Bridge being the First Bosphorus Bridge and Fatih Sultan Mehmet Bridge the Second Bosphorus Bridge). The bridge is located near the Black Sea entrance of the Bosphorus strait, between Garipçe in Sarıyer on the European side and Poyrazköy in Beykoz on the Asian side.\r\n\r\nThe foundation stone laying ceremony was held on 29 May 2013. The bridge was opened to traffic on 26 August 2016.\r\n\r\nAt 322 m (1,056 ft), the bridge is one of the tallest bridges in the world. After the Millau Viaduct in France and the Pingtang Bridge in China, it is the third-tallest bridge in the world of any type. The bridge is also one of the world\'s widest suspension bridges, at 58.4 metres (192 ft) wide.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001.856967797078!2d29.10999351494403!3d41.203091815363656!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x409fde148a756e35%3A0xe1d935eff2a3cef0!2sC%E1%BA%A7u%20Yavuz%20Sultan%20Selim!5e0!3m2!1svi!'),
	(27, 'Russky Bridge', '', 'Russky Island Bridge', 'In use', '2009', '', '2012', 'Russia', 'Vladivostok, Primorsky Krai, Far Eastern Federal District, Russia', 'Eastern Bosphorus', 'Cable-stayed bridge with semi-fan system', '', 3100, 320.9, NULL, 29.5, 1104, '', 'SK MOST and NPO Mostovik', '', 'The Russky Bridge (Russian: Русский мост, Russian Bridge) is a cable-stayed bridge in Vladivostok, Primorsky Krai, Russia. The bridge connects the Russky Island and the Muravyov-Amursky Peninsula sections of the city across the Eastern Bosphorus strait, and with a central span of 1,104 metres (3,622 feet) it is the longest cable-stayed bridge in the world. The Russky Bridge was originally built to serve the 2012 Asia-Pacific Economic Cooperation conference hosted at the Far Eastern Federal University campus on Russky Island. It was completed in July 2012 and opened by Prime Minister Dmitry Medvedev, and on September 3, 2012, the bridge was officially given its name.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2914.9779598533714!2d131.9055921150075!3d43.0629310984166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5fb38cd9ae558b27%3A0xa44e010849799b8e!2sRussky%20Bridge%2C%20Nga!5e0!3m2!1svi!2s!4v15967973'),
	(28, 'Duge Bridge', 'Beipan River Hangrui Expressway Bridge', '', 'In use', '2011', '', '2016', 'China', 'Liupanshui, Guizhou, China', 'Beipan River', 'Cable-stayed bridge with semi-fan system', '', 1340, 269, 565, NULL, 720, '', '', '', 'The Duge Bridge ([tú.kɤ̌]) is a cable-stayed bridge on the border between the provinces of Guizhou and Yunnan. As of 2016, the bridge is the highest in the world with the road deck sitting over 565 metres (1,850 feet) above the Beipan River. The bridge is part of the G56 Hangzhou–Ruili Expressway between Qujing and Liupanshui. The eastern tower measures 269 m (883 ft) making it one of the tallest in the world.\r\n\r\nThe bridge spans 1,340 m (4,400 ft) between Xuanwei city, Yunnan and Shuicheng County, Guizhou and shortens the journey between the two places from around five hours\' drive to about an hour.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3567.7414506001314!2d104.82817031454098!3d26.59267078019717!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x36c3efeef3b7cfc3%3A0xc038dc54061ae9c9!2sDuge%20Bridge!5e0!3m2!1svi!2s!4v1596798153967!5m2');
/*!40000 ALTER TABLE `bridges` ENABLE KEYS */;

-- Dumping structure for table amazingbridge.bridge_category
DROP TABLE IF EXISTS `bridge_category`;
CREATE TABLE IF NOT EXISTS `bridge_category` (
  `bridgeID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  PRIMARY KEY (`bridgeID`,`categoryID`),
  KEY `categoryID` (`categoryID`),
  CONSTRAINT `bridge_category_ibfk_1` FOREIGN KEY (`bridgeID`) REFERENCES `bridges` (`bridgeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bridge_category_ibfk_2` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table amazingbridge.bridge_category: ~37 rows (approximately)
/*!40000 ALTER TABLE `bridge_category` DISABLE KEYS */;
INSERT INTO `bridge_category` (`bridgeID`, `categoryID`) VALUES
	(1, 6),
	(2, 5),
	(3, 2),
	(3, 3),
	(4, 6),
	(5, 5),
	(5, 6),
	(6, 2),
	(7, 3),
	(8, 5),
	(8, 6),
	(9, 5),
	(9, 6),
	(10, 6),
	(11, 5),
	(11, 6),
	(12, 4),
	(12, 5),
	(12, 6),
	(13, 1),
	(13, 6),
	(14, 2),
	(15, 6),
	(16, 1),
	(17, 1),
	(18, 2),
	(18, 3),
	(19, 4),
	(20, 1),
	(21, 4),
	(21, 5),
	(23, 4),
	(24, 4),
	(25, 1),
	(26, 3),
	(27, 3),
	(28, 2);
/*!40000 ALTER TABLE `bridge_category` ENABLE KEYS */;

-- Dumping structure for table amazingbridge.categories
DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `categoryID` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(255) NOT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table amazingbridge.categories: ~6 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES
	(1, 'Longest'),
	(2, 'Highest'),
	(3, 'Tallest'),
	(4, 'Oldest'),
	(5, 'Historic'),
	(6, 'Tourist Attractions');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table amazingbridge.images
DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `imageID` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(255) NOT NULL,
  `bridgeID` int(11) NOT NULL,
  PRIMARY KEY (`imageID`),
  UNIQUE KEY `link` (`link`),
  KEY `bridgeID` (`bridgeID`),
  CONSTRAINT `images_ibfk_1` FOREIGN KEY (`bridgeID`) REFERENCES `bridges` (`bridgeID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=462 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table amazingbridge.images: ~177 rows (approximately)
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` (`imageID`, `link`, `bridgeID`) VALUES
	(224, '../img/Pingtang-1.jpg', 18),
	(225, '../img/Pingtang-2.jpeg', 18),
	(226, '../img/Pingtang-3.jpg', 18),
	(227, '../img/Pingtang-4.jpg', 18),
	(228, '../img/Pingtang-5.jpg', 18),
	(289, '../img/cendere-bridge-1.jpg', 24),
	(290, '../img/cendere-bridge-2.jpg', 24),
	(291, '../img/cendere-bridge-3.jpg', 24),
	(292, '../img/lake_pontchartrain_causeway-1.jpg', 25),
	(293, '../img/lake_pontchartrain_causeway-2.jpg', 25),
	(294, '../img/lake_pontchartrain_causeway-3.jpg', 25),
	(296, '../img/golden-gate-bridge-1.jpg', 22),
	(297, '../img/golden-gate-bridge-2.jpg', 22),
	(298, '../img/golden-gate-bridge-3.jpg', 22),
	(299, '../img/golden-gate-bridge-4.jpg', 22),
	(300, '../img/golden-gate-bridge-5.jpg', 22),
	(301, '../img/trift-bridge-1.jpg', 1),
	(302, '../img/trift-bridge-2.jpg', 1),
	(303, '../img/trift-bridge-3.jpg', 1),
	(304, '../img/trift-bridge-4.jpg', 1),
	(305, '../img/trift-bridge-5.jpg', 1),
	(306, '../img/trift-bridge-6.jpg', 1),
	(307, '../img/trift-bridge-7.jpg', 1),
	(308, '../img/trift-bridge-8.jpg', 1),
	(309, '../img/trift-bridge-9.jpg', 1),
	(310, '../img/trift-bridge-10.jpg', 1),
	(311, '../img/trift-bridge-11.jpg', 1),
	(312, '../img/trift-bridge-12.jpg', 1),
	(313, '../img/trift-bridge-13.jpg', 1),
	(314, '../img/trift-bridge-14.jpg', 1),
	(315, '../img/trift-bridge-15.jpg', 1),
	(316, '../img/forth-bridge-1.jpg', 2),
	(317, '../img/forth-bridge-2.jpg', 2),
	(318, '../img/forth-bridge-3.jpg', 2),
	(319, '../img/forth-bridge-4.jpg', 2),
	(320, '../img/forth-bridge-5.jpeg', 2),
	(321, '../img/forth-bridge-6.jpg', 2),
	(322, '../img/forth-bridge-7.jpg', 2),
	(323, '../img/forth-bridge-8.jpg', 2),
	(324, '../img/millau-viaduct-1.jpg', 3),
	(325, '../img/millau-viaduct-2.png', 3),
	(326, '../img/millau-viaduct-3.jpg', 3),
	(327, '../img/millau-viaduct-4.jpg', 3),
	(328, '../img/millau-viaduct-5.jpg', 3),
	(329, '../img/golden-bridge-1.jpg', 4),
	(330, '../img/golden-bridge-2.jpg', 4),
	(331, '../img/golden-bridge-3.jpg', 4),
	(332, '../img/golden-bridge-4.jpg', 4),
	(333, '../img/golden-bridge-5.jpg', 4),
	(334, '../img/golden-bridge-6.jpg', 4),
	(335, '../img/golden-bridge-7.jpg', 4),
	(336, '../img/golden-bridge-8.jpg', 4),
	(337, '../img/westminster-bridge-1.jpg', 5),
	(338, '../img/westminster-bridge-2.jpg', 5),
	(339, '../img/westminster-bridge-3.jpg', 5),
	(340, '../img/westminster-bridge-4.jpg', 5),
	(341, '../img/westminster-bridge-5.jpg', 5),
	(342, '../img/westminster-bridge-6.jpg', 5),
	(343, '../img/westminster-bridge-7.jpg', 5),
	(344, '../img/westminster-bridge-8.jpg', 5),
	(345, '../img/new-river-gorge-bridge-1.jpg', 6),
	(346, '../img/new-river-gorge-bridge-2.jpg', 6),
	(347, '../img/new-river-gorge-bridge-3.jpg', 6),
	(348, '../img/new-river-gorge-bridge-4.jpg', 6),
	(349, '../img/new-river-gorge-bridge-5.jpg', 6),
	(350, '../img/new-river-gorge-bridge-6.jpg', 6),
	(351, '../img/new-river-gorge-bridge-7.jpg', 6),
	(352, '../img/new-river-gorge-bridge-8.jpg', 6),
	(353, '../img/new-river-gorge-bridge-9.jpg', 6),
	(354, '../img/new-river-gorge-bridge-10.jpg', 6),
	(355, '../img/new-river-gorge-bridge-11.jpg', 6),
	(356, '../img/new-river-gorge-bridge-12.jpg', 6),
	(357, '../img/akashi-kaikyo-bridge-1.jpg', 7),
	(358, '../img/akashi-kaikyo-bridge-2.jpg', 7),
	(359, '../img/akashi-kaikyo-bridge-3.jpg', 7),
	(360, '../img/akashi-kaikyo-bridge-4.jpg', 7),
	(361, '../img/akashi-kaikyo-bridge-5.jpg', 7),
	(362, '../img/akashi-kaikyo-bridge-6.jpg', 7),
	(363, '../img/akashi-kaikyo-bridge-7.jpg', 7),
	(364, '../img/akashi-kaikyo-bridge-8.jpg', 7),
	(365, '../img/akashi-kaikyo-bridge-9.jpg', 7),
	(366, '../img/brooklyn-bridge-1.jpg', 8),
	(367, '../img/brooklyn-bridge-2.jpg', 8),
	(368, '../img/brooklyn-bridge-3.jpg', 8),
	(369, '../img/brooklyn-bridge-4.jpg', 8),
	(370, '../img/brooklyn-bridge-5.jpg', 8),
	(371, '../img/brooklyn-bridge-6.jpg', 8),
	(372, '../img/brooklyn-bridge-7.jpg', 8),
	(373, '../img/brooklyn-bridge-8.jpg', 8),
	(374, '../img/brooklyn-bridge-9.jpg', 8),
	(375, '../img/brooklyn-bridge-10.jpg', 8),
	(376, '../img/alexandre-III-bridge-1.jpg', 9),
	(377, '../img/alexandre-III-bridge-2.jpg', 9),
	(378, '../img/alexandre-III-bridge-3.jpg', 9),
	(379, '../img/alexandre-III-bridge-4.jpg', 9),
	(380, '../img/alexandre-III-bridge-5.jpg', 9),
	(381, '../img/alexandre-III-bridge-6.jpg', 9),
	(382, '../img/sydney-harbour-bridge-1.jpg', 10),
	(383, '../img/sydney-harbour-bridge-2.jpg', 10),
	(384, '../img/sydney-harbour-bridge-3.jpg', 10),
	(385, '../img/sydney-harbour-bridge-4.jpg', 10),
	(386, '../img/sydney-harbour-bridge-5.jpg', 10),
	(387, '../img/sydney-harbour-bridge-6.jpg', 10),
	(388, '../img/sydney-harbour-bridge-7.jpg', 10),
	(389, '../img/sydney-harbour-bridge-8.jpg', 10),
	(390, '../img/tower-bridge-1.jpg', 11),
	(391, '../img/tower-bridge-2.jpg', 11),
	(392, '../img/tower-bridge-3.jpg', 11),
	(393, '../img/tower-bridge-4.jpg', 11),
	(394, '../img/tower-bridge-5.jpg', 11),
	(395, '../img/pont du-gard-1.jpg', 12),
	(396, '../img/pont du-gard-2.jpg', 12),
	(397, '../img/pont du-gard-3.jpg', 12),
	(398, '../img/pont du-gard-4.jpg', 12),
	(399, '../img/pont du-gard-5.jpg', 12),
	(400, '../img/pont du-gard-6.jpg', 12),
	(401, '../img/pont du-gard-7.jpg', 12),
	(402, '../img/pont du-gard-8.jpg', 12),
	(403, '../img/pont du-gard-9.jpg', 12),
	(404, '../img/pont du-gard-10.jpg', 12),
	(405, '../img/madgeberg-water-bridge-1.jpg', 13),
	(406, '../img/madgeberg-water-bridge-2.jpg', 13),
	(407, '../img/madgeberg-water-bridge-3.jpg', 13),
	(408, '../img/madgeberg-water-bridge-4.jpg', 13),
	(409, '../img/madgeberg-water-bridge-5.jpg', 13),
	(410, '../img/pont-jacques-chabanDelmas-bridge-2.jpg', 14),
	(411, '../img/pont-jacques-chabanDelmas-bridge-3.jpeg', 14),
	(412, '../img/pont-jacques-chabanDelmas-bridge-4.jpg', 14),
	(413, '../img/pont-jacques-chabanDelmas-bridge-5.jpg', 14),
	(414, '../img/capilano-suspension-bridge-1.jpg', 15),
	(415, '../img/capilano-suspension-bridge-2.jpg', 15),
	(416, '../img/capilano-suspension-bridge-3.jpg', 15),
	(417, '../img/capilano-suspension-bridge-4.jpg', 15),
	(418, '../img/capilano-suspension-bridge-5.jpg', 15),
	(419, '../img/capilano-suspension-bridge-6.jpg', 15),
	(420, '../img/confederation-bridge-1.jpg', 16),
	(421, '../img/confederation-bridge-2.jpg', 16),
	(422, '../img/confederation-bridge-3.jpg', 16),
	(423, '../img/confederation-bridge-4.jpg', 16),
	(424, '../img/confederation-bridge-5.jpg', 16),
	(425, '../img/confederation-bridge-6.jpg', 16),
	(426, '../img/danyang-kunshan-1.jpg', 17),
	(427, '../img/danyang-kunshan-2.jpg', 17),
	(428, '../img/danyang-kunshan-3.jpg', 17),
	(429, '../img/danyang-kunshan-4.jpg', 17),
	(430, '../img/danyang-kunshan-5.jpg', 17),
	(431, '../img/ponte-vecchio-1.jpg', 19),
	(432, '../img/ponte-vecchio-2.jpg', 19),
	(433, '../img/ponte-vecchio-3.jpg', 19),
	(434, '../img/ponte-vecchio-4.jpg', 19),
	(435, '../img/ponte-vecchio-5.jpg', 19),
	(436, '../img/changhua-kaohsiung-viaduct-1.jpg', 20),
	(437, '../img/changhua-kaohsiung-viaduct-2.jpg', 20),
	(438, '../img/changhua-kaohsiung-viaduct-3.jpg', 20),
	(439, '../img/changhua-kaohsiung-viaduct-4.jpg', 20),
	(440, '../img/rialto-bridge-1.jpg', 21),
	(441, '../img/rialto-bridge-2.jpg', 21),
	(442, '../img/rialto-bridge-3.jpg', 21),
	(443, '../img/rialto-bridge-4.jpg', 21),
	(444, '../img/rialto-bridge-5.jpg', 21),
	(445, '../img/alcantara-bridge-1.jpg', 23),
	(446, '../img/alcantara-bridge-2.jpg', 23),
	(447, '../img/alcantara-bridge-3.jpg', 23),
	(448, '../img/alcantara-bridge-4.jpg', 23),
	(449, '../img/alcantara-bridge-5.jpg', 23),
	(450, '../img/yavuz-sultan-selim-bridge-1.jpeg', 26),
	(451, '../img/yavuz-sultan-selim-bridge-2.jpeg', 26),
	(452, '../img/yavuz-sultan-selim-bridge-3.jpeg', 26),
	(453, '../img/yavuz-sultan-selim-bridge-4.jpeg', 26),
	(454, '../img/russky-bridge-1.jpg', 27),
	(455, '../img/russky-bridge-2.jpg', 27),
	(456, '../img/russky-bridge-3.jpg', 27),
	(457, '../img/russky-bridge-4.jpg', 27),
	(458, '../img/duge-bridge-1.jpg', 28),
	(459, '../img/duge-bridge-2.jpg', 28),
	(460, '../img/duge-bridge-3.jpg', 28),
	(461, '../img/duge-bridge-4.jpg', 28);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;

-- Dumping structure for table amazingbridge.permission
DROP TABLE IF EXISTS `permission`;
CREATE TABLE IF NOT EXISTS `permission` (
  `permissionID` int(11) NOT NULL,
  PRIMARY KEY (`permissionID`),
  CONSTRAINT `permission_ibfk_1` FOREIGN KEY (`permissionID`) REFERENCES `admins` (`adminID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table amazingbridge.permission: ~0 rows (approximately)
/*!40000 ALTER TABLE `permission` DISABLE KEYS */;
INSERT INTO `permission` (`permissionID`) VALUES
	(1);
/*!40000 ALTER TABLE `permission` ENABLE KEYS */;

-- Dumping structure for table amazingbridge.thumbnails
DROP TABLE IF EXISTS `thumbnails`;
CREATE TABLE IF NOT EXISTS `thumbnails` (
  `bridgeID` int(11) NOT NULL,
  `imageID` int(11) DEFAULT NULL,
  PRIMARY KEY (`bridgeID`),
  KEY `imageID` (`imageID`),
  CONSTRAINT `thumbnails_ibfk_1` FOREIGN KEY (`bridgeID`) REFERENCES `bridges` (`bridgeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `thumbnails_ibfk_2` FOREIGN KEY (`imageID`) REFERENCES `images` (`imageID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table amazingbridge.thumbnails: ~28 rows (approximately)
/*!40000 ALTER TABLE `thumbnails` DISABLE KEYS */;
INSERT INTO `thumbnails` (`bridgeID`, `imageID`) VALUES
	(18, 224),
	(24, 290),
	(25, 292),
	(22, 300),
	(1, 303),
	(2, 317),
	(3, 324),
	(4, 329),
	(5, 339),
	(6, 351),
	(7, 357),
	(8, 366),
	(9, 376),
	(10, 383),
	(11, 391),
	(12, 398),
	(13, 405),
	(14, 410),
	(15, 415),
	(16, 424),
	(17, 429),
	(19, 432),
	(20, 439),
	(21, 440),
	(23, 445),
	(26, 453),
	(27, 455),
	(28, 460);
/*!40000 ALTER TABLE `thumbnails` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
