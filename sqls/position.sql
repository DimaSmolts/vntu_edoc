-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Час створення: Січ 21 2025 р., 20:55
-- Версія сервера: 8.0.39-0ubuntu0.24.04.2
-- Версія PHP: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `VNTU`
--

-- --------------------------------------------------------

--
-- Структура таблиці `position`
--

CREATE TABLE `position` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `bitid` int NOT NULL DEFAULT '0',
  `vacdays` int NOT NULL DEFAULT '0',
  `pedagog` int NOT NULL DEFAULT '0',
  `naupedagog` int NOT NULL,
  `brief` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `status` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `position`
--

INSERT INTO `position` (`id`, `name`, `bitid`, `vacdays`, `pedagog`, `naupedagog`, `brief`, `status`) VALUES
(1, 'професор', 20, 56, 1, 1, 'проф.', 100),
(2, 'доцент', 19, 56, 1, 1, 'доц.', 90),
(3, 'старший викладач', 17, 56, 1, 1, 'ст.в.', 80),
(4, 'асистент', 16, 56, 1, 1, 'ас.', 60),
(18, 'декан', 0, 56, 1, 1, '', 110),
(46, 'викладач', 16, 56, 1, 1, 'викл.', 70),
(51, 'ректор', 24, 28, 1, 1, 'проф.', 200),
(52, 'завідувач кафедри, доцент', 19, 56, 1, 1, 'доц.', 90),
(458, 'учбовий майстер', 0, 0, 0, 0, '', 0),
(446, 'аспірант', 0, 0, 0, 1, '', 0),
(73, 'перший проректор з науково-педагогічної роботи по організації навчального процесу та його науково-методичного забезпечення', 0, 28, 1, 1, 'проф.', 120),
(81, 'проректор з наукової роботи', 0, 28, 1, 1, 'проф.', 120),
(448, 'завідувач лабораторією', 0, 0, 1, 0, 'ас.', 0),
(271, 'начальник відділу кадрів', 12, 28, 0, 0, '', 0),
(460, 'прибиральник службових приміщень', 0, 0, 0, 0, '', 0),
(380, 'завідувач кафедри, професор', 0, 0, 1, 1, 'проф.', 100),
(652, 'НДЧ провідний науковий співробітник', 0, 0, 0, 2, '', 0),
(455, 'інженер 2-ї категорії', 0, 0, 0, 0, '', 0),
(456, 'методист 2-ї категорії', 0, 0, 1, 0, '', 0),
(445, 'начальник відділу', 0, 0, 0, 0, '', 0),
(454, 'інженер 1-ї категорії', 0, 0, 0, 0, 'ас.', 50),
(426, 'викладач підготовчого відділення', 0, 0, 1, 1, 'викл.', 0),
(427, 'проректор з науково-педагогічної роботи і соціальних комунікацій', 0, 0, 1, 1, 'проф.', 120),
(428, 'проректор з науково-педагогічної роботи по інтеграції навчання з виробництвом та міжнародній інтеграції', 0, 0, 1, 1, 'проф.', 120),
(462, 'завідувач лабораторіями', 0, 0, 1, 0, 'ас.', 50),
(676, 'секретар', 0, 0, 0, 0, '', 0),
(443, 'лаборант', 0, 0, 0, 0, 'ас.', 40),
(444, 'старший лаборант', 0, 0, 0, 0, 'ас.', 45),
(651, 'НДЧ головний науковий співробітник', 0, 0, 0, 2, '', 0),
(453, 'інженер', 0, 0, 0, 0, '', 0),
(640, 'методист 1-ї категорії', 0, 0, 1, 0, 'ас.', 0),
(450, 'с.н.с.', 0, 0, 0, 0, '', 0),
(451, 'провідний інженер', 0, 0, 0, 0, 'пров. інж.', 0),
(437, 'директор', 0, 0, 0, 0, 'проф.', 100),
(452, 'старший учбовий майстр', 0, 0, 0, 0, '', 0),
(465, 'начальник', 0, 0, 0, 0, '', 0),
(469, 'завідувач відділом бібліотеки', 0, 0, 1, 0, '', 0),
(471, 'заступник директора', 0, 0, 0, 0, '', 0),
(472, 'комендант', 0, 0, 0, 0, '', 0),
(473, 'інженер 1 кат.', 0, 0, 0, 0, 'ас.', 50),
(474, 'головний механік', 0, 0, 0, 0, '', 0),
(475, 'оператор друкарського устаткування', 0, 0, 0, 0, '', 0),
(476, 'сторож', 0, 0, 0, 0, '', 0),
(477, 'чергова', 0, 0, 0, 0, '', 0),
(478, 'двірник', 0, 0, 0, 0, '', 0),
(479, 'завідувач сектору', 0, 0, 0, 0, '', 0),
(480, 'завідувач господарством', 0, 0, 0, 0, '', 0),
(647, 'фахівець з публічних закупівель 2-ї категорії', 0, 0, 0, 0, '', 0),
(482, 'інженер-програміст 1-ї категорії', 0, 0, 0, 0, '', 0),
(483, 'бібліотекар 1-ї категорії', 0, 0, 1, 0, '', 0),
(484, 'бібліотекар 2-ї категорії', 0, 0, 1, 0, '', 0),
(661, 'в. о. завідувача кафедри, професор', 0, 0, 1, 1, 'проф.', 100),
(678, 'в.о. директора', 0, 0, 0, 0, '', 0),
(489, 'технік 1-ї категорії', 0, 0, 0, 0, '', 0),
(490, 'завідувач гуртожитком', 0, 0, 0, 0, '', 0),
(491, 'секретар-референт', 0, 0, 0, 0, '', 0),
(492, 'водій вантажного а/м сміттєвоз КАМАЗ 53213 с/в', 0, 0, 0, 0, '', 0),
(494, 'диспетчер', 0, 0, 0, 0, '', 0),
(495, 'робітник', 0, 0, 0, 0, '', 0),
(496, 'провідний інженер-електронік', 0, 0, 0, 0, '', 0),
(497, 'провідний редактор', 0, 0, 0, 0, '', 0),
(498, 'бухгалтер 2-ї категорії', 0, 0, 0, 0, '', 0),
(499, 'прибиральник службових приміщень, зайнятий прибиранням санвузлів', 0, 0, 0, 0, '', 0),
(500, 'завідувач архівом', 0, 0, 1, 0, '', 0),
(501, 'провідний бібліотекар', 0, 0, 0, 0, '', 0),
(502, 'діловод', 0, 0, 0, 0, '', 0),
(504, 'електромонтер з ремонту і обслуговуванню електроустаткування 6 р.', 0, 0, 0, 0, '', 0),
(506, 'кухар 4 р.', 0, 0, 0, 0, '', 0),
(643, 'офіціант', 0, 0, 0, 0, '', 0),
(508, 'кухар 6 р.', 0, 0, 0, 0, '', 0),
(509, 'буфетниця', 0, 0, 0, 0, '', 0),
(512, 'слюсар-сантехнік 6 р.', 0, 0, 0, 0, '', 0),
(513, 'головний бібліограф', 0, 0, 0, 0, '', 0),
(517, 'завідувач канцелярії', 0, 0, 0, 0, '', 0),
(648, 'інженер по профорієнтації', 0, 0, 0, 0, '', 0),
(520, 'паспортист', 0, 0, 0, 0, '', 0),
(649, 'проректор з науково-педагогічної роботи по матеріально-технічному забезпеченню навчального та наукового процесів', 0, 0, 1, 1, 'проф.', 120),
(638, 'провідний фахівець із зв`язків з громадськістю та пресою', 0, 0, 0, 0, '', 0),
(523, 'комірник', 0, 0, 0, 0, '', 0),
(526, 'контролер-касир', 0, 0, 0, 0, '', 0),
(527, 'завідувач виробництвом', 0, 0, 0, 0, '', 0),
(529, 'завідувач центральним складом', 0, 0, 0, 0, '', 0),
(532, 'провідний бухгалтер', 0, 0, 0, 0, '', 0),
(533, 'бібліотекар', 0, 0, 1, 0, '', 0),
(535, 'провідний спеціаліст-дизайнер', 0, 0, 0, 0, '', 0),
(536, 'інженер-програміст 2-ї категорії', 0, 0, 0, 0, '', 0),
(537, 'столяр 5 р.', 0, 0, 0, 0, '', 0),
(538, 'головний бухгалтер', 0, 0, 0, 0, '', 0),
(539, 'головний енергетик', 0, 0, 0, 0, '', 0),
(540, 'слюсар-сантехнік', 0, 0, 0, 0, '', 0),
(541, 'технік', 0, 0, 0, 0, '', 0),
(542, 'завідувач аспірантурою', 0, 0, 0, 0, '', 0),
(645, 'електромонтер з ремонту і обслуговуванню електроустаткування', 0, 0, 0, 0, '', 0),
(544, 'головний бібліотекар', 0, 0, 1, 0, '', 0),
(546, 'інженер-нормувальник', 0, 0, 0, 0, '', 0),
(548, 'водій вантажного а/м УАЗ-3741-01', 0, 0, 0, 0, '', 0),
(549, 'завідувач господарчим двором', 0, 0, 0, 0, '', 0),
(550, 'інспектор', 0, 0, 0, 0, '', 0),
(552, 'завідувач відділом', 0, 0, 0, 0, 'ас.', 0),
(637, 'електрозварник ручного зварювання 2 р.', 0, 0, 0, 0, '', 0),
(554, 'майстер виробничого навчання', 0, 0, 0, 0, '', 0),
(642, 'вантажник', 0, 0, 0, 0, '', 0),
(557, 'редактор 1-ї категорії', 0, 0, 0, 0, '', 0),
(558, 'старший адміністратор', 0, 0, 0, 0, '', 0),
(559, 'бухгалтер 1-ї категорії', 0, 0, 0, 0, '', 0),
(644, 'електромонтер з ремонту і обслуговуванню електроустаткування 5 р.', 0, 0, 0, 0, '', 0),
(636, 'електромонтер 5 р.', 0, 0, 0, 0, '', 0),
(562, 'заступник головного бухгалтера', 0, 0, 0, 0, '', 0),
(563, 'слюсар-сантехнік 2 р.', 0, 0, 0, 0, '', 0),
(565, 'провідний економіст', 0, 0, 0, 0, '', 0),
(566, 'економіст 2-ї категорії', 0, 0, 0, 0, '', 0),
(567, 'практичний психолог', 0, 0, 0, 0, '', 0),
(568, 'мийник посуду', 0, 0, 0, 0, '', 0),
(570, 'провідний фахівець', 0, 0, 0, 0, '', 0),
(689, 'адміністратор', 0, 0, 0, 0, '', 0),
(574, 'електрогазозварник 5 р.', 0, 0, 0, 0, '', 0),
(576, 'кастелянша', 0, 0, 0, 0, '', 0),
(578, 'інженер - електронік 2-ї категорії', 0, 0, 0, 0, '', 0),
(579, 'фахівець з режиму секретності', 0, 0, 0, 0, '', 0),
(580, 'слюсар-сантехнік 4 р.', 0, 0, 0, 0, '', 0),
(581, 'столяр 4 р.', 0, 0, 0, 0, '', 0),
(583, 'фахівець з пожежної безпеки 1-ї категорії', 0, 0, 0, 0, '', 0),
(584, 'секретар-друкарка', 0, 0, 0, 0, '', 0),
(585, 'фахівець з публічних закупівель', 0, 0, 0, 0, '', 0),
(586, 'архіваріус', 0, 0, 1, 0, '', 0),
(588, 'токар 4 р.', 0, 0, 0, 0, '', 0),
(589, 'слюсар-сантехнік 5 р.', 0, 0, 0, 0, '', 0),
(590, 'економіст 1-ї категорії', 0, 0, 0, 0, '', 0),
(591, 'художній керівник', 0, 0, 0, 0, '', 0),
(592, 'редактор', 0, 0, 0, 0, '', 0),
(593, 'провідний інженер-програміст', 0, 0, 0, 0, '', 0),
(596, 'інженер спеціалізованих вчених рад', 0, 0, 0, 0, '', 0),
(599, 'головний інженер', 0, 0, 0, 0, '', 0),
(601, 'бухгалтер', 0, 0, 0, 0, '', 0),
(602, 'водій вантажного а/м КАМАЗ-55102', 0, 0, 0, 0, '', 0),
(603, 'робітник з комплексного обслуговування й ремонту будинків 4 р.', 0, 0, 0, 0, '', 0),
(604, 'маляр 3 р.', 0, 0, 0, 0, '', 0),
(605, 'робітник з комплексного обслуговування й ремонту будинків 2 р.', 0, 0, 0, 0, '', 0),
(606, 'маляр 4 р.', 0, 0, 0, 0, '', 0),
(607, 'муляр 4 р.', 0, 0, 0, 0, '', 0),
(646, 'Слюсар з експлуатації та ремонту газового устаткування', 0, 0, 0, 0, '', 0),
(609, 'бухгалтер-касир', 0, 0, 0, 0, '', 0),
(610, 'садівник', 0, 0, 0, 0, '', 0),
(612, 'електромонтер з ремонту і обслуговуванню електроустаткування 4 р.', 0, 0, 0, 0, '', 0),
(613, 'інженер-програміст', 0, 0, 0, 0, '', 0),
(614, 'фрезерувальник 5 р.', 0, 0, 0, 0, '', 0),
(616, 'технік - радист', 0, 0, 0, 0, '', 0),
(618, 'редактор 2-ї категорії', 0, 0, 0, 0, '', 0),
(620, 'керівник гуртка', 0, 0, 0, 0, '', 0),
(621, 'кухар 3 р.', 0, 0, 0, 0, '', 0),
(622, 'обліковець', 0, 0, 0, 0, '', 0),
(623, 'освітлювач', 0, 0, 0, 0, '', 0),
(624, 'старший лаборант з вищою освітою', 0, 0, 0, 0, '', 0),
(626, 'завідувач складом', 0, 0, 0, 0, '', 0),
(627, 'балетмейстер ансамблю бального танцю', 0, 0, 0, 0, '', 0),
(628, 'помічник ректора', 0, 0, 0, 0, '', 0),
(629, 'механізатор трактора Т-16', 0, 0, 0, 0, '', 0),
(630, 'юрисконсульт', 0, 0, 0, 0, '', 0),
(632, 'старший інспектор', 0, 0, 0, 0, '', 0),
(653, 'НДЧ старший науковий співробітник', 0, 0, 0, 2, '', 0),
(634, 'технік 2-ї категорії', 0, 0, 0, 0, '', 0),
(635, 'юрисконсульт 1-ї категорії', 0, 0, 0, 0, '', 0),
(641, 'голова спортивного клубу', 0, 0, 0, 0, '', 0),
(639, 'в.о. завідувача кафедри, доцент', 0, 0, 1, 1, 'доц.', 90),
(688, 'експедитор', 0, 0, 0, 0, '', 0),
(650, 'фахівець спецрад 1-ї категорії', 0, 0, 0, 0, '', 0),
(654, 'НДЧ науковий співробітник', 0, 0, 0, 2, '', 0),
(655, 'НДЧ молодший науковий співробітник', 0, 0, 0, 2, 'ст. викладач', 80),
(656, 'НДЧ начальник науково-дослідної частини', 0, 0, 0, 2, '', 0),
(658, 'кухар 5 р.', 0, 0, 0, 0, '', 0),
(659, 'завідувач сектора комп`ютерного забезпечення', 0, 0, 0, 0, '', 0),
(662, 'НДЧ інженер 2-ї категорії', 0, 0, 0, 2, '', 0),
(663, 'НДЧ технік 3-ї категорії', 0, 0, 0, 2, '', 0),
(664, 'НДЧ технік 2-ї категорії', 0, 0, 0, 2, '', 0),
(665, 'НДЧ технік 1-ї категорії', 0, 0, 0, 2, '', 0),
(666, 'НДЧ провідний фахівець', 0, 0, 0, 2, '', 0),
(667, 'НДЧ фахівець 2-ї категорії', 0, 0, 0, 2, '', 0),
(668, 'НДЧ інженер 1-ї категорії', 0, 0, 0, 2, '', 0),
(669, 'НДЧ фахівець 1-ї категорії', 0, 0, 0, 2, '', 0),
(670, 'НДЧ начальник сектору', 0, 0, 0, 2, '', 0),
(671, 'НДЧ бухгалтер 1-ї категорії', 0, 0, 0, 2, '', 0),
(672, 'вчений секретар', 0, 0, 0, 0, '', 0),
(673, 'НДЧ завідувач НОВ', 0, 0, 0, 2, '', 0),
(674, 'НДЧ бухгалтер 2-ї категорії', 0, 0, 0, 2, '', 0),
(675, 'НДЧ економіст 1-ї категорії', 0, 0, 0, 2, '', 0),
(677, 'бухгалтер-ревізор 2-ї категорії', 0, 0, 0, 0, '', 0),
(679, 'фахівець', 0, 0, 0, 0, '', 0),
(680, 'директор_нп', 0, 0, 1, 1, '', 0),
(681, 'Робітник по обслуговуванню електрозварювального обладнання 5 р.', 0, 0, 0, 0, '', 0),
(682, 'заступник ректора з правової роботи', 0, 0, 0, 0, '', 0),
(683, 'НДЧ інженер 3-ї категорії', 0, 0, 0, 2, '', 0),
(685, 'провідний фахівець з питань цивільного захисту', 0, 0, 0, 0, '', 0),
(686, 'завідувач сектором підтримки автоматизованої бібліотечної системи, інформаційного та програмного забезпечення (АБСІПЗ)', 0, 0, 0, 0, '', 0),
(687, 'робітник з комплексного обслуговування й ремонту будинків', 0, 0, 0, 0, '', 0),
(690, 'робітник з комплексного обслуговування й ремонту будинків 5 р.', 0, 0, 0, 0, '', 0),
(691, 'в.о. начальника', 0, 0, 0, 0, '', 0),
(692, 'маляр', 0, 0, 0, 0, '', 0),
(693, 'в.о. завідувача', 0, 0, 0, 0, '', 0),
(694, 'економіст', 0, 0, 0, 0, '', 0),
(695, 'фахівець 1-ї категорії', 0, 0, 0, 0, '', 0),
(696, 'НДЧ фахівець 3-ї категорії', 0, 0, 0, 2, '', 0),
(697, 'НДЧ провідний економіст', 0, 0, 0, 2, '', 0),
(698, 'НДЧ економіст', 0, 0, 0, 2, '', 0),
(699, 'перший проректор з наукової роботи та міжнародного співробітництва', 0, 0, 1, 1, '', 120),
(700, 'проректор з науково-педагогічної роботи та організації освітнього процесу', 0, 0, 1, 1, '', 120),
(701, 'проректор з науково-педагогічної роботи, перспективного розвитку та інфраструктури', 0, 0, 0, 1, '', 0),
(702, 'водій автотранспортних засобів', 0, 0, 0, 0, '', 0),
(707, 'столяр', 0, 0, 0, 0, '', 0),
(703, '', 0, 0, 0, 0, '', 0),
(704, 'виконувач обов`язків декана', 0, 0, 0, 1, '', 0),
(705, 'методист', 0, 0, 0, 0, '', 0),
(706, 'помічник ректора з організаційно-аналітичного супроводу вступної кампанії', 0, 0, 0, 0, '', 0),
(709, 'провідний юрисконсульт', 0, 0, 0, 0, '', 0),
(710, 'завідувач сектора соціологічних досліджень', 0, 0, 0, 0, '', 0),
(711, 'завідувач сектору розвитку персоналу та практик академічної доброчесності', 0, 0, 0, 0, '', 0),
(712, 'фахівець з публічних закупівель 1-ї категорії', 0, 0, 0, 0, '', 0),
(713, 'фахівець з питань цивільного захисту 1-ї категорії', 0, 0, 0, 0, '', 0),
(714, 'проректор з науково-педагогічної роботи, міжнародного співробітництва та молодіжної політики', 0, 0, 1, 1, '', 0),
(715, 'заступник головного бухгалтера з планово-фінансової роботи', 0, 0, 0, 0, '', 0),
(716, 'електрозварник ручного зварювання 5 р.', 0, 0, 0, 0, '', 0),
(717, 'НДЧ фахівець (економіст)', 0, 0, 0, 2, '', 0),
(718, 'НДЧ керівник сектору інтелектуальної власності', 0, 0, 0, 2, '', 0),
(719, 'фахівець 2-ї категорії', 0, 0, 0, 0, '', 0),
(720, 'провідний фахівець з публічних закупівель', 0, 0, 0, 0, '', 0),
(721, 'керівник', 0, 0, 0, 0, '', 0),
(722, 'палітурник', 0, 0, 0, 0, '', 0),
(723, 'НДЧ бухгалтер', 0, 0, 0, 2, '', 0),
(724, 'оператор комп`ютерного набору', 0, 0, 0, 0, '', 0),
(725, 'НДЧ фахівець', 0, 0, 0, 2, '', 0),
(726, 'НДЧ провідний інженер', 0, 0, 0, 2, '', 0),
(727, 'НДЧ провідний бухгалтер', 0, 0, 0, 2, '', 0);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `position`
--
ALTER TABLE `position`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=728;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
