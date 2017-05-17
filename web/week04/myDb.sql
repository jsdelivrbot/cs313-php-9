--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.1
-- Dumped by pg_dump version 9.6.1

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: event; Type: TABLE; Schema: public; Owner: kftjudlsdzfbcq
--

CREATE TABLE event (
    id integer NOT NULL,
    name text NOT NULL,
    description text,
    start_datetime date NOT NULL,
    end_datetime date NOT NULL,
    project_id integer
);


ALTER TABLE event OWNER TO kftjudlsdzfbcq;

--
-- Name: event_s1; Type: SEQUENCE; Schema: public; Owner: kftjudlsdzfbcq
--

CREATE SEQUENCE event_s1
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE event_s1 OWNER TO kftjudlsdzfbcq;

--
-- Name: goal; Type: TABLE; Schema: public; Owner: kftjudlsdzfbcq
--

CREATE TABLE goal (
    id integer NOT NULL,
    name text NOT NULL,
    description text,
    project_id integer,
    end_datetime date
);


ALTER TABLE goal OWNER TO kftjudlsdzfbcq;

--
-- Name: goal_s1; Type: SEQUENCE; Schema: public; Owner: kftjudlsdzfbcq
--

CREATE SEQUENCE goal_s1
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE goal_s1 OWNER TO kftjudlsdzfbcq;

--
-- Name: project; Type: TABLE; Schema: public; Owner: kftjudlsdzfbcq
--

CREATE TABLE project (
    id integer NOT NULL,
    name text NOT NULL,
    description text
);


ALTER TABLE project OWNER TO kftjudlsdzfbcq;

--
-- Name: project_s1; Type: SEQUENCE; Schema: public; Owner: kftjudlsdzfbcq
--

CREATE SEQUENCE project_s1
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE project_s1 OWNER TO kftjudlsdzfbcq;

--
-- Name: task; Type: TABLE; Schema: public; Owner: kftjudlsdzfbcq
--

CREATE TABLE task (
    id integer NOT NULL,
    name text NOT NULL,
    description text,
    project_id integer,
    completed boolean
);


ALTER TABLE task OWNER TO kftjudlsdzfbcq;

--
-- Name: task_s1; Type: SEQUENCE; Schema: public; Owner: kftjudlsdzfbcq
--

CREATE SEQUENCE task_s1
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE task_s1 OWNER TO kftjudlsdzfbcq;

--
-- Name: tasks_to_events; Type: TABLE; Schema: public; Owner: kftjudlsdzfbcq
--

CREATE TABLE tasks_to_events (
    task_id integer NOT NULL,
    event_id integer NOT NULL
);


ALTER TABLE tasks_to_events OWNER TO kftjudlsdzfbcq;

--
-- Name: tasks_to_goals; Type: TABLE; Schema: public; Owner: kftjudlsdzfbcq
--

CREATE TABLE tasks_to_goals (
    task_id integer NOT NULL,
    goal_id integer NOT NULL
);


ALTER TABLE tasks_to_goals OWNER TO kftjudlsdzfbcq;

--
-- Name: users; Type: TABLE; Schema: public; Owner: kftjudlsdzfbcq
--

CREATE TABLE users (
    id integer NOT NULL,
    first_name text NOT NULL,
    last_name text NOT NULL,
    address text,
    phone_number text,
    email text,
    username text,
    pwd_hash text,
    pwd_salt text
);


ALTER TABLE users OWNER TO kftjudlsdzfbcq;

--
-- Name: users_s1; Type: SEQUENCE; Schema: public; Owner: kftjudlsdzfbcq
--

CREATE SEQUENCE users_s1
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE users_s1 OWNER TO kftjudlsdzfbcq;

--
-- Name: users_to_events; Type: TABLE; Schema: public; Owner: kftjudlsdzfbcq
--

CREATE TABLE users_to_events (
    user_id integer NOT NULL,
    event_id integer NOT NULL
);


ALTER TABLE users_to_events OWNER TO kftjudlsdzfbcq;

--
-- Name: users_to_goals; Type: TABLE; Schema: public; Owner: kftjudlsdzfbcq
--

CREATE TABLE users_to_goals (
    user_id integer NOT NULL,
    goal_id integer NOT NULL
);


ALTER TABLE users_to_goals OWNER TO kftjudlsdzfbcq;

--
-- Name: users_to_projects; Type: TABLE; Schema: public; Owner: kftjudlsdzfbcq
--

CREATE TABLE users_to_projects (
    user_id integer NOT NULL,
    project_id integer NOT NULL
);


ALTER TABLE users_to_projects OWNER TO kftjudlsdzfbcq;

--
-- Name: users_to_tasks; Type: TABLE; Schema: public; Owner: kftjudlsdzfbcq
--

CREATE TABLE users_to_tasks (
    user_id integer NOT NULL,
    task_id integer NOT NULL
);


ALTER TABLE users_to_tasks OWNER TO kftjudlsdzfbcq;

--
-- Data for Name: event; Type: TABLE DATA; Schema: public; Owner: kftjudlsdzfbcq
--

COPY event (id, name, description, start_datetime, end_datetime, project_id) FROM stdin;
\.


--
-- Name: event_s1; Type: SEQUENCE SET; Schema: public; Owner: kftjudlsdzfbcq
--

SELECT pg_catalog.setval('event_s1', 1, false);


--
-- Data for Name: goal; Type: TABLE DATA; Schema: public; Owner: kftjudlsdzfbcq
--

COPY goal (id, name, description, project_id, end_datetime) FROM stdin;
\.


--
-- Name: goal_s1; Type: SEQUENCE SET; Schema: public; Owner: kftjudlsdzfbcq
--

SELECT pg_catalog.setval('goal_s1', 1, false);


--
-- Data for Name: project; Type: TABLE DATA; Schema: public; Owner: kftjudlsdzfbcq
--

COPY project (id, name, description) FROM stdin;
\.


--
-- Name: project_s1; Type: SEQUENCE SET; Schema: public; Owner: kftjudlsdzfbcq
--

SELECT pg_catalog.setval('project_s1', 1, false);


--
-- Data for Name: task; Type: TABLE DATA; Schema: public; Owner: kftjudlsdzfbcq
--

COPY task (id, name, description, project_id, completed) FROM stdin;
\.


--
-- Name: task_s1; Type: SEQUENCE SET; Schema: public; Owner: kftjudlsdzfbcq
--

SELECT pg_catalog.setval('task_s1', 1, false);


--
-- Data for Name: tasks_to_events; Type: TABLE DATA; Schema: public; Owner: kftjudlsdzfbcq
--

COPY tasks_to_events (task_id, event_id) FROM stdin;
\.


--
-- Data for Name: tasks_to_goals; Type: TABLE DATA; Schema: public; Owner: kftjudlsdzfbcq
--

COPY tasks_to_goals (task_id, goal_id) FROM stdin;
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: kftjudlsdzfbcq
--

COPY users (id, first_name, last_name, address, phone_number, email, username, pwd_hash, pwd_salt) FROM stdin;
\.


--
-- Name: users_s1; Type: SEQUENCE SET; Schema: public; Owner: kftjudlsdzfbcq
--

SELECT pg_catalog.setval('users_s1', 1, false);


--
-- Data for Name: users_to_events; Type: TABLE DATA; Schema: public; Owner: kftjudlsdzfbcq
--

COPY users_to_events (user_id, event_id) FROM stdin;
\.


--
-- Data for Name: users_to_goals; Type: TABLE DATA; Schema: public; Owner: kftjudlsdzfbcq
--

COPY users_to_goals (user_id, goal_id) FROM stdin;
\.


--
-- Data for Name: users_to_projects; Type: TABLE DATA; Schema: public; Owner: kftjudlsdzfbcq
--

COPY users_to_projects (user_id, project_id) FROM stdin;
\.


--
-- Data for Name: users_to_tasks; Type: TABLE DATA; Schema: public; Owner: kftjudlsdzfbcq
--

COPY users_to_tasks (user_id, task_id) FROM stdin;
\.


--
-- Name: event event_pkey; Type: CONSTRAINT; Schema: public; Owner: kftjudlsdzfbcq
--

ALTER TABLE ONLY event
    ADD CONSTRAINT event_pkey PRIMARY KEY (id);


--
-- Name: goal goal_pkey; Type: CONSTRAINT; Schema: public; Owner: kftjudlsdzfbcq
--

ALTER TABLE ONLY goal
    ADD CONSTRAINT goal_pkey PRIMARY KEY (id);


--
-- Name: project project_pkey; Type: CONSTRAINT; Schema: public; Owner: kftjudlsdzfbcq
--

ALTER TABLE ONLY project
    ADD CONSTRAINT project_pkey PRIMARY KEY (id);


--
-- Name: task task_pkey; Type: CONSTRAINT; Schema: public; Owner: kftjudlsdzfbcq
--

ALTER TABLE ONLY task
    ADD CONSTRAINT task_pkey PRIMARY KEY (id);


--
-- Name: tasks_to_events tasks_to_events_pkey; Type: CONSTRAINT; Schema: public; Owner: kftjudlsdzfbcq
--

ALTER TABLE ONLY tasks_to_events
    ADD CONSTRAINT tasks_to_events_pkey PRIMARY KEY (task_id, event_id);


--
-- Name: tasks_to_goals tasks_to_goals_pkey; Type: CONSTRAINT; Schema: public; Owner: kftjudlsdzfbcq
--

ALTER TABLE ONLY tasks_to_goals
    ADD CONSTRAINT tasks_to_goals_pkey PRIMARY KEY (task_id, goal_id);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: kftjudlsdzfbcq
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: users_to_events users_to_events_pkey; Type: CONSTRAINT; Schema: public; Owner: kftjudlsdzfbcq
--

ALTER TABLE ONLY users_to_events
    ADD CONSTRAINT users_to_events_pkey PRIMARY KEY (user_id, event_id);


--
-- Name: users_to_goals users_to_goals_pkey; Type: CONSTRAINT; Schema: public; Owner: kftjudlsdzfbcq
--

ALTER TABLE ONLY users_to_goals
    ADD CONSTRAINT users_to_goals_pkey PRIMARY KEY (user_id, goal_id);


--
-- Name: users_to_projects users_to_projects_pkey; Type: CONSTRAINT; Schema: public; Owner: kftjudlsdzfbcq
--

ALTER TABLE ONLY users_to_projects
    ADD CONSTRAINT users_to_projects_pkey PRIMARY KEY (user_id, project_id);


--
-- Name: users_to_tasks users_to_tasks_pkey; Type: CONSTRAINT; Schema: public; Owner: kftjudlsdzfbcq
--

ALTER TABLE ONLY users_to_tasks
    ADD CONSTRAINT users_to_tasks_pkey PRIMARY KEY (user_id, task_id);


--
-- Name: event event_project_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: kftjudlsdzfbcq
--

ALTER TABLE ONLY event
    ADD CONSTRAINT event_project_id_fkey FOREIGN KEY (project_id) REFERENCES project(id);


--
-- Name: goal goal_project_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: kftjudlsdzfbcq
--

ALTER TABLE ONLY goal
    ADD CONSTRAINT goal_project_id_fkey FOREIGN KEY (project_id) REFERENCES project(id);


--
-- Name: task task_project_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: kftjudlsdzfbcq
--

ALTER TABLE ONLY task
    ADD CONSTRAINT task_project_id_fkey FOREIGN KEY (project_id) REFERENCES project(id);


--
-- Name: tasks_to_events tasks_to_events_event_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: kftjudlsdzfbcq
--

ALTER TABLE ONLY tasks_to_events
    ADD CONSTRAINT tasks_to_events_event_id_fkey FOREIGN KEY (event_id) REFERENCES event(id);


--
-- Name: tasks_to_events tasks_to_events_task_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: kftjudlsdzfbcq
--

ALTER TABLE ONLY tasks_to_events
    ADD CONSTRAINT tasks_to_events_task_id_fkey FOREIGN KEY (task_id) REFERENCES task(id);


--
-- Name: tasks_to_goals tasks_to_goals_goal_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: kftjudlsdzfbcq
--

ALTER TABLE ONLY tasks_to_goals
    ADD CONSTRAINT tasks_to_goals_goal_id_fkey FOREIGN KEY (goal_id) REFERENCES goal(id);


--
-- Name: tasks_to_goals tasks_to_goals_task_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: kftjudlsdzfbcq
--

ALTER TABLE ONLY tasks_to_goals
    ADD CONSTRAINT tasks_to_goals_task_id_fkey FOREIGN KEY (task_id) REFERENCES task(id);


--
-- Name: users_to_events users_to_events_event_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: kftjudlsdzfbcq
--

ALTER TABLE ONLY users_to_events
    ADD CONSTRAINT users_to_events_event_id_fkey FOREIGN KEY (event_id) REFERENCES event(id);


--
-- Name: users_to_events users_to_events_user_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: kftjudlsdzfbcq
--

ALTER TABLE ONLY users_to_events
    ADD CONSTRAINT users_to_events_user_id_fkey FOREIGN KEY (user_id) REFERENCES users(id);


--
-- Name: users_to_goals users_to_goals_goal_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: kftjudlsdzfbcq
--

ALTER TABLE ONLY users_to_goals
    ADD CONSTRAINT users_to_goals_goal_id_fkey FOREIGN KEY (goal_id) REFERENCES goal(id);


--
-- Name: users_to_goals users_to_goals_user_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: kftjudlsdzfbcq
--

ALTER TABLE ONLY users_to_goals
    ADD CONSTRAINT users_to_goals_user_id_fkey FOREIGN KEY (user_id) REFERENCES users(id);


--
-- Name: users_to_projects users_to_projects_project_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: kftjudlsdzfbcq
--

ALTER TABLE ONLY users_to_projects
    ADD CONSTRAINT users_to_projects_project_id_fkey FOREIGN KEY (project_id) REFERENCES project(id);


--
-- Name: users_to_projects users_to_projects_user_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: kftjudlsdzfbcq
--

ALTER TABLE ONLY users_to_projects
    ADD CONSTRAINT users_to_projects_user_id_fkey FOREIGN KEY (user_id) REFERENCES users(id);


--
-- Name: users_to_tasks users_to_tasks_task_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: kftjudlsdzfbcq
--

ALTER TABLE ONLY users_to_tasks
    ADD CONSTRAINT users_to_tasks_task_id_fkey FOREIGN KEY (task_id) REFERENCES task(id);


--
-- Name: users_to_tasks users_to_tasks_user_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: kftjudlsdzfbcq
--

ALTER TABLE ONLY users_to_tasks
    ADD CONSTRAINT users_to_tasks_user_id_fkey FOREIGN KEY (user_id) REFERENCES users(id);


--
-- Name: public; Type: ACL; Schema: -; Owner: kftjudlsdzfbcq
--

REVOKE ALL ON SCHEMA public FROM postgres;
REVOKE ALL ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO kftjudlsdzfbcq;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- Name: plpgsql; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON LANGUAGE plpgsql TO kftjudlsdzfbcq;


--
-- PostgreSQL database dump complete
--

