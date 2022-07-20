--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.24
-- Dumped by pg_dump version 9.6.24

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

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: category; Type: TABLE; Schema: public; Owner: symfonytest
--

CREATE TABLE public.category (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    active boolean DEFAULT true NOT NULL
);


ALTER TABLE public.category OWNER TO symfonytest;

--
-- Name: feedback; Type: TABLE; Schema: public; Owner: symfonytest
--

CREATE TABLE public.feedback (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    massage text NOT NULL,
    created timestamp(0) without time zone NOT NULL
);


ALTER TABLE public.feedback OWNER TO symfonytest;

--
-- Name: product; Type: TABLE; Schema: public; Owner: symfonytest
--

CREATE TABLE public.product (
    id integer NOT NULL,
    title character varying(255) NOT NULL,
    price numeric(10,2) NOT NULL,
    description text,
    active boolean DEFAULT true NOT NULL,
    category_id integer
);


ALTER TABLE public.product OWNER TO symfonytest;

--
-- Data for Name: category; Type: TABLE DATA; Schema: public; Owner: symfonytest
--

COPY public.category (id, name, active) FROM stdin;
1	Horror	t
3	Absolut	t
2	Novel	f
\.


--
-- Data for Name: feedback; Type: TABLE DATA; Schema: public; Owner: symfonytest
--

COPY public.feedback (id, name, email, massage, created) FROM stdin;
1	майк	neapolis@rambler.ru	Hellow	2022-05-13 15:06:17
2	майк	neapolis@rambler.ru	Hellow	2022-05-13 15:22:11
3	майк2	Neapolis2@inbox.ru	Hellow2	2022-05-13 15:22:28
4	тест4	Neapolis4@inbox.ru	тест4	2022-05-13 15:40:36
5	тест5	Neapolis5@inbox.ru	тест5	2022-05-13 15:43:05
6	тест 6	Neapolis6@inbox.ru	тест6	2022-05-13 15:45:34
7	тест1	Neapolis@inbox.ru	тест	2022-05-13 15:59:55
11	тест	тест	123	2022-05-13 16:04:43
12	тест	тест	123	2022-05-13 16:04:47
13	тест1	тест777	123	2022-05-13 16:05:29
14	тест1	тест888	123127.0.0.1	2022-05-13 16:07:11
16	тест 666	127.0.0.1	тест	2022-05-13 16:09:38
17	тест	127.0.0.1	тест	2022-05-18 17:26:45
18	тест	127.0.0.1	тест	2022-05-18 17:28:33
19	тест rrrr	127.0.0.1	тестrrr	2022-05-18 17:28:42
22	тест1	127.0.0.1	тест1	2022-05-23 12:54:38
34	тест	127.0.0.1	Hellow	2022-05-23 13:28:49
35	тест	127.0.0.1	тест	2022-06-20 12:50:41
36	тест	127.0.0.1	тест	2022-07-12 14:48:17
37	тест	127.0.0.1	тест	2022-07-19 16:43:38
38	тест еее	127.0.0.1	тестееее	2022-07-19 16:44:30
39	тест 5	127.0.0.1	тест5	2022-07-19 19:00:24
40	тест 6	127.0.0.1	тест 6	2022-07-19 19:03:50
41	тест 6	Neapolis@inbox.ru	тест 6	2022-07-20 11:58:45
\.


--
-- Data for Name: product; Type: TABLE DATA; Schema: public; Owner: symfonytest
--

COPY public.product (id, title, price, description, active, category_id) FROM stdin;
1	carry	123.00	\N	t	1
2	idiot	200.00	very famos book	f	2
\.


--
-- Name: category category_pkey; Type: CONSTRAINT; Schema: public; Owner: symfonytest
--

ALTER TABLE ONLY public.category
    ADD CONSTRAINT category_pkey PRIMARY KEY (id);


--
-- Name: feedback feedback_pkey; Type: CONSTRAINT; Schema: public; Owner: symfonytest
--

ALTER TABLE ONLY public.feedback
    ADD CONSTRAINT feedback_pkey PRIMARY KEY (id);


--
-- Name: product product_pkey; Type: CONSTRAINT; Schema: public; Owner: symfonytest
--

ALTER TABLE ONLY public.product
    ADD CONSTRAINT product_pkey PRIMARY KEY (id);


--
-- Name: idx_d34a04ad12469de2; Type: INDEX; Schema: public; Owner: symfonytest
--

CREATE INDEX idx_d34a04ad12469de2 ON public.product USING btree (category_id);


--
-- Name: uniq_64c19c15e237e06; Type: INDEX; Schema: public; Owner: symfonytest
--

CREATE UNIQUE INDEX uniq_64c19c15e237e06 ON public.category USING btree (name);


--
-- Name: product fk_d34a04ad12469de2; Type: FK CONSTRAINT; Schema: public; Owner: symfonytest
--

ALTER TABLE ONLY public.product
    ADD CONSTRAINT fk_d34a04ad12469de2 FOREIGN KEY (category_id) REFERENCES public.category(id);


--
-- PostgreSQL database dump complete
--

