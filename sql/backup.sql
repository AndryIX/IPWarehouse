--
-- PostgreSQL database dump
--

-- Dumped from database version 10.20
-- Dumped by pg_dump version 10.20

-- Started on 2022-04-01 15:33:26

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
-- TOC entry 1 (class 3079 OID 12924)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2832 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 200 (class 1259 OID 16435)
-- Name: accesses; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.accesses (
    id_role integer NOT NULL,
    id_app integer NOT NULL
);


ALTER TABLE public.accesses OWNER TO postgres;

--
-- TOC entry 199 (class 1259 OID 16430)
-- Name: apps; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.apps (
    id_app integer NOT NULL,
    app_name character varying(200) NOT NULL,
    url_address character varying(1000) NOT NULL
);


ALTER TABLE public.apps OWNER TO postgres;

--
-- TOC entry 198 (class 1259 OID 16415)
-- Name: assignments; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.assignments (
    id_user integer NOT NULL,
    id_role integer NOT NULL
);


ALTER TABLE public.assignments OWNER TO postgres;

--
-- TOC entry 197 (class 1259 OID 16405)
-- Name: roles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.roles (
    id_role integer NOT NULL,
    role_name character varying(100)
);


ALTER TABLE public.roles OWNER TO postgres;

--
-- TOC entry 196 (class 1259 OID 16395)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id_user integer NOT NULL,
    login character varying(100) NOT NULL,
    password character varying(200) NOT NULL
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 2824 (class 0 OID 16435)
-- Dependencies: 200
-- Data for Name: accesses; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.accesses (id_role, id_app) VALUES (1, 1);
INSERT INTO public.accesses (id_role, id_app) VALUES (1, 2);
INSERT INTO public.accesses (id_role, id_app) VALUES (1, 3);
INSERT INTO public.accesses (id_role, id_app) VALUES (1, 4);


--
-- TOC entry 2823 (class 0 OID 16430)
-- Dependencies: 199
-- Data for Name: apps; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.apps (id_app, app_name, url_address) VALUES (2, 'Роли', '../m_moderation/roles.php');
INSERT INTO public.apps (id_app, app_name, url_address) VALUES (3, 'Назначения', '../m_moderation/assigns.php');
INSERT INTO public.apps (id_app, app_name, url_address) VALUES (4, 'Приложения', '../m_moderation/apps.php');
INSERT INTO public.apps (id_app, app_name, url_address) VALUES (1, 'Пользователи', '../m_moderation/users.php');


--
-- TOC entry 2822 (class 0 OID 16415)
-- Dependencies: 198
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


--
-- TOC entry 2821 (class 0 OID 16405)
-- Dependencies: 197
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
-- TOC entry 2820 (class 0 OID 16395)
-- Dependencies: 196
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


--
-- TOC entry 2694 (class 2606 OID 16439)
-- Name: accesses accesses_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.accesses
    ADD CONSTRAINT accesses_pkey PRIMARY KEY (id_role, id_app);


--
-- TOC entry 2692 (class 2606 OID 16434)
-- Name: apps apps_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.apps
    ADD CONSTRAINT apps_pkey PRIMARY KEY (id_app);


--
-- TOC entry 2690 (class 2606 OID 16419)
-- Name: assignments assignments_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.assignments
    ADD CONSTRAINT assignments_pkey PRIMARY KEY (id_user, id_role);


--
-- TOC entry 2688 (class 2606 OID 16409)
-- Name: roles roles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id_role);


--
-- TOC entry 2686 (class 2606 OID 16399)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id_user);


--
-- TOC entry 2698 (class 2606 OID 16445)
-- Name: accesses accesses_id_app_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.accesses
    ADD CONSTRAINT accesses_id_app_fkey FOREIGN KEY (id_app) REFERENCES public.apps(id_app) NOT VALID;


--
-- TOC entry 2697 (class 2606 OID 16440)
-- Name: accesses accesses_id_role_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.accesses
    ADD CONSTRAINT accesses_id_role_fkey FOREIGN KEY (id_role) REFERENCES public.roles(id_role) NOT VALID;


--
-- TOC entry 2696 (class 2606 OID 16425)
-- Name: assignments assignments_id_role_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.assignments
    ADD CONSTRAINT assignments_id_role_fkey FOREIGN KEY (id_role) REFERENCES public.roles(id_role) NOT VALID;


--
-- TOC entry 2695 (class 2606 OID 16420)
-- Name: assignments assignments_id_user_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.assignments
    ADD CONSTRAINT assignments_id_user_fkey FOREIGN KEY (id_user) REFERENCES public.users(id_user) NOT VALID;


-- Completed on 2022-04-01 15:33:27

--
-- PostgreSQL database dump complete
--

