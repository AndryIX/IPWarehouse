--
-- PostgreSQL database dump
--

-- Dumped from database version 10.20
-- Dumped by pg_dump version 10.20

-- Started on 2022-06-11 13:11:32

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
-- TOC entry 5 (class 2615 OID 24992)
-- Name: warehouse; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA warehouse;


ALTER SCHEMA warehouse OWNER TO postgres;

--
-- TOC entry 1 (class 3079 OID 12924)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2924 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 197 (class 1259 OID 24993)
-- Name: accesses; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.accesses (
    id_role integer NOT NULL,
    id_app integer NOT NULL
);


ALTER TABLE public.accesses OWNER TO postgres;

--
-- TOC entry 198 (class 1259 OID 24996)
-- Name: apps; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.apps (
    id_app integer NOT NULL,
    app_name character varying(200) NOT NULL,
    url_address character varying(1000) NOT NULL
);


ALTER TABLE public.apps OWNER TO postgres;

--
-- TOC entry 199 (class 1259 OID 25002)
-- Name: assignments; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.assignments (
    id_user integer NOT NULL,
    id_role integer NOT NULL
);


ALTER TABLE public.assignments OWNER TO postgres;

--
-- TOC entry 200 (class 1259 OID 25005)
-- Name: roles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.roles (
    id_role integer NOT NULL,
    role_name character varying(100)
);


ALTER TABLE public.roles OWNER TO postgres;

--
-- TOC entry 201 (class 1259 OID 25008)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id_user integer NOT NULL,
    login character varying(100) NOT NULL,
    password character varying(200) NOT NULL
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 25011)
-- Name: contacts; Type: TABLE; Schema: warehouse; Owner: postgres
--

CREATE TABLE warehouse.contacts (
    id_contract integer NOT NULL,
    nomer_contract character varying(20) NOT NULL,
    date_contact date NOT NULL,
    id_counterparty integer NOT NULL,
    id_status integer NOT NULL
);


ALTER TABLE warehouse.contacts OWNER TO postgres;

--
-- TOC entry 203 (class 1259 OID 25014)
-- Name: counterparties; Type: TABLE; Schema: warehouse; Owner: postgres
--

CREATE TABLE warehouse.counterparties (
    id_counterparty integer NOT NULL,
    counterparty_name character varying(50) NOT NULL,
    "INN" character varying(12) NOT NULL,
    "KPP" character varying(9) NOT NULL,
    "OGRN" character varying(13) NOT NULL,
    "OKPO" character varying(10) NOT NULL,
    address character varying(50) NOT NULL,
    phone character varying(18) NOT NULL,
    email character varying(50) NOT NULL,
    "BIK" character varying(9) NOT NULL,
    bank character varying(100) NOT NULL,
    "KS" character varying(20) NOT NULL,
    "RS" character varying(20) NOT NULL,
    "FIO" character varying(60) NOT NULL,
    "FIO_otv" character varying(60) NOT NULL,
    id_country integer NOT NULL
);


ALTER TABLE warehouse.counterparties OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 25017)
-- Name: countries; Type: TABLE; Schema: warehouse; Owner: postgres
--

CREATE TABLE warehouse.countries (
    id_country integer NOT NULL,
    country_name character varying(30) NOT NULL
);


ALTER TABLE warehouse.countries OWNER TO postgres;

--
-- TOC entry 205 (class 1259 OID 25020)
-- Name: currencies; Type: TABLE; Schema: warehouse; Owner: postgres
--

CREATE TABLE warehouse.currencies (
    id_currency integer NOT NULL,
    currencies_name character varying(20) NOT NULL,
    designation character varying(15) NOT NULL
);


ALTER TABLE warehouse.currencies OWNER TO postgres;

--
-- TOC entry 206 (class 1259 OID 25026)
-- Name: invoices; Type: TABLE; Schema: warehouse; Owner: postgres
--

CREATE TABLE warehouse.invoices (
    id_invoice integer NOT NULL,
    number_invoice character varying(3),
    date_invoice date,
    id_contract integer
);


ALTER TABLE warehouse.invoices OWNER TO postgres;

--
-- TOC entry 207 (class 1259 OID 25032)
-- Name: products; Type: TABLE; Schema: warehouse; Owner: postgres
--

CREATE TABLE warehouse.products (
    id_product integer DEFAULT 1 NOT NULL,
    name_product character varying(50),
    condition character varying(100),
    id_unit integer,
    id_warehouse integer,
    "id_??ategory" integer
);


ALTER TABLE warehouse.products OWNER TO postgres;

--
-- TOC entry 208 (class 1259 OID 25036)
-- Name: products_invoice; Type: TABLE; Schema: warehouse; Owner: postgres
--

CREATE TABLE warehouse.products_invoice (
    id_invoice integer NOT NULL,
    id_product integer NOT NULL,
    quantity integer,
    price numeric(6,0),
    id_currency integer
);


ALTER TABLE warehouse.products_invoice OWNER TO postgres;

--
-- TOC entry 209 (class 1259 OID 25046)
-- Name: status; Type: TABLE; Schema: warehouse; Owner: postgres
--

CREATE TABLE warehouse.status (
    id_status integer NOT NULL,
    status_name character varying(15) NOT NULL
);


ALTER TABLE warehouse.status OWNER TO postgres;

--
-- TOC entry 210 (class 1259 OID 25049)
-- Name: units; Type: TABLE; Schema: warehouse; Owner: postgres
--

CREATE TABLE warehouse.units (
    id_unit integer NOT NULL,
    title character varying(10),
    "Designation" character varying(3)
);


ALTER TABLE warehouse.units OWNER TO postgres;

--
-- TOC entry 211 (class 1259 OID 25052)
-- Name: warehouse; Type: TABLE; Schema: warehouse; Owner: postgres
--

CREATE TABLE warehouse.warehouse (
    id_warehouse integer DEFAULT 1 NOT NULL,
    denomination character varying(30),
    footnote character varying(40)
);


ALTER TABLE warehouse.warehouse OWNER TO postgres;

--
-- TOC entry 212 (class 1259 OID 25059)
-- Name: ??ategories; Type: TABLE; Schema: warehouse; Owner: postgres
--

CREATE TABLE warehouse."??ategories" (
    id_categ integer DEFAULT 1 NOT NULL,
    title character varying(30)
);


ALTER TABLE warehouse."??ategories" OWNER TO postgres;

--
-- TOC entry 2900 (class 0 OID 24993)
-- Dependencies: 197
-- Data for Name: accesses; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.accesses (id_role, id_app) VALUES (1, 1);
INSERT INTO public.accesses (id_role, id_app) VALUES (1, 2);
INSERT INTO public.accesses (id_role, id_app) VALUES (1, 3);
INSERT INTO public.accesses (id_role, id_app) VALUES (1, 4);
INSERT INTO public.accesses (id_role, id_app) VALUES (3, 5);
INSERT INTO public.accesses (id_role, id_app) VALUES (3, 6);


--
-- TOC entry 2901 (class 0 OID 24996)
-- Dependencies: 198
-- Data for Name: apps; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.apps (id_app, app_name, url_address) VALUES (2, '????????', '../m_moderation/roles.php');
INSERT INTO public.apps (id_app, app_name, url_address) VALUES (3, '????????????????????', '../m_moderation/assigns.php');
INSERT INTO public.apps (id_app, app_name, url_address) VALUES (4, '????????????????????', '../m_moderation/apps.php');
INSERT INTO public.apps (id_app, app_name, url_address) VALUES (1, '????????????????????????', '../m_moderation/users.php');
INSERT INTO public.apps (id_app, app_name, url_address) VALUES (5, '??????????????', '../sells.php');
INSERT INTO public.apps (id_app, app_name, url_address) VALUES (6, '??????????????', '../buy.php');


--
-- TOC entry 2902 (class 0 OID 25002)
-- Dependencies: 199
-- Data for Name: assignments; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.assignments (id_user, id_role) VALUES (1, 1);
INSERT INTO public.assignments (id_user, id_role) VALUES (3, 3);
INSERT INTO public.assignments (id_user, id_role) VALUES (3, 1);
INSERT INTO public.assignments (id_user, id_role) VALUES (4, 8);
INSERT INTO public.assignments (id_user, id_role) VALUES (5, 4);
INSERT INTO public.assignments (id_user, id_role) VALUES (6, 5);
INSERT INTO public.assignments (id_user, id_role) VALUES (7, 2);
INSERT INTO public.assignments (id_user, id_role) VALUES (8, 3);
INSERT INTO public.assignments (id_user, id_role) VALUES (9, 7);
INSERT INTO public.assignments (id_user, id_role) VALUES (10, 6);
INSERT INTO public.assignments (id_user, id_role) VALUES (11, 7);
INSERT INTO public.assignments (id_user, id_role) VALUES (11, 2);
INSERT INTO public.assignments (id_user, id_role) VALUES (8, 6);
INSERT INTO public.assignments (id_user, id_role) VALUES (10, 4);
INSERT INTO public.assignments (id_user, id_role) VALUES (7, 5);
INSERT INTO public.assignments (id_user, id_role) VALUES (12, 3);


--
-- TOC entry 2903 (class 0 OID 25005)
-- Dependencies: 200
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.roles (id_role, role_name) VALUES (1, '??????????????????????????');
INSERT INTO public.roles (id_role, role_name) VALUES (3, '??????????????????');
INSERT INTO public.roles (id_role, role_name) VALUES (5, '??????????????????');
INSERT INTO public.roles (id_role, role_name) VALUES (4, '????????????');
INSERT INTO public.roles (id_role, role_name) VALUES (6, '??????????????????');
INSERT INTO public.roles (id_role, role_name) VALUES (7, '?????????????????????? ??????????????????');
INSERT INTO public.roles (id_role, role_name) VALUES (8, '?????????????????????? ????????????????');
INSERT INTO public.roles (id_role, role_name) VALUES (2, '??????. ??????????');


--
-- TOC entry 2904 (class 0 OID 25008)
-- Dependencies: 201
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.users (id_user, login, password) VALUES (3, 'Moderator', '2316b0cd8d2492e628050dd29aaea52d44540295');
INSERT INTO public.users (id_user, login, password) VALUES (1, 'admin', '63d62d4aee9a5d4fe8539e53a9e3d05ffc210c9b');
INSERT INTO public.users (id_user, login, password) VALUES (4, '??????????????????', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');
INSERT INTO public.users (id_user, login, password) VALUES (7, '??????????????', 'e1fff908336faf74bce6e110f2d52064fcbb6e7c');
INSERT INTO public.users (id_user, login, password) VALUES (8, '??????????????????????', '853ccd68cb258dabbd83c3b5570af8dc012836f7');
INSERT INTO public.users (id_user, login, password) VALUES (9, '??????????', 'd2ca227aa78acee6e2972b2de2217fdb1546ece9');
INSERT INTO public.users (id_user, login, password) VALUES (10, '????????', 'e3b1c845a99211a71ff5559074d7e624cdf509ef');
INSERT INTO public.users (id_user, login, password) VALUES (11, '??????????', '60fbb7713999ac287be814420c77f68214977384');
INSERT INTO public.users (id_user, login, password) VALUES (6, '??????????????????', 'df6ad19037c97987c4ff9792810c0e145356717c');
INSERT INTO public.users (id_user, login, password) VALUES (5, '??????????????', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e');
INSERT INTO public.users (id_user, login, password) VALUES (12, '??????????', '58656eff23e80c676873896d01d77996072c24b9');


--
-- TOC entry 2905 (class 0 OID 25011)
-- Dependencies: 202
-- Data for Name: contacts; Type: TABLE DATA; Schema: warehouse; Owner: postgres
--

INSERT INTO warehouse.contacts (id_contract, nomer_contract, date_contact, id_counterparty, id_status) VALUES (1, '1', '2022-05-08', 1, 1);
INSERT INTO warehouse.contacts (id_contract, nomer_contract, date_contact, id_counterparty, id_status) VALUES (2, '2', '2022-05-12', 2, 1);
INSERT INTO warehouse.contacts (id_contract, nomer_contract, date_contact, id_counterparty, id_status) VALUES (3, '3', '2022-05-15', 3, 1);
INSERT INTO warehouse.contacts (id_contract, nomer_contract, date_contact, id_counterparty, id_status) VALUES (4, '4', '2022-05-10', 2, 1);


--
-- TOC entry 2906 (class 0 OID 25014)
-- Dependencies: 203
-- Data for Name: counterparties; Type: TABLE DATA; Schema: warehouse; Owner: postgres
--

INSERT INTO warehouse.counterparties (id_counterparty, counterparty_name, "INN", "KPP", "OGRN", "OKPO", address, phone, email, "BIK", bank, "KS", "RS", "FIO", "FIO_otv", id_country) VALUES (1, '??????????????-????????', '3428983375', '633001001', '1033400719054', '40520689', '404143, ?????????????????????????? ??????????????', '+7 (3532) 92-55-29', 'impuls-agro@mail.ru', '43601742', '??????????????-????????', '30101810400000000225', '10285647290503628537', '?????????????? ?????????????? ????????????????????', '?????????????? ?????????????? ????????????????????', 1);
INSERT INTO warehouse.counterparties (id_counterparty, counterparty_name, "INN", "KPP", "OGRN", "OKPO", address, phone, email, "BIK", bank, "KS", "RS", "FIO", "FIO_otv", id_country) VALUES (2, '??????????????', '6440021299', '780501001', '1106440000644', '65834609', '?????????????????????? ??????????????,??.??????????????,????.??????????????????????,??.1', '+7 (84545) 3-00-55', 'shop.msk@balttex.ru', '43601806', '?????????????? ????????', '13467985246128536497', '52846913713467985255', '???????????????? ???????????? ????????????????????', '???????????????? ???????????? ????????????????????', 2);
INSERT INTO warehouse.counterparties (id_counterparty, counterparty_name, "INN", "KPP", "OGRN", "OKPO", address, phone, email, "BIK", bank, "KS", "RS", "FIO", "FIO_otv", id_country) VALUES (3, '????????????????????????????', '7733542991', '463201001', '1057746860775', '77319717', '305026, ?????????????? ??????????????,??.??????????,????????????????????,??.1', '+7 (4712) 24-07-45', 'volokno@kurskvolokno.ru', '43678838', '??????????????????????????????', '30101810400000000225', '10576938576039585193', '?????????????? ???????? ????????????????????', '?????????????? ???????? ????????????????????', 3);


--
-- TOC entry 2907 (class 0 OID 25017)
-- Dependencies: 204
-- Data for Name: countries; Type: TABLE DATA; Schema: warehouse; Owner: postgres
--

INSERT INTO warehouse.countries (id_country, country_name) VALUES (1, '??????????');
INSERT INTO warehouse.countries (id_country, country_name) VALUES (2, '??????????');
INSERT INTO warehouse.countries (id_country, country_name) VALUES (3, '????????????');
INSERT INTO warehouse.countries (id_country, country_name) VALUES (4, '??????');
INSERT INTO warehouse.countries (id_country, country_name) VALUES (5, '??????????????????');
INSERT INTO warehouse.countries (id_country, country_name) VALUES (6, '????????????????');
INSERT INTO warehouse.countries (id_country, country_name) VALUES (7, '??????????????');
INSERT INTO warehouse.countries (id_country, country_name) VALUES (8, '????????????????');
INSERT INTO warehouse.countries (id_country, country_name) VALUES (9, '??????????????????');
INSERT INTO warehouse.countries (id_country, country_name) VALUES (10, '??????????????');


--
-- TOC entry 2908 (class 0 OID 25020)
-- Dependencies: 205
-- Data for Name: currencies; Type: TABLE DATA; Schema: warehouse; Owner: postgres
--

INSERT INTO warehouse.currencies (id_currency, currencies_name, designation) VALUES (1, '??????????', '???');
INSERT INTO warehouse.currencies (id_currency, currencies_name, designation) VALUES (2, '????????????', '$');
INSERT INTO warehouse.currencies (id_currency, currencies_name, designation) VALUES (3, '????????', '???');


--
-- TOC entry 2909 (class 0 OID 25026)
-- Dependencies: 206
-- Data for Name: invoices; Type: TABLE DATA; Schema: warehouse; Owner: postgres
--

INSERT INTO warehouse.invoices (id_invoice, number_invoice, date_invoice, id_contract) VALUES (1, '1', '2022-05-08', 1);
INSERT INTO warehouse.invoices (id_invoice, number_invoice, date_invoice, id_contract) VALUES (2, '2', '2022-05-12', 2);
INSERT INTO warehouse.invoices (id_invoice, number_invoice, date_invoice, id_contract) VALUES (3, '3', '2022-05-15', 3);
INSERT INTO warehouse.invoices (id_invoice, number_invoice, date_invoice, id_contract) VALUES (4, '4', '2022-05-10', 4);


--
-- TOC entry 2910 (class 0 OID 25032)
-- Dependencies: 207
-- Data for Name: products; Type: TABLE DATA; Schema: warehouse; Owner: postgres
--

INSERT INTO warehouse.products (id_product, name_product, condition, id_unit, id_warehouse, "id_??ategory") VALUES (1, '??????????????????', '?????????????????? ?????????????????? "????????????????" ???????????? ?????? ??????????/?????????? ?????????? (3????)', 4, 2, 5);
INSERT INTO warehouse.products (id_product, name_product, condition, id_unit, id_warehouse, "id_??ategory") VALUES (2, '????????????', '????????????????-???????????????? ?????????? "????????????" ??200 (25 ????)', 4, 2, 5);
INSERT INTO warehouse.products (id_product, name_product, condition, id_unit, id_warehouse, "id_??ategory") VALUES (3, '????????????????', '???????????????? "??????????" 3????', 4, 2, 5);
INSERT INTO warehouse.products (id_product, name_product, condition, id_unit, id_warehouse, "id_??ategory") VALUES (4, '??????????????', '18.5" ?????????????? AOC e970Swn, 1366x768, 76 ????, TN', 4, 1, 4);
INSERT INTO warehouse.products (id_product, name_product, condition, id_unit, id_warehouse, "id_??ategory") VALUES (5, '????????????????????', 'OKLICK 130M Black USB ????????????', 4, 1, 4);
INSERT INTO warehouse.products (id_product, name_product, condition, id_unit, id_warehouse, "id_??ategory") VALUES (6, '????????, ????????????????????????', 'Defender Point MM-756, ????????????', 4, 1, 4);


--
-- TOC entry 2911 (class 0 OID 25036)
-- Dependencies: 208
-- Data for Name: products_invoice; Type: TABLE DATA; Schema: warehouse; Owner: postgres
--

INSERT INTO warehouse.products_invoice (id_invoice, id_product, quantity, price, id_currency) VALUES (1, 1, 6, 105, 1);
INSERT INTO warehouse.products_invoice (id_invoice, id_product, quantity, price, id_currency) VALUES (1, 2, 4, 181, 1);
INSERT INTO warehouse.products_invoice (id_invoice, id_product, quantity, price, id_currency) VALUES (2, 3, 3, 116, 1);
INSERT INTO warehouse.products_invoice (id_invoice, id_product, quantity, price, id_currency) VALUES (3, 4, 3, 7800, 1);
INSERT INTO warehouse.products_invoice (id_invoice, id_product, quantity, price, id_currency) VALUES (4, 6, 3, 139, 1);


--
-- TOC entry 2912 (class 0 OID 25046)
-- Dependencies: 209
-- Data for Name: status; Type: TABLE DATA; Schema: warehouse; Owner: postgres
--

INSERT INTO warehouse.status (id_status, status_name) VALUES (1, '??????????????');
INSERT INTO warehouse.status (id_status, status_name) VALUES (2, '??????????????');


--
-- TOC entry 2913 (class 0 OID 25049)
-- Dependencies: 210
-- Data for Name: units; Type: TABLE DATA; Schema: warehouse; Owner: postgres
--

INSERT INTO warehouse.units (id_unit, title, "Designation") VALUES (1, '??????????????????', '????.');
INSERT INTO warehouse.units (id_unit, title, "Designation") VALUES (2, '????????', '??.');
INSERT INTO warehouse.units (id_unit, title, "Designation") VALUES (3, '??????????????????', '????.');
INSERT INTO warehouse.units (id_unit, title, "Designation") VALUES (4, '??????????', '????.');
INSERT INTO warehouse.units (id_unit, title, "Designation") VALUES (5, '????????', '??.');


--
-- TOC entry 2914 (class 0 OID 25052)
-- Dependencies: 211
-- Data for Name: warehouse; Type: TABLE DATA; Schema: warehouse; Owner: postgres
--

INSERT INTO warehouse.warehouse (id_warehouse, denomination, footnote) VALUES (1, '?????????? 1', '?????? ??????????????????????');
INSERT INTO warehouse.warehouse (id_warehouse, denomination, footnote) VALUES (2, '?????????? 2', '?????? ???????????????????????? ????????????????????');
INSERT INTO warehouse.warehouse (id_warehouse, denomination, footnote) VALUES (3, '?????????? 3', '?????? ???????????????????? ????????????????????');


--
-- TOC entry 2915 (class 0 OID 25059)
-- Dependencies: 212
-- Data for Name: ??ategories; Type: TABLE DATA; Schema: warehouse; Owner: postgres
--

INSERT INTO warehouse."??ategories" (id_categ, title) VALUES (1, '???????????????? ?? ????????????????????????');
INSERT INTO warehouse."??ategories" (id_categ, title) VALUES (2, '?????????????? ??????????');
INSERT INTO warehouse."??ategories" (id_categ, title) VALUES (3, '?????????????? ??????????????');
INSERT INTO warehouse."??ategories" (id_categ, title) VALUES (4, '??????????????????????');
INSERT INTO warehouse."??ategories" (id_categ, title) VALUES (5, '???????????????????????? ???????????? ?? ????????????');


--
-- TOC entry 2734 (class 2606 OID 25064)
-- Name: accesses accesses_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.accesses
    ADD CONSTRAINT accesses_pkey PRIMARY KEY (id_role, id_app);


--
-- TOC entry 2736 (class 2606 OID 25066)
-- Name: apps apps_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.apps
    ADD CONSTRAINT apps_pkey PRIMARY KEY (id_app);


--
-- TOC entry 2738 (class 2606 OID 25068)
-- Name: assignments assignments_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.assignments
    ADD CONSTRAINT assignments_pkey PRIMARY KEY (id_user, id_role);


--
-- TOC entry 2740 (class 2606 OID 25070)
-- Name: roles roles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id_role);


--
-- TOC entry 2742 (class 2606 OID 25072)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id_user);


--
-- TOC entry 2746 (class 2606 OID 25074)
-- Name: counterparties Counterparties_pkey; Type: CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.counterparties
    ADD CONSTRAINT "Counterparties_pkey" PRIMARY KEY (id_counterparty);


--
-- TOC entry 2758 (class 2606 OID 25076)
-- Name: status Status_pkey; Type: CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.status
    ADD CONSTRAINT "Status_pkey" PRIMARY KEY (id_status);


--
-- TOC entry 2744 (class 2606 OID 25078)
-- Name: contacts contacts_pkey; Type: CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.contacts
    ADD CONSTRAINT contacts_pkey PRIMARY KEY (id_contract);


--
-- TOC entry 2748 (class 2606 OID 25080)
-- Name: countries countries_pkey; Type: CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.countries
    ADD CONSTRAINT countries_pkey PRIMARY KEY (id_country);


--
-- TOC entry 2750 (class 2606 OID 25082)
-- Name: currencies currencies_pkey; Type: CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.currencies
    ADD CONSTRAINT currencies_pkey PRIMARY KEY (id_currency);


--
-- TOC entry 2752 (class 2606 OID 25086)
-- Name: invoices invoices_pkey; Type: CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.invoices
    ADD CONSTRAINT invoices_pkey PRIMARY KEY (id_invoice);


--
-- TOC entry 2764 (class 2606 OID 25090)
-- Name: ??ategories prod_categ_pkey; Type: CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse."??ategories"
    ADD CONSTRAINT prod_categ_pkey PRIMARY KEY (id_categ);


--
-- TOC entry 2756 (class 2606 OID 25092)
-- Name: products_invoice products_invoice_pkey; Type: CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.products_invoice
    ADD CONSTRAINT products_invoice_pkey PRIMARY KEY (id_invoice, id_product);


--
-- TOC entry 2754 (class 2606 OID 25094)
-- Name: products products_pkey; Type: CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.products
    ADD CONSTRAINT products_pkey PRIMARY KEY (id_product);


--
-- TOC entry 2760 (class 2606 OID 25096)
-- Name: units units_pkey; Type: CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.units
    ADD CONSTRAINT units_pkey PRIMARY KEY (id_unit);


--
-- TOC entry 2762 (class 2606 OID 25098)
-- Name: warehouse warehouse_pkey; Type: CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.warehouse
    ADD CONSTRAINT warehouse_pkey PRIMARY KEY (id_warehouse);


--
-- TOC entry 2765 (class 2606 OID 25099)
-- Name: accesses accesses_id_app_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.accesses
    ADD CONSTRAINT accesses_id_app_fkey FOREIGN KEY (id_app) REFERENCES public.apps(id_app) NOT VALID;


--
-- TOC entry 2766 (class 2606 OID 25104)
-- Name: accesses accesses_id_role_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.accesses
    ADD CONSTRAINT accesses_id_role_fkey FOREIGN KEY (id_role) REFERENCES public.roles(id_role) NOT VALID;


--
-- TOC entry 2767 (class 2606 OID 25109)
-- Name: assignments assignments_id_role_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.assignments
    ADD CONSTRAINT assignments_id_role_fkey FOREIGN KEY (id_role) REFERENCES public.roles(id_role) NOT VALID;


--
-- TOC entry 2768 (class 2606 OID 25114)
-- Name: assignments assignments_id_user_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.assignments
    ADD CONSTRAINT assignments_id_user_fkey FOREIGN KEY (id_user) REFERENCES public.users(id_user) NOT VALID;


--
-- TOC entry 2769 (class 2606 OID 25119)
-- Name: contacts contacts_id_counterparty_fkey; Type: FK CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.contacts
    ADD CONSTRAINT contacts_id_counterparty_fkey FOREIGN KEY (id_counterparty) REFERENCES warehouse.counterparties(id_counterparty) NOT VALID;


--
-- TOC entry 2770 (class 2606 OID 25124)
-- Name: contacts contacts_id_status_fkey; Type: FK CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.contacts
    ADD CONSTRAINT contacts_id_status_fkey FOREIGN KEY (id_status) REFERENCES warehouse.status(id_status) NOT VALID;


--
-- TOC entry 2771 (class 2606 OID 25129)
-- Name: counterparties counterparties_id_country_fkey; Type: FK CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.counterparties
    ADD CONSTRAINT counterparties_id_country_fkey FOREIGN KEY (id_country) REFERENCES warehouse.countries(id_country) NOT VALID;


--
-- TOC entry 2772 (class 2606 OID 25134)
-- Name: invoices invoices_id_contract_fkey; Type: FK CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.invoices
    ADD CONSTRAINT invoices_id_contract_fkey FOREIGN KEY (id_contract) REFERENCES warehouse.contacts(id_contract) NOT VALID;


--
-- TOC entry 2773 (class 2606 OID 25139)
-- Name: products products_id_unit_fkey; Type: FK CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.products
    ADD CONSTRAINT products_id_unit_fkey FOREIGN KEY (id_unit) REFERENCES warehouse.units(id_unit) NOT VALID;


--
-- TOC entry 2774 (class 2606 OID 25144)
-- Name: products products_id_warehouse_fkey; Type: FK CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.products
    ADD CONSTRAINT products_id_warehouse_fkey FOREIGN KEY (id_warehouse) REFERENCES warehouse.warehouse(id_warehouse) NOT VALID;


--
-- TOC entry 2775 (class 2606 OID 25149)
-- Name: products products_id_??ategory_fkey; Type: FK CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.products
    ADD CONSTRAINT "products_id_??ategory_fkey" FOREIGN KEY ("id_??ategory") REFERENCES warehouse."??ategories"(id_categ) NOT VALID;


--
-- TOC entry 2776 (class 2606 OID 25154)
-- Name: products_invoice products_invoice_id_currency_fkey; Type: FK CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.products_invoice
    ADD CONSTRAINT products_invoice_id_currency_fkey FOREIGN KEY (id_currency) REFERENCES warehouse.currencies(id_currency) NOT VALID;


--
-- TOC entry 2777 (class 2606 OID 25159)
-- Name: products_invoice products_invoice_id_invoice_fkey; Type: FK CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.products_invoice
    ADD CONSTRAINT products_invoice_id_invoice_fkey FOREIGN KEY (id_invoice) REFERENCES warehouse.invoices(id_invoice) NOT VALID;


--
-- TOC entry 2778 (class 2606 OID 25164)
-- Name: products_invoice products_invoice_id_product_fkey; Type: FK CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.products_invoice
    ADD CONSTRAINT products_invoice_id_product_fkey FOREIGN KEY (id_product) REFERENCES warehouse.products(id_product) NOT VALID;


--
-- TOC entry 2923 (class 0 OID 0)
-- Dependencies: 5
-- Name: SCHEMA warehouse; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON SCHEMA warehouse TO PUBLIC;


-- Completed on 2022-06-11 13:11:32

--
-- PostgreSQL database dump complete
--

