--
-- PostgreSQL database dump
--

-- Dumped from database version 10.20
-- Dumped by pg_dump version 10.20

-- Started on 2022-05-17 12:09:55

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 8 (class 2615 OID 24755)
-- Name: warehouse; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA warehouse;


ALTER SCHEMA warehouse OWNER TO postgres;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 202 (class 1259 OID 24774)
-- Name: contacts; Type: TABLE; Schema: warehouse; Owner: postgres
--

CREATE TABLE warehouse.contacts (
    id_contract integer NOT NULL,
    nomer_contract character varying(40) NOT NULL,
    date_contact date NOT NULL,
    id_counterparty integer NOT NULL,
    id_status integer NOT NULL
);


ALTER TABLE warehouse.contacts OWNER TO postgres;

--
-- TOC entry 203 (class 1259 OID 24777)
-- Name: counterparties; Type: TABLE; Schema: warehouse; Owner: postgres
--

CREATE TABLE warehouse.counterparties (
    id_counterparty integer NOT NULL,
    counterparty_name character varying(50) NOT NULL,
    "INN" character varying(10) NOT NULL,
    "KPP" character varying(9) NOT NULL,
    "OGRN" character varying(13) NOT NULL,
    "OKPO" character varying(8) NOT NULL,
    address character varying(50) NOT NULL,
    phone character varying(20) NOT NULL,
    email character varying(50) NOT NULL,
    "BIK" character varying(9) NOT NULL,
    bank character varying(100) NOT NULL,
    "KS" character varying(20) NOT NULL,
    "RS" character varying(20) NOT NULL,
    "FIO" character varying(50) NOT NULL,
    "FIO_otv" character varying(50) NOT NULL,
    id_country integer NOT NULL
);


ALTER TABLE warehouse.counterparties OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 24780)
-- Name: countries; Type: TABLE; Schema: warehouse; Owner: postgres
--

CREATE TABLE warehouse.countries (
    id_country integer NOT NULL,
    country_name character varying(30) NOT NULL
);


ALTER TABLE warehouse.countries OWNER TO postgres;

--
-- TOC entry 205 (class 1259 OID 24783)
-- Name: currencies; Type: TABLE; Schema: warehouse; Owner: postgres
--

CREATE TABLE warehouse.currencies (
    id_currency integer NOT NULL,
    currencies_name character varying(30) NOT NULL,
    designation character varying(30) NOT NULL
);


ALTER TABLE warehouse.currencies OWNER TO postgres;

--
-- TOC entry 206 (class 1259 OID 24786)
-- Name: income_price; Type: TABLE; Schema: warehouse; Owner: postgres
--

CREATE TABLE warehouse.income_price (
    id_product integer NOT NULL,
    id_price integer NOT NULL,
    price integer,
    id_currency integer
);


ALTER TABLE warehouse.income_price OWNER TO postgres;

--
-- TOC entry 207 (class 1259 OID 24789)
-- Name: invoices; Type: TABLE; Schema: warehouse; Owner: postgres
--

CREATE TABLE warehouse.invoices (
    id_invoice integer NOT NULL,
    number_invoice character varying,
    date_invoice date,
    id_contract integer
);


ALTER TABLE warehouse.invoices OWNER TO postgres;

--
-- TOC entry 208 (class 1259 OID 24795)
-- Name: products; Type: TABLE; Schema: warehouse; Owner: postgres
--

CREATE TABLE warehouse.products (
    id_product integer DEFAULT 1 NOT NULL,
    name_product character varying(50),
    condition character varying(50),
    id_unit integer,
    id_warehouse integer,
    "id_сategory" integer
);


ALTER TABLE warehouse.products OWNER TO postgres;

--
-- TOC entry 209 (class 1259 OID 24799)
-- Name: products_invoice; Type: TABLE; Schema: warehouse; Owner: postgres
--

CREATE TABLE warehouse.products_invoice (
    id_invoice integer NOT NULL,
    id_product integer NOT NULL,
    quantity integer,
    price numeric,
    id_currency integer
);


ALTER TABLE warehouse.products_invoice OWNER TO postgres;

--
-- TOC entry 210 (class 1259 OID 24805)
-- Name: sheets; Type: TABLE; Schema: warehouse; Owner: postgres
--

CREATE TABLE warehouse.sheets (
    id_price integer DEFAULT 1 NOT NULL,
    start_date date,
    end_date date
);


ALTER TABLE warehouse.sheets OWNER TO postgres;

--
-- TOC entry 211 (class 1259 OID 24809)
-- Name: status; Type: TABLE; Schema: warehouse; Owner: postgres
--

CREATE TABLE warehouse.status (
    id_status integer NOT NULL,
    status_name character varying(15) NOT NULL
);


ALTER TABLE warehouse.status OWNER TO postgres;

--
-- TOC entry 212 (class 1259 OID 24812)
-- Name: units; Type: TABLE; Schema: warehouse; Owner: postgres
--

CREATE TABLE warehouse.units (
    id_unit integer NOT NULL,
    title character varying(10),
    "Designation" character varying(50)
);


ALTER TABLE warehouse.units OWNER TO postgres;

--
-- TOC entry 213 (class 1259 OID 24815)
-- Name: warehouse; Type: TABLE; Schema: warehouse; Owner: postgres
--

CREATE TABLE warehouse.warehouse (
    id_warehouse integer DEFAULT 1 NOT NULL,
    denomination character varying,
    footnote character varying
);


ALTER TABLE warehouse.warehouse OWNER TO postgres;

--
-- TOC entry 214 (class 1259 OID 24822)
-- Name: сategories; Type: TABLE; Schema: warehouse; Owner: postgres
--

CREATE TABLE warehouse."сategories" (
    id_categ integer DEFAULT 1 NOT NULL,
    title character varying(50)
);


ALTER TABLE warehouse."сategories" OWNER TO postgres;

--
-- TOC entry 2897 (class 0 OID 24774)
-- Dependencies: 202
-- Data for Name: contacts; Type: TABLE DATA; Schema: warehouse; Owner: postgres
--

COPY warehouse.contacts (id_contract, nomer_contract, date_contact, id_counterparty, id_status) FROM stdin;
1	0001	2022-04-01	1	2
2	0002	2022-03-28	1	2
\.


--
-- TOC entry 2898 (class 0 OID 24777)
-- Dependencies: 203
-- Data for Name: counterparties; Type: TABLE DATA; Schema: warehouse; Owner: postgres
--

COPY warehouse.counterparties (id_counterparty, counterparty_name, "INN", "KPP", "OGRN", "OKPO", address, phone, email, "BIK", bank, "KS", "RS", "FIO", "FIO_otv", id_country) FROM stdin;
1	ТоргХим	1234567891	251243441	3071205010489	10495	г Москва, ул. Пушкина	89372885687	torgchim@gmail.ru	627865410	АфроБанк	1	1	Александр Александович Алепкин	Александр Александович Алепкин	1
\.


--
-- TOC entry 2899 (class 0 OID 24780)
-- Dependencies: 204
-- Data for Name: countries; Type: TABLE DATA; Schema: warehouse; Owner: postgres
--

COPY warehouse.countries (id_country, country_name) FROM stdin;
1	Россия
\.


--
-- TOC entry 2900 (class 0 OID 24783)
-- Dependencies: 205
-- Data for Name: currencies; Type: TABLE DATA; Schema: warehouse; Owner: postgres
--

COPY warehouse.currencies (id_currency, currencies_name, designation) FROM stdin;
1	Рубль	₽
\.


--
-- TOC entry 2901 (class 0 OID 24786)
-- Dependencies: 206
-- Data for Name: income_price; Type: TABLE DATA; Schema: warehouse; Owner: postgres
--

COPY warehouse.income_price (id_product, id_price, price, id_currency) FROM stdin;
\.


--
-- TOC entry 2902 (class 0 OID 24789)
-- Dependencies: 207
-- Data for Name: invoices; Type: TABLE DATA; Schema: warehouse; Owner: postgres
--

COPY warehouse.invoices (id_invoice, number_invoice, date_invoice, id_contract) FROM stdin;
1	001	2022-04-01	1
4	004	2022-04-09	1
2	2	2022-03-28	1
3	3	2022-03-27	1
\.


--
-- TOC entry 2903 (class 0 OID 24795)
-- Dependencies: 208
-- Data for Name: products; Type: TABLE DATA; Schema: warehouse; Owner: postgres
--

COPY warehouse.products (id_product, name_product, condition, id_unit, id_warehouse, "id_сategory") FROM stdin;
1	Монитор 23.8 дюйма	1920x1080, 60 Гц, IPS, черный	1	1	1
2	Компьютер	8 ГБ, 256 ГБ SSD, AMD Radeon RX Vega 3	1	1	1
3	Клавиатура	Oklick 120M	1	1	1
4	Цемент	Стройматериал	2	2	2
5	Кирпич	Стройматериал	2	2	2
6	Щебень	Стройматериал	2	2	2
7	Мышь компьютерная	Logitech M590 Multi-Device Silent, графитовый	1	1	1
\.


--
-- TOC entry 2904 (class 0 OID 24799)
-- Dependencies: 209
-- Data for Name: products_invoice; Type: TABLE DATA; Schema: warehouse; Owner: postgres
--

COPY warehouse.products_invoice (id_invoice, id_product, quantity, price, id_currency) FROM stdin;
1	1	5	1010101	1
4	4	50	120	1
1	6	20	130	1
1	7	12	500	1
3	3	25	750	1
\.


--
-- TOC entry 2905 (class 0 OID 24805)
-- Dependencies: 210
-- Data for Name: sheets; Type: TABLE DATA; Schema: warehouse; Owner: postgres
--

COPY warehouse.sheets (id_price, start_date, end_date) FROM stdin;
1	2022-01-01	2022-01-02
\.


--
-- TOC entry 2906 (class 0 OID 24809)
-- Dependencies: 211
-- Data for Name: status; Type: TABLE DATA; Schema: warehouse; Owner: postgres
--

COPY warehouse.status (id_status, status_name) FROM stdin;
1	Покупка
2	Продажа
\.


--
-- TOC entry 2907 (class 0 OID 24812)
-- Dependencies: 212
-- Data for Name: units; Type: TABLE DATA; Schema: warehouse; Owner: postgres
--

COPY warehouse.units (id_unit, title, "Designation") FROM stdin;
1	штук	шт
2	килограмм	кг
\.


--
-- TOC entry 2908 (class 0 OID 24815)
-- Dependencies: 213
-- Data for Name: warehouse; Type: TABLE DATA; Schema: warehouse; Owner: postgres
--

COPY warehouse.warehouse (id_warehouse, denomination, footnote) FROM stdin;
1	Склад 1	Склад для храния техники
2	Склад 2	Склад для храния химии
\.


--
-- TOC entry 2909 (class 0 OID 24822)
-- Dependencies: 214
-- Data for Name: сategories; Type: TABLE DATA; Schema: warehouse; Owner: postgres
--

COPY warehouse."сategories" (id_categ, title) FROM stdin;
1	Техника
2	Химия
\.


--
-- TOC entry 2915 (class 0 OID 0)
-- Dependencies: 8
-- Name: SCHEMA warehouse; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON SCHEMA warehouse TO PUBLIC;


-- Completed on 2022-05-17 12:09:56

--
-- PostgreSQL database dump complete
--

