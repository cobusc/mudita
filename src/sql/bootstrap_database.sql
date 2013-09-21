DROP DATABASE IF EXISTS mudita;
DROP USER mudita;
CREATE DATABASE mudita;
CREATE USER 'mudita'@'localhost' IDENTIFIED BY 'password';
GRANT ALL  ON mudita.* TO 'mudita';

USE mudita;

SET storage_engine=InnoDB;;

CREATE TABLE school 
(
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(256) NOT NULL UNIQUE,
    description VARCHAR(1024),
    notes VARCHAR(1024),

    created_at TIMESTAMP,
    updated_at TIMESTAMP
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
    notes VARCHAR(1024)
);

CREATE TABLE contact
(
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(20) NOT NULL,
    surname VARCHAR(30) NOT NULL,
    relationship VARCHAR(100) NOT NULL,
    telephone VARCHAR(20) NOT NULL,
    email VARCHAR(100),
    notes VARCHAR(1024)
);
    
CREATE TABLE patient_contact 
(
    patient_id BIGINT REFERENCES patient(id),
    contact_id BIGINT REFERENCES contact(id),
    PRIMARY KEY (patient_id, contact_id)
);

CREATE TABLE drugtest_type
(
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(256) NOT NULL UNIQUE,
    description VARCHAR(1024)
);

CREATE TABLE drugtest
(
    test_date DATE NOT NULL,
    drugtest_type_id BIGINT REFERENCES drugtest_type(id),
    patient_id BIGINT REFERENCES patient(id),
    positive_result BOOLEAN NOT NULL,
    notes VARCHAR(1024),
    PRIMARY KEY (test_date, drugtest_type_id, patient_id)
);


    

