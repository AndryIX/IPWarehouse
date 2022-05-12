--
-- PostgreSQL database dump
--

-- Dumped from database version 10.20
-- Dumped by pg_dump version 10.20

-- Started on 2022-05-12 14:23:28

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
-- TOC entry 8 (class 2615 OID 16490)
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
-- TOC entry 2942 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 197 (class 1259 OID 16491)
-- Name: accesses; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.accesses (
    id_role integer NOT NULL,
    id_app integer NOT NULL
);


ALTER TABLE public.accesses OWNER TO postgres;

--
-- TOC entry 198 (class 1259 OID 16494)
-- Name: apps; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.apps (
    id_app integer NOT NULL,
    app_name character varying(200) NOT NULL,
    url_address character varying(1000) NOT NULL
);


ALTER TABLE public.apps OWNER TO postgres;

--
-- TOC entry 199 (class 1259 OID 16500)
-- Name: assignments; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.assignments (
    id_user integer NOT NULL,
    id_role integer NOT NULL
);


ALTER TABLE public.assignments OWNER TO postgres;

--
-- TOC entry 200 (class 1259 OID 16503)
-- Name: roles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.roles (
    id_role integer NOT NULL,
    role_name character varying(100)
);


ALTER TABLE public.roles OWNER TO postgres;

--
-- TOC entry 201 (class 1259 OID 16506)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id_user integer NOT NULL,
    login character varying(100) NOT NULL,
    password character varying(200) NOT NULL
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 16509)
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
-- TOC entry 203 (class 1259 OID 16512)
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
-- TOC entry 204 (class 1259 OID 16515)
-- Name: countries; Type: TABLE; Schema: warehouse; Owner: postgres
--

CREATE TABLE warehouse.countries (
    id_country integer NOT NULL,
    country_name character varying(30) NOT NULL
);


ALTER TABLE warehouse.countries OWNER TO postgres;

--
-- TOC entry 205 (class 1259 OID 16518)
-- Name: currencies; Type: TABLE; Schema: warehouse; Owner: postgres
--

CREATE TABLE warehouse.currencies (
    id_currency integer NOT NULL,
    currencies_name character varying(30) NOT NULL,
    designation character varying(30) NOT NULL
);


ALTER TABLE warehouse.currencies OWNER TO postgres;

--
-- TOC entry 206 (class 1259 OID 16521)
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
-- TOC entry 207 (class 1259 OID 16524)
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
-- TOC entry 208 (class 1259 OID 16530)
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
-- TOC entry 209 (class 1259 OID 16534)
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
-- TOC entry 210 (class 1259 OID 16540)
-- Name: sheets; Type: TABLE; Schema: warehouse; Owner: postgres
--

CREATE TABLE warehouse.sheets (
    id_price integer DEFAULT 1 NOT NULL,
    start_date date,
    end_date date
);


ALTER TABLE warehouse.sheets OWNER TO postgres;

--
-- TOC entry 211 (class 1259 OID 16544)
-- Name: status; Type: TABLE; Schema: warehouse; Owner: postgres
--

CREATE TABLE warehouse.status (
    id_status integer NOT NULL,
    status_name character varying(15) NOT NULL
);


ALTER TABLE warehouse.status OWNER TO postgres;

--
-- TOC entry 212 (class 1259 OID 16547)
-- Name: units; Type: TABLE; Schema: warehouse; Owner: postgres
--

CREATE TABLE warehouse.units (
    id_unit integer NOT NULL,
    title character varying(10),
    "Designation" character varying(50)
);


ALTER TABLE warehouse.units OWNER TO postgres;

--
-- TOC entry 213 (class 1259 OID 16550)
-- Name: warehouse; Type: TABLE; Schema: warehouse; Owner: postgres
--

CREATE TABLE warehouse.warehouse (
    id_warehouse integer DEFAULT 1 NOT NULL,
    denomination character varying,
    footnote character varying
);


ALTER TABLE warehouse.warehouse OWNER TO postgres;

--
-- TOC entry 214 (class 1259 OID 16557)
-- Name: сategories; Type: TABLE; Schema: warehouse; Owner: postgres
--

CREATE TABLE warehouse."сategories" (
    id_categ integer DEFAULT 1 NOT NULL,
    title character varying(50)
);


ALTER TABLE warehouse."сategories" OWNER TO postgres;

--
-- TOC entry 2916 (class 0 OID 16491)
-- Dependencies: 197
-- Data for Name: accesses; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.accesses (id_role, id_app) VALUES (1, 1);
INSERT INTO public.accesses (id_role, id_app) VALUES (1, 2);
INSERT INTO public.accesses (id_role, id_app) VALUES (1, 3);
INSERT INTO public.accesses (id_role, id_app) VALUES (1, 4);
INSERT INTO public.accesses (id_role, id_app) VALUES (1, 5);
INSERT INTO public.accesses (id_role, id_app) VALUES (3, 5);


--
-- TOC entry 2917 (class 0 OID 16494)
-- Dependencies: 198
-- Data for Name: apps; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.apps (id_app, app_name, url_address) VALUES (2, 'Роли', '../m_moderation/roles.php');
INSERT INTO public.apps (id_app, app_name, url_address) VALUES (3, 'Назначения', '../m_moderation/assigns.php');
INSERT INTO public.apps (id_app, app_name, url_address) VALUES (4, 'Приложения', '../m_moderation/apps.php');
INSERT INTO public.apps (id_app, app_name, url_address) VALUES (1, 'Пользователи', '../m_moderation/users.php');
INSERT INTO public.apps (id_app, app_name, url_address) VALUES (5, 'Продажи', '../sells.php');


--
-- TOC entry 2918 (class 0 OID 16500)
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
-- TOC entry 2919 (class 0 OID 16503)
-- Dependencies: 200
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.roles (id_role, role_name) VALUES (1, 'Администратор');
INSERT INTO public.roles (id_role, role_name) VALUES (3, 'Кладовщик');
INSERT INTO public.roles (id_role, role_name) VALUES (5, 'Бухгалтер');
INSERT INTO public.roles (id_role, role_name) VALUES (4, 'Кассир');
INSERT INTO public.roles (id_role, role_name) VALUES (6, 'Экономист');
INSERT INTO public.roles (id_role, role_name) VALUES (7, 'Генеральный бухгалтер');
INSERT INTO public.roles (id_role, role_name) VALUES (8, 'Генеральный директор');
INSERT INTO public.roles (id_role, role_name) VALUES (2, 'Сис. Админ');


--
-- TOC entry 2920 (class 0 OID 16506)
-- Dependencies: 201
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.users (id_user, login, password) VALUES (3, 'Moderator', '2316b0cd8d2492e628050dd29aaea52d44540295');
INSERT INTO public.users (id_user, login, password) VALUES (1, 'admin', '63d62d4aee9a5d4fe8539e53a9e3d05ffc210c9b');
INSERT INTO public.users (id_user, login, password) VALUES (4, 'Абрамович', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');
INSERT INTO public.users (id_user, login, password) VALUES (7, 'Захаров', 'e1fff908336faf74bce6e110f2d52064fcbb6e7c');
INSERT INTO public.users (id_user, login, password) VALUES (8, 'Стародубцев', '853ccd68cb258dabbd83c3b5570af8dc012836f7');
INSERT INTO public.users (id_user, login, password) VALUES (9, 'Путин', 'd2ca227aa78acee6e2972b2de2217fdb1546ece9');
INSERT INTO public.users (id_user, login, password) VALUES (10, 'Илья', 'e3b1c845a99211a71ff5559074d7e624cdf509ef');
INSERT INTO public.users (id_user, login, password) VALUES (11, 'Антон', '60fbb7713999ac287be814420c77f68214977384');
INSERT INTO public.users (id_user, login, password) VALUES (6, 'Савощенко', 'df6ad19037c97987c4ff9792810c0e145356717c');
INSERT INTO public.users (id_user, login, password) VALUES (5, 'Суханов', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e');
INSERT INTO public.users (id_user, login, password) VALUES (12, 'Димон', '58656eff23e80c676873896d01d77996072c24b9');


--
-- TOC entry 2921 (class 0 OID 16509)
-- Dependencies: 202
-- Data for Name: contacts; Type: TABLE DATA; Schema: warehouse; Owner: postgres
--

INSERT INTO warehouse.contacts (id_contract, nomer_contract, date_contact, id_counterparty, id_status) VALUES (1, '0001', '2022-04-01', 1, 2);
INSERT INTO warehouse.contacts (id_contract, nomer_contract, date_contact, id_counterparty, id_status) VALUES (2, '0002', '2022-03-28', 1, 2);


--
-- TOC entry 2922 (class 0 OID 16512)
-- Dependencies: 203
-- Data for Name: counterparties; Type: TABLE DATA; Schema: warehouse; Owner: postgres
--

INSERT INTO warehouse.counterparties (id_counterparty, counterparty_name, "INN", "KPP", "OGRN", "OKPO", address, phone, email, "BIK", bank, "KS", "RS", "FIO", "FIO_otv", id_country) VALUES (1, 'ТоргХим', '1234567891', '251243441', '3071205010489', '10495', 'г Москва, ул. Пушкина', '89372885687', 'torgchim@gmail.ru', '627865410', 'АфроБанк', '1', '1', 'Александр Александович Алепкин', 'Александр Александович Алепкин', 1);


--
-- TOC entry 2923 (class 0 OID 16515)
-- Dependencies: 204
-- Data for Name: countries; Type: TABLE DATA; Schema: warehouse; Owner: postgres
--

INSERT INTO warehouse.countries (id_country, country_name) VALUES (1, 'Россия');


--
-- TOC entry 2924 (class 0 OID 16518)
-- Dependencies: 205
-- Data for Name: currencies; Type: TABLE DATA; Schema: warehouse; Owner: postgres
--

INSERT INTO warehouse.currencies (id_currency, currencies_name, designation) VALUES (1, 'Рубль', '₽');


--
-- TOC entry 2925 (class 0 OID 16521)
-- Dependencies: 206
-- Data for Name: income_price; Type: TABLE DATA; Schema: warehouse; Owner: postgres
--



--
-- TOC entry 2926 (class 0 OID 16524)
-- Dependencies: 207
-- Data for Name: invoices; Type: TABLE DATA; Schema: warehouse; Owner: postgres
--

INSERT INTO warehouse.invoices (id_invoice, number_invoice, date_invoice, id_contract) VALUES (1, '001', '2022-04-01', 1);
INSERT INTO warehouse.invoices (id_invoice, number_invoice, date_invoice, id_contract) VALUES (4, '004', '2022-04-09', 1);
INSERT INTO warehouse.invoices (id_invoice, number_invoice, date_invoice, id_contract) VALUES (2, '2', '2022-03-28', 1);
INSERT INTO warehouse.invoices (id_invoice, number_invoice, date_invoice, id_contract) VALUES (3, '3', '2022-03-27', 1);


--
-- TOC entry 2927 (class 0 OID 16530)
-- Dependencies: 208
-- Data for Name: products; Type: TABLE DATA; Schema: warehouse; Owner: postgres
--

INSERT INTO warehouse.products (id_product, name_product, condition, id_unit, id_warehouse, "id_сategory") VALUES (1, 'Монитор 23.8 дюйма', '1920x1080, 60 Гц, IPS, черный', 1, 1, 1);
INSERT INTO warehouse.products (id_product, name_product, condition, id_unit, id_warehouse, "id_сategory") VALUES (2, 'Компьютер', '8 ГБ, 256 ГБ SSD, AMD Radeon RX Vega 3', 1, 1, 1);
INSERT INTO warehouse.products (id_product, name_product, condition, id_unit, id_warehouse, "id_сategory") VALUES (3, 'Клавиатура', 'Oklick 120M', 1, 1, 1);
INSERT INTO warehouse.products (id_product, name_product, condition, id_unit, id_warehouse, "id_сategory") VALUES (4, 'Цемент', 'Стройматериал', 2, 2, 2);
INSERT INTO warehouse.products (id_product, name_product, condition, id_unit, id_warehouse, "id_сategory") VALUES (5, 'Кирпич', 'Стройматериал', 2, 2, 2);
INSERT INTO warehouse.products (id_product, name_product, condition, id_unit, id_warehouse, "id_сategory") VALUES (6, 'Щебень', 'Стройматериал', 2, 2, 2);
INSERT INTO warehouse.products (id_product, name_product, condition, id_unit, id_warehouse, "id_сategory") VALUES (7, 'Мышь компьютерная', 'Logitech M590 Multi-Device Silent, графитовый', 1, 1, 1);


--
-- TOC entry 2928 (class 0 OID 16534)
-- Dependencies: 209
-- Data for Name: products_invoice; Type: TABLE DATA; Schema: warehouse; Owner: postgres
--

INSERT INTO warehouse.products_invoice (id_invoice, id_product, quantity, price, id_currency) VALUES (1, 1, 5, 1010101, 1);
INSERT INTO warehouse.products_invoice (id_invoice, id_product, quantity, price, id_currency) VALUES (4, 4, 50, 120, 1);
INSERT INTO warehouse.products_invoice (id_invoice, id_product, quantity, price, id_currency) VALUES (1, 6, 20, 130, 1);
INSERT INTO warehouse.products_invoice (id_invoice, id_product, quantity, price, id_currency) VALUES (1, 7, 12, 500, 1);
INSERT INTO warehouse.products_invoice (id_invoice, id_product, quantity, price, id_currency) VALUES (3, 3, 25, 750, 1);


--
-- TOC entry 2929 (class 0 OID 16540)
-- Dependencies: 210
-- Data for Name: sheets; Type: TABLE DATA; Schema: warehouse; Owner: postgres
--

INSERT INTO warehouse.sheets (id_price, start_date, end_date) VALUES (1, '2022-01-01', '2022-01-02');


--
-- TOC entry 2930 (class 0 OID 16544)
-- Dependencies: 211
-- Data for Name: status; Type: TABLE DATA; Schema: warehouse; Owner: postgres
--

INSERT INTO warehouse.status (id_status, status_name) VALUES (1, 'Покупка');
INSERT INTO warehouse.status (id_status, status_name) VALUES (2, 'Продажа');


--
-- TOC entry 2931 (class 0 OID 16547)
-- Dependencies: 212
-- Data for Name: units; Type: TABLE DATA; Schema: warehouse; Owner: postgres
--

INSERT INTO warehouse.units (id_unit, title, "Designation") VALUES (1, 'штук', 'шт');
INSERT INTO warehouse.units (id_unit, title, "Designation") VALUES (2, 'килограмм', 'кг');


--
-- TOC entry 2932 (class 0 OID 16550)
-- Dependencies: 213
-- Data for Name: warehouse; Type: TABLE DATA; Schema: warehouse; Owner: postgres
--

INSERT INTO warehouse.warehouse (id_warehouse, denomination, footnote) VALUES (1, 'Склад 1', 'Склад для храния техники');
INSERT INTO warehouse.warehouse (id_warehouse, denomination, footnote) VALUES (2, 'Склад 2', 'Склад для храния химии');


--
-- TOC entry 2933 (class 0 OID 16557)
-- Dependencies: 214
-- Data for Name: сategories; Type: TABLE DATA; Schema: warehouse; Owner: postgres
--

INSERT INTO warehouse."сategories" (id_categ, title) VALUES (1, 'Техника');
INSERT INTO warehouse."сategories" (id_categ, title) VALUES (2, 'Химия');


--
-- TOC entry 2746 (class 2606 OID 16562)
-- Name: accesses accesses_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.accesses
    ADD CONSTRAINT accesses_pkey PRIMARY KEY (id_role, id_app);


--
-- TOC entry 2748 (class 2606 OID 16564)
-- Name: apps apps_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.apps
    ADD CONSTRAINT apps_pkey PRIMARY KEY (id_app);


--
-- TOC entry 2750 (class 2606 OID 16566)
-- Name: assignments assignments_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.assignments
    ADD CONSTRAINT assignments_pkey PRIMARY KEY (id_user, id_role);


--
-- TOC entry 2752 (class 2606 OID 16568)
-- Name: roles roles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id_role);


--
-- TOC entry 2754 (class 2606 OID 16570)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id_user);


--
-- TOC entry 2758 (class 2606 OID 16572)
-- Name: counterparties Counterparties_pkey; Type: CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.counterparties
    ADD CONSTRAINT "Counterparties_pkey" PRIMARY KEY (id_counterparty);


--
-- TOC entry 2774 (class 2606 OID 16574)
-- Name: status Status_pkey; Type: CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.status
    ADD CONSTRAINT "Status_pkey" PRIMARY KEY (id_status);


--
-- TOC entry 2756 (class 2606 OID 16576)
-- Name: contacts contacts_pkey; Type: CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.contacts
    ADD CONSTRAINT contacts_pkey PRIMARY KEY (id_contract);


--
-- TOC entry 2760 (class 2606 OID 16578)
-- Name: countries countries_pkey; Type: CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.countries
    ADD CONSTRAINT countries_pkey PRIMARY KEY (id_country);


--
-- TOC entry 2762 (class 2606 OID 16580)
-- Name: currencies currencies_pkey; Type: CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.currencies
    ADD CONSTRAINT currencies_pkey PRIMARY KEY (id_currency);


--
-- TOC entry 2764 (class 2606 OID 16582)
-- Name: income_price income_price_pkey; Type: CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.income_price
    ADD CONSTRAINT income_price_pkey PRIMARY KEY (id_product);


--
-- TOC entry 2766 (class 2606 OID 16584)
-- Name: invoices invoices_pkey; Type: CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.invoices
    ADD CONSTRAINT invoices_pkey PRIMARY KEY (id_invoice);


--
-- TOC entry 2772 (class 2606 OID 16586)
-- Name: sheets price_pkey; Type: CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.sheets
    ADD CONSTRAINT price_pkey PRIMARY KEY (id_price);


--
-- TOC entry 2780 (class 2606 OID 16588)
-- Name: сategories prod_categ_pkey; Type: CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse."сategories"
    ADD CONSTRAINT prod_categ_pkey PRIMARY KEY (id_categ);


--
-- TOC entry 2770 (class 2606 OID 16590)
-- Name: products_invoice products_invoice_pkey; Type: CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.products_invoice
    ADD CONSTRAINT products_invoice_pkey PRIMARY KEY (id_invoice, id_product);


--
-- TOC entry 2768 (class 2606 OID 16592)
-- Name: products products_pkey; Type: CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.products
    ADD CONSTRAINT products_pkey PRIMARY KEY (id_product);


--
-- TOC entry 2776 (class 2606 OID 16594)
-- Name: units units_pkey; Type: CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.units
    ADD CONSTRAINT units_pkey PRIMARY KEY (id_unit);


--
-- TOC entry 2778 (class 2606 OID 16596)
-- Name: warehouse warehouse_pkey; Type: CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.warehouse
    ADD CONSTRAINT warehouse_pkey PRIMARY KEY (id_warehouse);


--
-- TOC entry 2781 (class 2606 OID 16597)
-- Name: accesses accesses_id_app_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.accesses
    ADD CONSTRAINT accesses_id_app_fkey FOREIGN KEY (id_app) REFERENCES public.apps(id_app) NOT VALID;


--
-- TOC entry 2782 (class 2606 OID 16602)
-- Name: accesses accesses_id_role_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.accesses
    ADD CONSTRAINT accesses_id_role_fkey FOREIGN KEY (id_role) REFERENCES public.roles(id_role) NOT VALID;


--
-- TOC entry 2783 (class 2606 OID 16607)
-- Name: assignments assignments_id_role_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.assignments
    ADD CONSTRAINT assignments_id_role_fkey FOREIGN KEY (id_role) REFERENCES public.roles(id_role) NOT VALID;


--
-- TOC entry 2784 (class 2606 OID 16612)
-- Name: assignments assignments_id_user_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.assignments
    ADD CONSTRAINT assignments_id_user_fkey FOREIGN KEY (id_user) REFERENCES public.users(id_user) NOT VALID;


--
-- TOC entry 2785 (class 2606 OID 16617)
-- Name: contacts contacts_id_counterparty_fkey; Type: FK CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.contacts
    ADD CONSTRAINT contacts_id_counterparty_fkey FOREIGN KEY (id_counterparty) REFERENCES warehouse.counterparties(id_counterparty) NOT VALID;


--
-- TOC entry 2786 (class 2606 OID 16622)
-- Name: contacts contacts_id_status_fkey; Type: FK CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.contacts
    ADD CONSTRAINT contacts_id_status_fkey FOREIGN KEY (id_status) REFERENCES warehouse.status(id_status) NOT VALID;


--
-- TOC entry 2787 (class 2606 OID 16627)
-- Name: counterparties counterparties_id_country_fkey; Type: FK CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.counterparties
    ADD CONSTRAINT counterparties_id_country_fkey FOREIGN KEY (id_country) REFERENCES warehouse.countries(id_country) NOT VALID;


--
-- TOC entry 2788 (class 2606 OID 16632)
-- Name: invoices invoices_id_contract_fkey; Type: FK CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.invoices
    ADD CONSTRAINT invoices_id_contract_fkey FOREIGN KEY (id_contract) REFERENCES warehouse.contacts(id_contract) NOT VALID;


--
-- TOC entry 2789 (class 2606 OID 16637)
-- Name: products products_id_unit_fkey; Type: FK CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.products
    ADD CONSTRAINT products_id_unit_fkey FOREIGN KEY (id_unit) REFERENCES warehouse.units(id_unit) NOT VALID;


--
-- TOC entry 2790 (class 2606 OID 16642)
-- Name: products products_id_warehouse_fkey; Type: FK CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.products
    ADD CONSTRAINT products_id_warehouse_fkey FOREIGN KEY (id_warehouse) REFERENCES warehouse.warehouse(id_warehouse) NOT VALID;


--
-- TOC entry 2791 (class 2606 OID 16647)
-- Name: products products_id_сategory_fkey; Type: FK CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.products
    ADD CONSTRAINT "products_id_сategory_fkey" FOREIGN KEY ("id_сategory") REFERENCES warehouse."сategories"(id_categ) NOT VALID;


--
-- TOC entry 2792 (class 2606 OID 16652)
-- Name: products_invoice products_invoice_id_currency_fkey; Type: FK CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.products_invoice
    ADD CONSTRAINT products_invoice_id_currency_fkey FOREIGN KEY (id_currency) REFERENCES warehouse.currencies(id_currency) NOT VALID;


--
-- TOC entry 2793 (class 2606 OID 16657)
-- Name: products_invoice products_invoice_id_invoice_fkey; Type: FK CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.products_invoice
    ADD CONSTRAINT products_invoice_id_invoice_fkey FOREIGN KEY (id_invoice) REFERENCES warehouse.invoices(id_invoice) NOT VALID;


--
-- TOC entry 2794 (class 2606 OID 16662)
-- Name: products_invoice products_invoice_id_product_fkey; Type: FK CONSTRAINT; Schema: warehouse; Owner: postgres
--

ALTER TABLE ONLY warehouse.products_invoice
    ADD CONSTRAINT products_invoice_id_product_fkey FOREIGN KEY (id_product) REFERENCES warehouse.products(id_product) NOT VALID;


--
-- TOC entry 2941 (class 0 OID 0)
-- Dependencies: 8
-- Name: SCHEMA warehouse; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON SCHEMA warehouse TO PUBLIC;


-- Completed on 2022-05-12 14:23:29

--
-- PostgreSQL database dump complete
--

