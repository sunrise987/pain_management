DROP DATABASE Patient_Management;
create database patient_management;
use patient_management;
set session time_zone = '+3:00';

CREATE TABLE Patient (
  PatientID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Name VARCHAR(30),
  DateOfBirth DATE,
  Gender ENUM ('male', 'female'),
  Nationality VARCHAR(40),
  DateOfAdmission DATE,
  PastMedicalHistory TEXT,
  PastSurgicalHistory TEXT,
  Diagnosis TINYTEXT
);

CREATE TABLE Pain (
  PainID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  PatientID INT NOT NULL,
  LocationOfPain TINYTEXT,
  Pattern ENUM  ('Constant', 'Intermittent'),
  Intensity TINYINT,
  AtThisMoment ENUM ('Worse', 'Better'),
  CharacterOfPain ENUM ('Shooting', 'Pricking', 'Throbbing', 'Aching', 'Pulling', 'Dull', 'Burning', 'Sharp'),
  CharacterOther TINYTEXT,
  Radiation TINYINT(1),
  TypeOfPain ENUM ('Somatic', 'Visceral', 'Neuropathic', 'Mixed'),
  Mixed TINYTEXT,
  WhatRelievesPain TINYTEXT,
  WhatIncreasesPain TINYTEXT,
  PainAffectsSleep TINYINT(1),
  PainAffectsMood TINYINT(1),
  PainAffectsActivity TINYINT(1),
  PainAffectsNutrition TINYINT(1),
  PainAffectsSocialInteraction TINYINT(1),
  Comments TEXT,
  FOREIGN KEY (PatientID) REFERENCES Patient(PatientID)
);

CREATE TABLE Medicine (
  MedicineID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  PainID INT NOT NULL,
  DateTime DATETIME,
  Opioids TINYTEXT,
  Dose TINYTEXT,
  Frequency TINYTEXT,
  RouteOfAdmission TINYTEXT,
  SideEffects TEXT,
  Comments TEXT,
  FOREIGN KEY (PainID) REFERENCES Pain(PainID)
);

CREATE TABLE PainManagement (
  PainManagementID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  PainID INT NOT NULL,
  DateTime DATETIME,
  LocationOfPain TINYTEXT,
  TypeOfPain ENUM ('Somatic', 'Visceral', 'Neuropathic', 'Mixed'),
  Intensity TINYINT,
  Opioids TINYTEXT,
  InfoOtherMed TINYTEXT,
  SideEffects ENUM ('Anxiety', 'Confusion', 'Constipation', 'Epigastric Distress', 'Hallucinations', 'Increased Sedation', 'Motor Weakness', 'Nausea', 'Pruritus', 'Urinary Retention', 'Vomiting'),
  Comments TEXT,
  FOREIGN KEY (PainID) REFERENCES Pain(PainID)
);

-- Patient has many Pains. Pain is treated by many Medicine.
