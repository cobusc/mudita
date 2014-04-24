-- DROP DATABASE IF EXISTS mudita;
-- DROP USER mudita@localhost;
-- CREATE DATABASE mudita;
-- CREATE USER mudita@localhost IDENTIFIED BY 'password';
-- GRANT ALL  ON mudita.* TO mudita@localhost;

-- USE mudita;

SET storage_engine=InnoDB;

CREATE TABLE school 
(
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(256) NOT NULL UNIQUE,
    description VARCHAR(1024),
    notes VARCHAR(1024)
);

CREATE TABLE patient 
(
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    case_number VARCHAR(10) NOT NULL,
    initials VARCHAR(10) NOT NULL,
    school_id INTEGER NOT NULL REFERENCES school(id),
    grade INTEGER NOT NULL,
    class VARCHAR(3),
    referral_date DATE,
    admission_date DATE NOT NULL,
    discharge_estimate_date DATE NOT NULL,
    discharge_date DATE,
    program_completed BOOLEAN NOT NULL DEFAULT FALSE,
    contact_name VARCHAR(100),
    contact_relationship VARCHAR(100),
    notes VARCHAR(1024)
);

CREATE TABLE drugtest_type
(
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(256) NOT NULL UNIQUE,
    description VARCHAR(1024)
);

CREATE TABLE drugtest_result_type
(
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    description VARCHAR(1024)
);

CREATE TABLE drugtest
(
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    test_date DATE NOT NULL,
    drugtest_type_id BIGINT REFERENCES drugtest_type(id),
    patient_id BIGINT REFERENCES patient(id),
    result_type_id INTEGER NOT NULL REFERENCES drugtest_result_type(id),
    notes VARCHAR(1024),
    UNIQUE (test_date, drugtest_type_id, patient_id)
);

CREATE TABLE substance
(
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    description VARCHAR(1024)
);

CREATE TABLE drugtest_substance
(
    drugtest_id BIGINT NOT NULL REFERENCES drugtest(id),
    substance_id INTEGER REFERENCES substance(id),
    PRIMARY KEY (drugtest_id, substance_id)
);

CREATE TABLE facilitator
(
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    description VARCHAR(1024)
);

CREATE TABLE individual_session_type
(
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(200) NOT NULL UNIQUE,
    description VARCHAR(1024)
);

CREATE TABLE group_session_type
(
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(200) NOT NULL UNIQUE,
    description VARCHAR(1024)
);

CREATE TABLE group_session
(
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
    facilitator_id INTEGER NOT NULL REFERENCES facilitator(id),
    type_id INTEGER NOT NULL REFERENCES group_session_type(id)
);

CREATE TABLE group_session_patient
(
    group_session_id INTEGER NOT NULL REFERENCES group_session(id),
    patient_id BIGINT NOT NULL REFERENCES patient(id),
    participation_level INTEGER NOT NULL,
    PRIMARY KEY(group_session_id, patient_id)
);

CREATE TABLE individual_session
(
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
    facilitator_id INTEGER NOT NULL REFERENCES facilitator(id),
    type_id INTEGER NOT NULL REFERENCES individual_session_type(id),
    patient_id BIGINT NOT NULL REFERENCES patient(id)
);

    
-- Data Fixtures

INSERT INTO substance(name) 
VALUES ('Methamphetamine'), ('Amphetamine'), ('Mandrax'), ('THC'), ('Opiates');

INSERT INTO drugtest_type(name, description)
VALUES ('5-panel urine drug test', 'The five panel urine drug test is an indicator for the following substances: metamphetamine, amphetamine, mandrax, THC and opiates');

INSERT INTO drugtest_result_type(name, description)
VALUES ('Positive', 'At least one substance was found'),
       ('Negative', 'No substances were found'),
       ('Invalid', 'The test was invalid');

-- Test Fixtures

INSERT INTO school(name, description, notes) VALUES
('Tuscany Glen High', '', ''),
('Malibu High', '', ''),
('Kleinvlei High', '', ''),
('Eersteriver High', '', ''),
('Blackheath High', '', ''),
('Forest Heights High', '', ''),
('Test School 1', 'A test school', 'Notes for the test school');

INSERT INTO facilitator(name, description) VALUES
('Alison Carstens', ''),
('Yolanda Rhoda', '');

INSERT INTO group_session_type(name, description) VALUES
('Matrix RP: Lesson 01', ''),
('Matrix RP: Lesson 02', ''),
('Matrix RP: Lesson 03', ''),
('Matrix RP: Lesson 04', ''),
('Matrix RP: Lesson 05', ''),
('Matrix RP: Lesson 06', ''),
('Matrix RP: Lesson 07', ''),
('Matrix RP: Lesson 08', ''),
('Matrix RP: Lesson 09', ''),
('Matrix RP: Lesson 10', ''),
('Matrix ER: Lesson 01', ''),
('Matrix ER: Lesson 02', ''),
('Matrix ER: Lesson 03', ''),
('Matrix ER: Lesson 04', ''),
('Matrix ER: Lesson 05', ''),
('Matrix ER: Lesson 06', ''),
('Matrix ER: Lesson 07', ''),
('Matrix ER: Lesson 08', ''),
('Matrix ER: Lesson 09', ''),
('Matrix ER: Lesson 10', ''),
('Educational Assistance', '');

INSERT INTO individual_session_type(name, description) VALUES
('Intake Assessment', ''),
('Meeting Parents/Guardians', ''),
('Educational Assistance', '');


INSERT INTO patient(case_number, initials, school_id, grade, class, 
                    referral_date, admission_date, discharge_estimate_date, discharge_date,
                    program_completed, notes)
VALUES ('TESTCASE', 'ABC', 1, 12, 'F', NOW(), NOW(), NOW() + 60, NULL, FALSE, 'Test patient notes');




